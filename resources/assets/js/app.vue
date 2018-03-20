<template>
    <div id="app">
        <div>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('app.vue mounted.')//vue読み込みの確認
        },
    }
</script>



<style scoped>

</style>