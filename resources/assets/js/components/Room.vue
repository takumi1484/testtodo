<template>
    <div id="body">
        <div><router-link to="/Top">Top</router-link></div>
            <hr>
            <ul v-for="fmessage in messages"><!--v-for:繰り返し処理による投稿の全表示-->
            <li v-if="id === fmessage.room_id">
                <!--v-if:ifによってroom_idがroom1の投稿のみを表示。今回はroom1に限定して作成する。'room1'を変数に置き換えれば部屋分け可能   追記：queryを利用したらコンポーネント一つでの部屋分けができたがより良い方法がありそう
                追記２そもそもデータベース"すべて"呼び込んでからifで分けるのは非効率的すぎる。laravelのmiddlewareかcontrollerでwhereしたほうが良い。その場合、queryからルーム判別する方式は変える必要がありそう
                追記３queryデータを利用して取得データを制限することができるかもしれない
                追記４apiでのuri指定でidを利用することによりaxiosで受け取るデータを制限できた。v-ifのくだりはもう不要
                よく見たらここで　オブジェクト名.内部データ名　で取り出しがうまくいってる
                -->
                <hr>
                <div>{{ fmessage.user_name }}　　{{ fmessage.created_at }}</div>
                <div>{{ fmessage.body }}</div>
            </li>
            </ul>
        <div class="footer">
            <form @submit.prevent="addItem">
                <input type="text" class="form-control" v-model="newBody" placeholder="本文を入力..."><!--フォーム内の文字はscript内のデータnewItemと動的に結びついてる-->
                <label class="text-inline"><input type="text" class="form-control" v-model="newName" placeholder="名前を入力..."></label><!--フォーム内の文字はscript内のデータnewNameと動的に結びついてる-->
                <input type="submit" class="btn btn-primary" value="投稿">
                <div class="alert alert-danger" role="alert" v-if="showAlert">
                    {{ alertMessage }}
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        mounted() {//このvueコンポーネントがマウント(読み込み)された時に一度読み込まれる
            console.log('Room.vue mounted.');   //vue読み込みの確認
            axios.defaults.baseURL = 'https://kuhblume.herokuapp.com/';
            // axios.defaults.xsrfHeaderName =  'X-CSRF-Token';
            // axios.defaults.headers.common = {
            //     'X-Requested-With': 'XMLHttpRequest'
            // };

            this.id = location.search;//url取得
            this.id = this.id.slice( 4 );//query(urlの?以降のやつ)から頭4字を消してroom_idに変換
            this.id = decodeURI(this.id);//urlに日本語は使えず勝手にパーセントエンコーディングされてしまう。ここではパーセントエンコーディングされた文字列をデコードし、正常にルームに入室できるようにしている
            this.showAlert = false;
            this.getPost();
        },
        data() {//テストデータ。このデータ形式に合わせてDBからデータを呼び込む
            return {
                messages: []
                //     [{
                //     body: 'testmessage',
                //     user_name: 'testuserA',
                //     ip: '',
                //     room_id: 'room1',
                //     created_at: '2000-01-01 00:00:00',
                // },{
                //     body: 'testmessageadasdasdasd',
                //     user_name: 'testuserA',
                //     ip: '',
                //     room_id: 'room1',
                //     created_at: '2000-01-01 00:00:00',
                // },{
                //     body: 'testmessage222222222222222222222222',
                //     user_name: 'testuserA',
                //     ip: '',
                //     room_id: 'room2',
                //     created_at: '2000-01-01 00:00:00',
                // }]
                ,
                showAlert: false,
                alertMessage: '',
                newBody: '',
                newName: '名無し',
                id: '',
            }
        },
        methods: {
            addItem () {//新しい投稿を追加するメソッド。
                if (this.newBody === '') {
                    this.showAlert = true;
                    this.alertMessage = '内容のない投稿はできません';
                    return false;
                }
                if (this.newBody.length > 50) {
                    this.showAlert = true;
                    this.alertMessage = '一回の投稿は50字以内にしてください';
                    return false;
                }
                if (this.newBody.indexOf("function") !== -1) {//vue上で行えるバリデーションぽいもの。別ファイルにするくらいならわかりやすいかもしれない。middlewareとか挟むより使いやすいバリデーションな気がする
                    this.showAlert = true;
                    this.alertMessage = 'やめなさい';
                    //location.href = "https://www.google.com/teapot";リンクに飛ばす
                    return false;
                }
                if (this.newBody.indexOf("=>") !== -1) {
                    this.showAlert = true;
                    this.alertMessage = 'やめなさい';
                    return false;
                }
                if (this.newName === '') {
                    this.showAlert = true;
                    this.alertMessage = '名前を入力してください';
                    return false;
                }
                if (this.newName.length > 10) {
                    this.showAlert = true;
                    this.alertMessage = '名前は10文字以下にしてください';
                    return false;
                }
                let item = {                                        //新しい投稿に入れる各種データ
                    body: this.newBody,                           //フォームより入力
                    user_name: this.newName,                     //フォームより入力
                    ip: '',//   未実装。一定時間ごとに取得することで参加者を半リアルタイムに表示させる機能
                    room_id: this.id,                             //room1を後で何らかの変数に変えればルーム追加できる
                    created_at: 'new post',         //作成日時。jsでなくデータベースから取れそう？むしろjsで取得した値はcreated_atに入れられないのでは？？
                    };
                this.sendPost();
                this.messages.push(item);                         //A.push(B) Aの配列の最後にデータBを挿入
                this.newBody = '';                                 //body入力後、フォーム内を削除。(newItemはフォーム内の文字と動的に結びついている )
            },
            getPost(){
                // let self = this;
                // axios.get('api/postapi/' + this.id)//方法１:失敗
                //     .then(function (response) {
                //         self.messages = response;
                //     });
                // axios.get('api/postapi/' + this.id , res => {
                //     this.messages = res.data
                // })
                //alert(this.messages);

                axios.get('api/postapi/' + this.id)//無事に取得できた。jsのオブジェクトに関する知識不足でうまくデータが取り出せなかった。オブジェクトから値を取り出すには　オブジェクト名[オブジェクト内のデータの名前]　jsの規則にのっとったデータ名(予約語、特殊文字を含まない)なら.でも呼べる
                    //メモ：urlからルームを直接指定できる代わりに同じルーム名にすると古いルームの内容が反映される。まああげってことで放置でいい。本当なら無二のidでルームはわける
                    .then(response => {
                        console.log(response);//consoleによる出力はchromeの検証などから確認できる
                        this.messages = response.data;
                        //alert(response["data"]);//個々の記述はresponse.dataでも一緒。　問題点：このalertではデータの中身は表示されずobjectと表示される。オブジェクトから個々のデータを取り出したい場合を学ぶべき(3/24)。
                    });
            },
            sendPost(){
                axios.post('api/postapi/' , {
                    body: this.newBody,
                    user_name: this.newName,
                    ip: '0000000',//////////////////////ここが''つまりnullだとエラーだった。httpエラー500。不要なカラムはエラーを呼びかねない
                    room_id: this.id,
                    //ここの要素は配列？オブジェクト？まあどちらかとしてひとまとめにされコントローラへ渡される。コントローラーでは要素を取り出す必要がある////////////////////////////////////////////////////////
                })
                    .then(response => {
                        // this.messages[response.data.id] = response.data;
                        this.name = '';
                        this.showAlert = false;
                        this.alertMessage = '';//未実装：警告部分に「送信しました」という通知を表示させる
                        this.created_at ='new post';
                    });
            },
            voidScan(){

            }
        }
    }
</script>

<style scoped>
    .footer{
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 150px;
        background: #bdc0c0;
        padding-left: 2%;
        padding-right: 2%;
        padding-top: 10px;
    }
    .text-inline{
        position: fixed;
        right: 10px;
    }
    #body{
        padding-bottom: 150px;
    }
</style>

<!--
このページで行うこと...
・投稿の表示
    ルームidで選別したものを表示
・ヘッダーでルーム名を表示
・フッターで投稿フォーム
    投稿者名
    本文
    送信ボタン

    ☆各ルームの閲覧者をアクティブにひょうじしたい->それ用のテーブルが必要ぽい
-->