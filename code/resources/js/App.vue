<template>
    <div id="app">

        <modcon></modcon>
    </div>
</template>

<script>
    import Modcon from "./components/Modcon";

    export default {
        name: "app",
        components: {
            Modcon
        }
    };
</script>


<style>
    #app {
        font-family: "Avenir", Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: #2c3e50;
    }

</style>
