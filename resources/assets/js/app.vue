<template>
    <div id="app">
        <!--/////////////////////////////////////////////////////////////////////////////////////////////-->
        <header>
    <div class="bell">
            10
    </div>

    <div class="title">
        Cancer Parents
    </div>

    <div class="register">
        1610が登録しています
    </div>

    <div class="headerlist">

    </div>

    <div class="hometext">
        ホームへ
    </div>

    <div class="headerhome">
        <i class="fas fa-home  home"></i>
    </div>

    <div class="headerlink">


        <i class="far fa-user  user"></i>
        <i class="fas fa-pencil-alt sign-in-alt"></i>
        <i class="fas fa-search search"></i>
        <i class="fas fa-bell eye"></i>
        <i class="fas fa-cog cog"></i>

    </div>

    <div class="headertext a">
        プロフィール
    </div>
    <div class="headertext b">
        日記投稿
    </div>
    <div class="headertext c">
        検索
    </div>
    <div class="headertext d">
        通知
    </div>
    <div class="headertext e">
        設定
    </div>
            </header>

    <!--//////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="container">
            <router-view></router-view>
        </div>
        <hr>
        <div class="container-fluid">
            <a href="https://github.com/acro5piano/laravel-vue-jwtauth-spa-todo-app" target="_blank">
                <img src="https://image.flaticon.com/icons/svg/25/25231.svg" width="30" height="20">
            </a>
        </div>
        <hr>
        <li>
            <router-link to="/test1">jump test1</router-link>
        </li>
        <li>
            <router-link to="/test2">jump test2</router-link>
        </li>
        <li>
            <router-link to="/">top(not component)</router-link>
        </li>
    </div>
</template>

<script>
    export default {
        name: "app",
    }
</script>



<style scoped>
    body{
        margin: 0;
        padding: 0;
    }

    header{
        background-color: #81F79F;
        width:375px;
        height: 120px;
    }

    .headerhome{
        font-size: 15px;
        position: absolute;
        left:335px;
        top:10px;
        color:white;
        text-align: center;
    }

    .hometext{
        font-size: 12px;
        position: absolute;
        left:320px;
        top:28px;
        color:white;
        text-align: center;
    }

    .register{
        font-size: 13px;
        position: absolute;
        left:150px;
        top:12px;
        color:white;
        text-align: center;
    }

    .headerlist{
        position: absolute;
        top:12px;
        left:300px;
        width:0.0001px;
        height: 20px;
        border:2.0px dotted white;

    }

    .headerlink{
        color:white;
        text-align: center;
        padding: 60px 0 0 0;
        margin: 0;
    }

    .search{
        padding:0 7%;
    }

    .sign-in-alt{
        padding:0 7%;
    }

    .eye{
        padding:0 7%;
    }

    .user{
        padding:0 7%;
    }

    .cog{
        padding:0 7%;
    }

    .headertext{
        color: white;
        font-size: 12px;
        float: left;
        padding:0 2.6%;
    }

    .a{
        padding-left:1.8%;
    }

    .b{
        padding: 0 0.6%;
    }

    .c{
        padding: 0 9%;
    }

    .d{
        padding:0 4.4%;
    }

    .e{
        padding-left:8.5%;
    }

    .title{
        position: absolute;
        text-align: center;
        top: 10px;
        left: 20px;
        height: 8px;
        color: white;
        border: 2px solid white;
        border-radius: 30px;
        padding:5px;
        font-size: 12px;
        line-height: 8px;
    }

    .bell{
        font-size: 12px;
        color: white;
        position: absolute;
        width: 15px;
        height: 15px;
        background: #EF476F;
        top:60px;
        left:270px;
        border-radius: 50px;
    }
</style>