<template>
    <div>
        admin
        <hr>
        <table class="box0">
            <tbody>
            <tr>
                <th>id</th>
                <th>user_name</th>
                <th>room_id</th>
                <th>body</th>
                <th>created_at</th>
                <th>change</th>
            </tr>
            <tr v-for="fmessages in messages">
                <td>{{ fmessages.id }}</td>
                <td>{{ fmessages.room_id }}</td>
                <td>{{ fmessages.user_name }}</td>
                <td>{{ fmessages.body }}</td>
                <td>{{ fmessages.created_at }}</td>
                <td><button>che</button>
                    <button @click='deletePost(fmessages)'>el</button></td>
            </tr>
            </tbody>
        </table>
        <table class="box1">
            <tbody>
            <tr>
                <th>id</th>
                <th>room_id</th>
                <th>created_at</th>
                <th>change</th>
            </tr>
            <tr v-for="frooms in rooms">
                <td>{{ frooms.id }}</td>
                <td>{{ frooms.room_id }}</td>
                <td>{{ frooms.created_at }}</td>
                <td><button>che</button>
                    <button @click='deleteRoom(frooms)'>el</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        mounted(){
            axios.defaults.baseURL = 'https://kuhblume.herokuapp.com';
            // axios.defaults.xsrfHeaderName =  'X-CSRF-Token';
            // axios.defaults.headers.common = {
            //     'X-Requested-With': 'XMLHttpRequest'
            // };
            this.get();
        },
        data(){
            return{
                messages: [],
                rooms: [],
            }
        },
        methods:{
            get(){
                axios.get('api/postapi/')
                    .then(response => {
                        console.log(response);
                        this.messages = response.data;
                    });
                axios.get('api/roomapi/')
                    .then(response => {
                        console.log(response);
                        this.rooms = response.data;
                    });
            },
            deletePost(fmes){//単なる"delete"はmethodsでも@clickでも予約語だったらしくエラーが出た
                axios.delete('api/postapi/' + fmes.id)
                    .then(res => {
                        // this.messages.splice(fmes.id-1 ,1)
                        // alert(fmes.id)
                        this.$forceUpdate();//jsの機能？
                    });
                this.get();
                // this.messages.splice(fmessages.id ,1)
                // alert(fmessages.id)
                // delete fmessages.id;
                // delete this.messages[fmessages.id];
                this.$forceUpdate();
            },
        }
    }
</script>
<style scoped>
    .box0{
        width: 100%;
        border-collapse: collapse;
    }
    .box0 th{
        width: 17%;
        padding: 6px;
        text-align: left;
        vertical-align: top;
        color: #333;
        background-color: #eee;
        border: 1px solid #b9b9b9;
    }
    .box0 td{
        padding: 6px;
        background-color: #fff;
        border: 1px solid #b9b9b9;
    }
    .box1{
        width: 100%;
        border-collapse: collapse;
    }
    .box1 th{
        width: 25%;
        padding: 6px;
        text-align: left;
        vertical-align: top;
        color: #333;
        background-color: #eee;
        border: 1px solid #b9b9b9;
    }
    .box1 td{
        padding: 6px;
        background-color: #fff;
        border: 1px solid #b9b9b9;
    }
</style>