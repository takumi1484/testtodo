<template>
    <div>
        <ul v-for="froom in rooms"><!--v-for:繰り返し処理による投稿の全表示-->
            <li><router-link :to="{ path: 'Room', query: { id: froom.room_id }}">{{ froom.room_id }}</router-link></li><!--リンク先ページのurlにqueryを付与-->
                <div>{{ froom.allposts }}</div>
                <div>{{ froom.created_at }}</div>
        </ul>
        <hr>
        <div>room serch</div><!--フッターかヘッダーにいれたほうがよさそう-->
        <input type="text" class="form-control" v-model="serchbox" placeholder="ルームを検索...">
        <ul v-for="froom in rooms">
            <div v-if="froom.room_id === serchbox">
            <li><router-link :to="{ path: 'Room', query: { id: froom.room_id }}">{{ froom.room_id }}</router-link></li>
                <div>{{ froom.allposts }}</div>
                <div>{{ froom.created_at }}</div>
            </div>
        </ul>
        <br>
        <form @submit.prevent="addRoom">
            <input type="text" class="form-control" v-model="newRoomName" placeholder="ルーム名を入力...">
            <input type="submit" class="btn btn-primary" value="作成">
            <div class="alert alert-danger" role="alert" v-if=showAlert>
                {{ alertMessage }}
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Top.vue mounted.')//vue読み込みの確認
        },
        methods:{
            addRoom(){
                if (this.newRoomName === '') {
                    this.showAlert = true;
                    this.alertMessage = 'ルーム名を入力してください';
                    return false;
                }
                let newRoom = {                                        //新しい投稿に入れる各種データ
                    room_id: this.newRoomName,                           //フォームより入力
                    created_at: '2000-01-01 00:00:00',         //作成日時。jsでなくデータベースから取れそう？むしろjsで取得した値はcreated_atに入れられないのでは？？
                };
                this.rooms.push(newRoom);                         //A.push(B) Aの配列の最後にデータBを挿入
                this.newRoomName = '';                                 //body入力後、フォーム内を削除。(newItemはフォーム内の文字と動的に結びついている )
            },
        },
        data() {//テストデータ。このデータ形式に合わせてDBからデータを呼び込む
            return {
                rooms: [{// password: '1qaz',//パスワード　　あとまわし// viewing: '0',//閲覧している人をリアルタイムで  ipアドレスを一定時間ごとに監視すればいけそうだけど後回し
                    room_id: 'room1',//部屋名
                    created_at: '2000-01-01 00:00:00',
                    allposts: '0'//投稿総数　追記:専用カラム不要
                    },{
                    room_id: 'room2',//部屋名
                    created_at: '2000-01-01 00:00:00',
                    allposts: '0'//投稿総数
                },
                ],
                serchbox: "",
                showAlert: false,
                alertMessage: '',
            }
        },
    }
</script>

<style scoped>

</style>

<!--
このページで行うこと...
・ルーム表示
    投稿総数の表示
・ルーム名検索
    優先度は低い
・ルーム作成フォーム
    ルーム名
    作成ボタン
・ソート機能
　　作成日時順
　　50音順
    投稿数順
    ＋それぞれの逆順

-->