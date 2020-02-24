<template>
    <div class="row">
        <div class="row-auto bg-blue-100 h-8 w-screen">
            controls
        </div>

        <div class="work_area row-auto  w-screen flex">

            <div class="component_list   overflow-y-scroll">

                <draggable class="dragArea list-group" :list="list1" :group="{ name: 'people', pull: 'clone', put: false }"  @change="log">
                    <div class="list-group-item" v-html="element.con" v-for="element in list1"> </div>
                </draggable>
            </div>
            <!--------->
            <div class="result_list  overflow-y-scroll">
                <draggable class="dragArea list-group" :list="list2" group="people" @change="log" :move="onMove">
                    <div @click.shift="remove(i)" class="list-group-item" v-for="element,i in list2" v-html="element.con">

                    </div>
                </draggable>
            </div>

        </div>


    </div>
</template>

<script>
    import draggable from "vuedraggable";
    export default {
        name: "clone",
        display: "Clone",
        order: 2,
        components: {
            draggable
        },
        data() {
            return {
                list1: [
                    {
                        id: 0,
                        name: "Articles 1",
                        type: "art",
                        con: "<section class=\"font-sans container m-auto flex flex-col md:flex-row py-8 max-w-xl px-6 lg:px-0\">\n  <div class=\"w-full md:w-1\/4 border-b md:border-0 mb-6 md:mb-0 pb-6 md:pb-0 pr-8 flex justify-center items-start flex-col\">\n    <label for=\"\" class=\"font-bold\">Important Note<\/label>\n    <p class=\"leading-normal mt-4 border-0 md:border-r md:pr-2\">Nullam gravida sem vel massa pulvinar cursus. In sagittis enim vitae eros ultrices sagittis<\/p>\n  <\/div>\n  <div class=\"w-full md:w-3\/4 leading-normal column-0 lg:column-2\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\n  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. <\/div>\n<\/section>\n"
                    },
                    {
                        id: 1,
                        name: "Articles 2",
                        type: "art",
                        con: "<section class=\"font-sans container m-auto flex flex-col py-8 max-w-xl text-center px-6\">\n  <label class=\"text-sm uppercase\">20 Month 2019<\/label>\n  <h1 class=\"my-8 max-w-full m-auto text-3xl md:text-4xl lg:text-5xl font-medium\">Lorem Ipsum is simply dummy text of the printing<\/h1>\n  <p class=\"mt-1 lg:mt-4 max-w-lg m-auto leading-loose mb-6 text-left\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<\/p>\n  <p class=\"max-w-lg m-auto leading-loose mb-6 text-left\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<\/p>\n<\/section>\n"
                    },
                    {
                        id: 2,
                        name: "Cards 1",
                        type: "car",
                        con: "<section class=\"bg-white py-4 font-sans\">\n  <div class=\"container max-w-xl m-auto flex flex-wrap items-center justify-start\">\n\n    <div class=\"w-full md:w-1\/2 lg:w-1\/3 flex flex-col mb-8 px-3\">\n      <div class=\"overflow-hidden bg-white rounded-lg shadow hover:shadow-raised hover:translateY-2px transition\">\n        <img class=\"w-full\" src=\"https:\/\/source.unsplash.com\/random\/400x225\" alt=\"Sunset in the mountains\">\n        <div class=\"p-6 flex flex-col justify-between \">\n          <h3 class=\"font-medium text-gray-900 mb-4 leading-normal\">Desktop Publishing Software like Aldus PageMaker\n          <\/h3>\n          <p class=\"inline-flex items-center\">\n            <span class=\"text-gray-700 text-sm\">Read More<\/span>\n          <\/p>\n        <\/div>\n      <\/div>\n    <\/div>\n\n    <div class=\"w-full md:w-1\/2 lg:w-1\/3 flex flex-col mb-8 px-3\">\n      <div class=\"overflow-hidden bg-white rounded-lg shadow hover:shadow-raised hover:translateY-2px transition\">\n        <img class=\"w-full\" src=\"https:\/\/source.unsplash.com\/random\/400x225\" alt=\"Sunset in the mountains\">\n        <div class=\"p-6 flex flex-col justify-between \">\n          <h3 class=\"font-medium text-gray-900 mb-4 leading-normal\">Desktop Publishing Software like Aldus PageMaker\n          <\/h3>\n          <p class=\"inline-flex items-center\">\n            <span class=\"text-gray-700 text-sm\">Read More<\/span>\n          <\/p>\n        <\/div>\n      <\/div>\n    <\/div>\n\n    <div class=\"w-full md:w-1\/2 lg:w-1\/3 flex flex-col mb-8 px-3\">\n      <div class=\"overflow-hidden bg-white rounded-lg shadow hover:shadow-raised hover:translateY-2px transition\">\n        <img class=\"w-full\" src=\"https:\/\/source.unsplash.com\/random\/400x225\" alt=\"Sunset in the mountains\">\n        <div class=\"p-6 flex flex-col justify-between \">\n          <h3 class=\"font-medium text-gray-900 mb-4 leading-normal\">Desktop Publishing Software like Aldus PageMaker\n          <\/h3>\n          <p class=\"inline-flex items-center\">\n            <span class=\"text-gray-700 text-sm\">Read More<\/span>\n          <\/p>\n        <\/div>\n      <\/div>\n    <\/div>\n\n    <div class=\"w-full md:w-1\/2 lg:w-1\/3 flex flex-col mb-8 px-3\">\n      <div class=\"overflow-hidden bg-white rounded-lg shadow hover:shadow-raised hover:translateY-2px transition\">\n        <img class=\"w-full\" src=\"https:\/\/source.unsplash.com\/random\/400x225\" alt=\"Sunset in the mountains\">\n        <div class=\"p-6 flex flex-col justify-between \">\n          <h3 class=\"font-medium text-gray-900 mb-4 leading-normal\">Desktop Publishing Software like Aldus PageMaker\n          <\/h3>\n          <p class=\"inline-flex items-center\">\n            <span class=\"text-gray-700 text-sm\">Read More<\/span>\n          <\/p>\n        <\/div>\n      <\/div>\n    <\/div>\n\n    <div class=\"w-full md:w-1\/2 lg:w-1\/3 flex flex-col mb-8 px-3\">\n      <div class=\"overflow-hidden bg-white rounded-lg shadow hover:shadow-raised hover:translateY-2px transition\">\n        <img class=\"w-full\" src=\"https:\/\/source.unsplash.com\/random\/400x225\" alt=\"Sunset in the mountains\">\n        <div class=\"p-6 flex flex-col justify-between \">\n          <h3 class=\"font-medium text-gray-900 mb-4 leading-normal\">Desktop Publishing Software like Aldus PageMaker\n          <\/h3>\n          <p class=\"inline-flex items-center\">\n            <span class=\"text-gray-700 text-sm\">Read More<\/span>\n          <\/p>\n        <\/div>\n      <\/div>\n    <\/div>\n\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 3,
                        name: "Cards 2",
                        type: "car",
                        con: "<section class=\"bg-white py-4 font-sans\">\n  <div class=\"container container max-w-xl m-auto flex flex-wrap flex-col md:flex-row items-center justify-start\">\n    <div class=\"w-full lg:w-1\/2 p-3\">\n      <div class=\"flex flex-col lg:flex-row rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg\">\n        <img class=\"block h-auto w-full lg:w-48 flex-none bg-cover\"\n             src=\"https:\/\/source.unsplash.com\/random\/200x125\">\n        <div class=\"bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal\">\n          <div class=\"text-black font-bold text-xl mb-2 leading-tight\">Can coffee make you a better developer?<\/div>\n          <p class=\"text-gray-700 text-base\">Read more<\/p>\n        <\/div>\n      <\/div>\n    <\/div>\n    <div class=\"w-full lg:w-1\/2 p-3\">\n      <div class=\"flex flex-col lg:flex-row rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg\">\n        <img class=\"block h-auto w-full lg:w-48 flex-none bg-cover\"\n             src=\"https:\/\/source.unsplash.com\/random\/200x125\">\n        <div class=\"bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal\">\n          <div class=\"text-black font-bold text-xl mb-2 leading-tight\">Can coffee make you a better developer?<\/div>\n          <p class=\"text-gray-700 text-base\">Read more<\/p>\n        <\/div>\n      <\/div>\n    <\/div>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 4,
                        name: "Cta 1",
                        type: "cta",
                        con: "<section class=\"font-sans text-center my-8 px-8\">\n  <h1 class=\"capitalize font-medium\">Ready to get started?<\/h1>\n  <p class=\"text-gray-700 mt-2 mb-6\">But I must explain to you how all this mistaken idea of denouncing <\/p>\n  <button class=\"bg-black hover:bg-gray-900 text-white hover:text-white py-3 px-6 uppercase text-xs tracking-wide\">Learn More<\/button>\n<\/section>"
                    },
                    {
                        id: 5,
                        name: "Cta 2",
                        type: "cta",
                        con: "<section class=\"font-sans text-center py-8 px-4 lg:px-0 bg-gray-300\">\n  <div class=\"container flex flex-col sm:flex-row bg-white max-w-xl m-auto shadow\">\n    <div class=\"w-full sm:w-3\/4 px-6 pt-6 text-left flex flex-col justify-center\">\n      <h2 class=\"capitalize font-medium\">Ready to get started?<\/h2>\n      <p class=\"text-gray-700 mt-2 mb-6\">But I must explain to you how all this mistaken idea of denouncing <\/p>\n    <\/div>\n    <div class=\"w-full sm:w-1\/4 flex justify-start sm:justify-center items-center pl-6 pb-6 sm:pl-0 sm:pb-0\">\n      <button class=\" bg-black hover:bg-gray-900 text-white hover:text-white py-3 px-6 uppercase text-xs tracking-wide\">Learn More<\/button>\n    <\/div>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 6,
                        name: "Features 1",
                        type: "fea",
                        con: "<section\n  class=\"my-8 font-sans container max-w-xl m-auto flex flex-col lg:flex-row text-center lg:text-left sm:items-center\">\n  <div class=\"w-full lg:w-1\/2\"><img src=\"https:\/\/stitches.hyperyolo.com\/images\/demo-phone.png\" alt=\"\"><\/div>\n  <div class=\"w-full lg:w-1\/2 flex flex-col justify-center items-start p-8 items-center lg:items-start\">\n    <label for=\"tagline\" class=\"uppercase tracking-wide text-gray-700 font-bold\">best app ever<\/label>\n    <h1 class=\"my-4 font-normal\">Our Work Flow<\/h1>\n    <p class=\"leading-normal mb-4 text-gray-700\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do\n      eiusmod tempor incididunt ut labore et dolore magna aliqua.<\/p>\n  <\/div>\n<\/section>\n<section\n  class=\"my-8 pt-8 font-sans container max-w-xl m-auto flex flex-col-reverse lg:flex-row text-center lg:text-left sm:items-center\">\n  <div class=\"w-full lg:w-1\/2 flex flex-col justify-center items-start p-8 items-center lg:items-start\">\n    <label for=\"tagline\" class=\"uppercase tracking-wide text-gray-700 font-bold\">best app ever<\/label>\n    <h1 class=\"my-4 font-normal\">Our Work Flow<\/h1>\n    <p class=\"leading-normal mb-4 text-gray-700\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do\n      eiusmod tempor incididunt ut labore et dolore magna aliqua.<\/p>\n  <\/div>\n  <div class=\"w-full lg:w-1\/2\"><img src=\"https:\/\/stitches.hyperyolo.com\/images\/demo-phone.png\" alt=\"\"><\/div>\n<\/section>"
                    },
                    {
                        id: 7,
                        name: "Features 2",
                        type: "fea",
                        con: "<section class=\"font-sans flex flex-col lg:flex-row\">\n  <div class=\"w-full lg:w-1\/2\"><img src=\"https:\/\/stitches.hyperyolo.com\/images\/demo-phone.png\" alt=\"\"><\/div>\n  <div class=\"w-full lg:w-1\/2 flex flex-col items-center justify-center text-center p-8\">\n    <h1 class=\"my-4 font-normal\">App Features<\/h1>\n    <p class=\"leading-normal mb-4 w-2\/3 text-gray-700\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do\n      eiusmod tempor incididunt ut labore et dolore magna aliqua.<\/p>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 8,
                        name: "Features 3",
                        type: "fea",
                        con: "<section class=\"my-8 font-sans container max-w-xl m-auto flex flex-col md:flex-row sm:items-center\">\n  <div class=\"w-full md:w-1\/2 flex flex-col justify-center items-start px-6 py-0 md:py-8 md:px-8 lg:items-start\">\n    <label for=\"tagline\" class=\"uppercase tracking-wide text-gray-700 font-bold\">various aspects<\/label>\n    <h1 class=\"mt-2 mb-4 font-medium\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.<\/h1>\n    <p class=\"leading-normal mb-4 text-gray-700\">Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.\n    Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.\n    Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.<\/p>\n  <\/div>\n  <div class=\"w-full md:w-1\/2 flex flex-row md:flex-col justify-between md:justify-center items-center p-2 md:p-8 items-center md:items-start\">\n    <div class=\"flex items-center sm:border-r md:border-b md:border-r-0 p-4 w-1\/2 md:w-auto\">\n      <div class=\"w-14 h-14 rounded-full mr-4 bg-gray-300\" alt=\"Avatar of Jonathan Reinink\"><\/div>\n      <div class=\"\">\n        <h2 class=\"text-black font-medium\">Aliquam tincidunt mauris eu risus.<\/h2>\n        <p class=\"text-gray-700 leading-normal\">Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.<\/p>\n      <\/div>\n    <\/div>\n    <div class=\"flex items-center p-4 w-1\/2 md:w-auto\">\n      <div class=\"w-14 h-14 rounded-full mr-4 bg-gray-300\" alt=\"Avatar of Jonathan Reinink\"><\/div>\n      <div class=\"\">\n        <h2 class=\"text-black font-medium\">Vestibulum auctor dapibus neque.<\/h2>\n        <p class=\"text-gray-700 leading-normal\">Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.<\/p>\n      <\/div>\n    <\/div>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 9,
                        name: "Features 4",
                        type: "fea",
                        con: "<section class=\"font-sans container m-auto text-center py-8\">\n  <label for=\"tagline\" class=\"uppercase tracking-wide font-bold text-gray-700\">Various Aspects<\/label>\n  <h1 class=\"mt-2 mb-4 font-medium max-w-sm m-auto\">Those are important in Vanue Management<\/h1>\n  <hr class=\"border-b w-8 m-auto my-6\">\n  <div class=\"flex flex-wrap justify-between items-start\">\n    <div class=\"w-full sm:w-1\/2 md:w-1\/4 flex flex-col items-center justify-center p-4\">\n      <div class=\"w-14 h-14 rounded-full mr-4 bg-gray-300\" alt=\"\"><\/div>\n      <h2 class=\"my-4 font-medium\">Cras ornare tristique elit.<\/h2>\n      <p class=\"leading-normal mb-4 text-gray-700\">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.<\/p>\n    <\/div>\n    <div class=\"w-full sm:w-1\/2 md:w-1\/4 flex flex-col items-center justify-center p-4\">\n      <div class=\"w-14 h-14 rounded-full mr-4 bg-gray-300\" alt=\"\"><\/div>\n      <h2 class=\"my-4 font-medium\">Vivamus vestibulum ntulla nec ante.<\/h2>\n      <p class=\"leading-normal mb-4 text-gray-700\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<\/p>\n    <\/div>\n    <div class=\"w-full sm:w-1\/2 md:w-1\/4 flex flex-col items-center justify-center p-4\">\n      <div class=\"w-14 h-14 rounded-full mr-4 bg-gray-300\" alt=\"\"><\/div>\n      <h2 class=\"my-4 font-medium\">Praesent placerat risus quis eros.<\/h2>\n      <p class=\"leading-normal mb-4 text-gray-700\">Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.<\/p>\n    <\/div>\n    <div class=\"w-full sm:w-1\/2 md:w-1\/4 flex flex-col items-center justify-center p-4\">\n      <div class=\"w-14 h-14 rounded-full mr-4 bg-gray-300\" alt=\"\"><\/div>\n      <h2 class=\"my-4 font-medium\">Fusce pellentesque suscipit nibh.<\/h2>\n      <p class=\"leading-normal mb-4 text-gray-700\">Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.<\/p>\n    <\/div>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 10,
                        name: "Features 5",
                        type: "fea",
                        con: "<section class=\"my-8 font-sans container m-auto max-w-xl \">\n  <div class=\"text-center\">\n    <h1 class=\"my-4 font-medium\">Show Your Work<\/h1>\n    <p class=\"leading-normal mb-4 max-w-sm m-auto\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<\/p>\n  <\/div>\n  <div class=\"flex flex-col sm:flex-row flex-wrap my-8\">\n    <div class=\"w-full sm:w-1\/2 md:w-1\/3 flex flex-col items-center justify-center h-48 md:h-64 border-gray-300 border-r border-b hover:shadow-md hover:border-0 bg-white hover:transform-scale-subtle transition-normal hover:show-child\">\n      <div class=\"w-12 h-12 rounded-full bg-gray-300\" alt=\"\"><\/div>\n      <h3 class=\"mt-4 mb-1\">Digital<\/h3>\n      <p class=\"mt-4 text-center text-gray-700 leading-normal px-6 hidden hover:block\">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.<\/p>\n    <\/div>\n    <div class=\"w-full sm:w-1\/2 md:w-1\/3 flex flex-col items-center justify-center h-48 md:h-64 p-8  border-gray-300 border-r border-b hover:shadow-md hover:border-0 bg-white hover:transform-scale-subtle transition-normal hover:show-child\">\n      <div class=\"w-12 h-12 rounded-full bg-gray-300\" alt=\"\"><\/div>\n      <h3 class=\"mt-4 mb-1\">Branding<\/h3>\n      <p class=\"mt-4 text-center text-gray-700 leading-normal hidden hover:block\">Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat.<\/p>\n    <\/div>\n    <div class=\"w-full sm:w-1\/2 md:w-1\/3 flex flex-col items-center justify-center h-48 md:h-64 p-8  border-gray-300 border-b hover:shadow-md hover:border-0 bg-white hover:transform-scale-subtle transition-normal hover:show-child\">\n      <div class=\"w-12 h-12 rounded-full bg-gray-300\" alt=\"\"><\/div>\n      <h3 class=\"mt-4 mb-1\">Excellence<\/h3>\n      <p class=\"mt-4 text-center text-gray-700 leading-normal hidden hover:block\">Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.<\/p>\n    <\/div>\n    <div class=\"w-full sm:w-1\/2 md:w-1\/3 flex flex-col items-center justify-center h-48 md:h-64 p-8  border-gray-300 border-r hover:shadow-md hover:border-0 bg-white hover:transform-scale-subtle transition-normal hover:show-child\">\n      <div class=\"w-12 h-12 rounded-full bg-gray-300\" alt=\"\"><\/div>\n      <h3 class=\"mt-4 mb-1\">Strategy<\/h3>\n      <p class=\"mt-4 text-center text-gray-700 leading-normal hidden hover:block\">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.<\/p>\n    <\/div>\n    <div class=\"w-full sm:w-1\/2 md:w-1\/3 flex flex-col items-center justify-center h-48 md:h-64 p-8  border-gray-300 border-r hover:shadow-md hover:border-0 bg-white hover:transform-scale-subtle transition-normal hover:show-child\">\n      <div class=\"w-12 h-12 rounded-full bg-gray-300\" alt=\"\"><\/div>\n      <h3 class=\"mt-4 mb-1\">Design<\/h3>\n      <p class=\"mt-4 text-center text-gray-700 leading-normal hidden hover:block\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.<\/p>\n    <\/div>\n    <div class=\"w-full sm:w-1\/2 md:w-1\/3 flex flex-col items-center justify-center h-48 md:h-64 p-8 border-gray-300  hover:shadow-md hover:border-0 bg-white hover:transform-scale-subtle transition-normal hover:show-child\">\n      <div class=\"w-12 h-12 rounded-full bg-gray-300\" alt=\"\"><\/div>\n      <h3 class=\"mt-4 mb-1\">Development<\/h3>\n      <p class=\"mt-4 text-center text-gray-700 leading-normal hidden hover:block\">Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. <\/p>\n    <\/div>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 11,
                        name: "Features 6",
                        type: "fea",
                        con: "<section class=\"font-sans container max-w-xl m-auto flex flex-col lg:flex-row justify-center my-8\">\n  <div class=\"order-2 lg:order-1 w-full lg:w-1\/4 flex flex-col items-center lg:items-end justify-center text-center lg:text-right ml-0 lg:ml-8 mt-8\">\n    <div class=\"w-12 h-12 rounded-full bg-gray-300 mb-2\" alt=\"Avatar of Jonathan Reinink\"><\/div>\n    <h2 class=\"text-black mb-2 font-normal\">Praesent placerat.<\/h2>\n    <p class=\"text-gray-700 leading-normal mb-8\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<\/p>\n    <div class=\"w-12 h-12 rounded-full bg-gray-300 mb-2\" alt=\"Avatar of Jonathan Reinink\"><\/div>\n    <h2 class=\"text-black mb-2 font-normal\">Fusce pellentesque suscipit nibh.<\/h2>\n    <p class=\"text-gray-700 leading-normal mb-8\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<\/p>\n    <div class=\"w-12 h-12 rounded-full bg-gray-300 mb-2\" alt=\"Avatar of Jonathan Reinink\"><\/div>\n    <h2 class=\"text-black mb-2 font-normal\">Ut aliquam sollicitudin leo.<\/h2>\n    <p class=\"text-gray-700 leading-normal\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<\/p>\n    <\/div>\n  <div class=\"order-1 lg:order-2 w-full lg:w-1\/2 max-w-sm m-auto mb-6 lg:mb-0\">\n    <img src=\"https:\/\/stitches.hyperyolo.com\/images\/demo-phone.png\" alt=\"\">\n  <\/div>\n  <div class=\"order-last w-full lg:w-1\/4 flex flex-col items-center lg:items-start justify-center text-center lg:text-left mt-8 mr-8\">\n    <div class=\"w-12 h-12 rounded-full bg-gray-300 mb-2\" alt=\"Avatar of Jonathan Reinink\"><\/div>\n    <h2 class=\"text-black mb-2 font-normal\">Cras iaculis ultricies nulla.<\/h2>\n    <p class=\"text-gray-700 leading-normal mb-8\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<\/p>\n    <div class=\"w-12 h-12 rounded-full bg-gray-300 mb-2\" alt=\"Avatar of Jonathan Reinink\"><\/div>\n    <h2 class=\"text-black mb-2 font-normal\">Praesent placerat risus quis eros.<\/h2>\n    <p class=\"text-gray-700 leading-normal mb-8\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<\/p>\n    <div class=\"w-12 h-12 rounded-full bg-gray-300 mb-2\" alt=\"Avatar of Jonathan Reinink\"><\/div>\n    <h2 class=\"text-black mb-2 font-normal\">Nunc dignissim risus id metus.<\/h2>\n    <p class=\"text-gray-700 leading-normal\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<\/p>\n    <\/div>\n<\/section>"
                    },
                    {
                        id: 12,
                        name: "Feed 1",
                        type: "fee",
                        con: "<section class=\"font-sans container m-auto max-w-xl py-8\">\n  <div class=\"flex py-3\">\n    <div class=\"w-1\/8\">\n      <a href=\"#\" class=\"block rounded-full h-12 w-12 mr-2 bg-gray-300\"><\/a>\n    <\/div>\n    <div class=\"w-7\/8\">\n      <div class=\"flex justify-between\">\n        <div>\n          <span class=\"font-bold\"><a href=\"#\" class=\"text-black\">Natalie Rushman<\/a><\/span>\n          <span class=\"text-gray-700\">@natalie<\/span>\n          <span class=\"text-gray-700\">\u00b7<\/span>\n          <span class=\"text-gray-700\">May 26<\/span>\n        <\/div>\n        <div>\n          <a href=\"#\" class=\"text-gray-700 hover:text-black\"><i class=\"fa fa-chevron-down\"><\/i><\/a>\n        <\/div>\n      <\/div>\n      <div class=\"\">\n        <p class=\"my-3 text-sm\">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.<\/p>\n        <div class=\"pb-2\">\n          <span class=\"mr-4\">\n            <a href=\"#\" class=\"text-gray-500 no-underline hover:text-black\">\n              <i class=\"fa fa-comment fa-md mr-1\"><\/i>2\n            <\/a>\n          <\/span>\n          <span>\n            <a href=\"#\" class=\"text-gray-500 no-underline hover:text-black\">\n              <i class=\"fa fa-envelope fa-md\"><\/i>\n            <\/a>\n          <\/span>\n        <\/div>\n        <hr class=\"border-b\">\n        <div class=\"flex py-3\">\n          <div class=\"w-1\/8\">\n            <a href=\"#\" class=\"block rounded-full h-12 w-12 mr-2 bg-gray-300\"><\/a>\n          <\/div>\n          <div class=\"w-7\/8\">\n            <div>\n              <span class=\"font-bold\"><a href=\"#\" class=\"text-black\">Natalie Rushman<\/a><\/span>\n              <span class=\"text-gray-700\">@natalie<\/span>\n              <span class=\"text-gray-700\">\u00b7<\/span>\n              <span class=\"text-gray-700\">May 26<\/span>\n            <\/div>\n            <div class=\"\">\n              <p class=\"my-3 text-sm\">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.<\/p>\n              <div class=\"pb-2\">\n                <span class=\"mr-4\">\n                  <a href=\"#\" class=\"text-gray-500 no-underline hover:text-black\">\n                    <i class=\"fa fa-comment fa-md mr-1\"><\/i>2\n                  <\/a>\n                <\/span>\n                <span>\n                  <a href=\"#\" class=\"text-gray-500 no-underline hover:text-black\">\n                    <i class=\"fa fa-envelope fa-md\"><\/i>\n                  <\/a>\n                <\/span>\n              <\/div>\n            <\/div>\n          <\/div>\n        <\/div>\n        <hr class=\"border-b\">\n        <div class=\"flex py-3\">\n          <div class=\"w-1\/8\">\n            <a href=\"#\" class=\"block rounded-full h-12 w-12 mr-2 bg-gray-300\"><\/a>\n          <\/div>\n          <div class=\"w-7\/8\">\n            <div>\n              <span class=\"font-bold\"><a href=\"#\" class=\"text-black\">Natalie Rushman<\/a><\/span>\n              <span class=\"text-gray-700\">@natalie<\/span>\n              <span class=\"text-gray-700\">\u00b7<\/span>\n              <span class=\"text-gray-700\">May 26<\/span>\n            <\/div>\n            <div class=\"\">\n              <p class=\"my-3 text-sm\">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.<\/p>\n              <div class=\"pb-2\">\n                <span class=\"mr-4\">\n                  <a href=\"#\" class=\"text-gray-500 no-underline hover:text-black\">\n                    <i class=\"fa fa-comment fa-md mr-1\"><\/i>2\n                  <\/a>\n                <\/span>\n                <span>\n                  <a href=\"#\" class=\"text-gray-500 no-underline hover:text-black\">\n                    <i class=\"fa fa-envelope fa-md\"><\/i>\n                  <\/a>\n                <\/span>\n              <\/div>\n            <\/div>\n          <\/div>\n        <\/div>\n      <\/div>\n    <\/div>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 13,
                        name: "Footer 1",
                        type: "foo",
                        con: "<footer class=\"font-sans bg-black text-white py-8 px-4\">\n  <div class=\"mx-auto container overflow-hidden flex flex-col lg:flex-row justify-between\">\n    <a href=\"\/\" class=\"block mr-4 w-1\/2\">\n      <img src=\"https:\/\/stitches.hyperyolo.com\/images\/logo-white.png\" class=\"w-32\" alt=\"logo\">\n    <\/a>\n    <div class=\"w-1\/2 flex text-sm mt-6 lg:mt-0\">\n      <ul class=\"text-gray-700 list-none p-0 font-thin flex flex-col text-left\">\n        <li class=\"inline-block py-2 px-3 text-white uppercase no-underline font-medium tracking-wide\">Product<\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Popular<\/a><\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Trending<\/a><\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Catalog<\/a><\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Features<\/a><\/li>\n      <\/ul>\n      <ul class=\"text-gray-700 list-none p-0 font-thin flex flex-col text-left\">\n        <li class=\"inline-block py-2 px-3 text-white uppercase no-underline font-medium tracking-wide\">Company<\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Press Release<\/a>\n        <\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Mission<\/a><\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Strategy<\/a><\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Works<\/a><\/li>\n      <\/ul>\n      <ul class=\"text-gray-700 list-none p-0 font-thin flex flex-col text-left\">\n        <li class=\"inline-block py-2 px-3 text-white uppercase no-underline font-medium tracking-wide\">Info<\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Support<\/a><\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Developers<\/a><\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Customer\n            Services<\/a><\/li>\n        <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Started Guide<\/a>\n        <\/li>\n      <\/ul>\n      <div class=\"text-gray-700 flex flex-col\">\n        <div class=\"inline-block py-2 px-3 text-white uppercase font-medium tracking-wide\">Follow Us<\/div>\n        <div class=\"flex pl-4 justify-start\">\n          <a class=\"block flex items-center text-white hover:text-gray-500 mr-6 no-underline\" href=\"#\"><i\n              class=\"fab fa-github-alt\"><\/i><\/a>\n          <a class=\"block flex items-center text-white hover:text-gray-500 mr-6 no-underline\" href=\"#\"><i\n              class=\"fab fa-slack\"><\/i><\/a>\n          <a class=\"block flex items-center text-white hover:text-gray-500 no-underline\" href=\"#\"><i\n              class=\"fab fa-twitter\"><\/i><\/a>\n        <\/div>\n      <\/div>\n    <\/div>\n  <\/div>\n  <div class=\"pt-4 mt-4 text-gray-700 border-t border-gray-900 text-center\"> \u00a92019 Hyperyolo. All rights\n    reserved.<\/div>\n<\/footer>"
                    },
                    {
                        id: 14,
                        name: "Footer 2",
                        type: "foo",
                        con: "<footer class=\"font-sans bg-black text-white py-8 px-4\">\n  <div class=\"mx-auto max-w-xl overflow-hidden flex justify-between items-center\">\n    <ul class=\"text-sm text-gray-700 list-none p-0 flex items-center\">\n      <li> <a href=\"\/\" class=\"block mr-4 w-32\">\n          <img src=\"https:\/\/stitches.hyperyolo.com\/images\/logo-white.png\" class=\"\" alt=\"logo\">\n        <\/a><\/li>\n      <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Product<\/a><\/li>\n      <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">Company<\/a><\/li>\n      <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">FAQs<\/a><\/li>\n      <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-500 hover:text-gray-500-light no-underline\">About Us<\/a><\/li>\n    <\/ul>\n    <p class=\"inline-block py-2 px-3 text-gray-700 text-xs\"> \u00a92019 Hyperyolo. All rights reserved.<\/p>\n  <\/div>\n<\/footer>"
                    },
                    {
                        id: 15,
                        name: "Footer 3",
                        type: "foo",
                        con: "<footer class=\"font-sans bg-white py-8 px-4\">\n  <div\n    class=\"mx-auto container overflow-hidden flex flex-col md:flex-row justify-between pb-4 text-center md:text-left\">\n    <a href=\"#\" class=\"block mr-4 w-full md:w-1\/4\">\n      <img src=\"https:\/\/stitches.hyperyolo.com\/images\/logo.png\" class=\"w-32 -ml-8 md:ml-0\" alt=\"logo\">\n    <\/a>\n    <div class=\"w-full text-gray-900 mt-6 md:mt-0 leading-normal\">\n      <h4 class=\"py-2 uppercase font-bold tracking-wide\">About US<\/h4>\n      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's\n        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\n        a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\n        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\n        Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions\n        of Lorem Ipsum.<\/p>\n    <\/div>\n    <div class=\"text-gray-700 flex flex-col items-center w-full md:w-1\/4 mt-6 md:mt-0\">\n      <h4 class=\"inline-block py-2 px-3 uppercase font-bold tracking-wide text-gray-900\">Follow Us<\/h4>\n      <div class=\"flex pl-0 md:pl-4 justify-start\">\n        <a class=\"block flex items-center text-gray-900 hover:text-black mr-6 no-underline\" href=\"#\"><i\n            class=\"fab fa-github-alt\"><\/i><\/a>\n        <a class=\"block flex items-center text-gray-900 hover:text-black mr-6 no-underline\" href=\"#\"><i\n            class=\"fab fa-slack\"><\/i><\/a>\n        <a class=\"block flex items-center text-gray-900 hover:text-black no-underline\" href=\"#\"><i\n            class=\"fab fa-twitter\"><\/i><\/a>\n      <\/div>\n    <\/div>\n  <\/div>\n  <div class=\"pt-4 mt-4 text-gray-700 text-xs border-t border-gray-300 text-center\"> \u00a92019 Hyperyolo. All rights\n    reserved.<\/div>\n<\/footer>"
                    },
                    {
                        id: 16,
                        name: "Form 1",
                        type: "for",
                        con: "<form class=\"font-sans text-sm rounded w-full max-w-md mx-auto my-8 px-8 pt-6 pb-8\">\n  <div class=\"relative border rounded mb-4 shadow appearance-none label-floating\">\n    <input class=\"w-full py-2 px-3 text-gray-700 leading-normal rounded\" id=\"username\" type=\"text\" placeholder=\"Username\">\n    <label class=\"absolute block text-gray-700 top-0 left-0 w-full px-3 py-2 leading-normal\" for=\"username\">\n      Username\n    <\/label>\n  <\/div>\n  <div class=\"relative border rounded mb-4 shadow appearance-none label-floating\">\n    <input class=\"w-full py-2 px-3 text-gray-700 leading-normal rounded\" id=\"password\" type=\"password\" placeholder=\"Password\">\n    <label class=\"absolute block text-gray-700 top-0 left-0 w-full px-3 py-2 leading-normal\" for=\"password\">\n      Password\n    <\/label>\n  <\/div>\n  <div class=\"flex items-center justify-between\">\n    <button class=\"bg-black hover:bg-black text-white py-2 px-4\" type=\"button\">\n    Sign In\n    <\/button>\n    <a class=\"inline-block align-baseline text-gray-500 hover:text-gray-700\" href=\"#\">\n      Forgot Password?\n    <\/a>\n  <\/div>\n<\/form>"
                    },
                    {
                        id: 17,
                        name: "Hero 1",
                        type: "her",
                        con: "<section class=\"font-sans h-screen w-full bg-cover text-center flex flex-col items-center justify-center\"\n  style=\"background:url(https:\/\/source.unsplash.com\/random\/1920x1080) no-repeat center;\">\n  <div class=\"bg-white text-black rounded-full h-16 w-16 flex items-center justify-center mb-8\"><i\n      class=\"fas fa-play ml-1\"><\/i><\/div>\n  <label for=\"\" class=\"uppercase tracking-extrawide text-white text-xs font-hairline mt-8\">Watch Video<\/label>\n  <h3 class=\"text-white mx-auto max-w-sm mt-4 font-normal text-2xl leading-normal\">Differentiate Yourself And Attract\n    More Attention Sales And Profits<\/h3>\n<\/section>"
                    },
                    {
                        id: 18,
                        name: "Hero 2",
                        type: "her",
                        con: "<section class=\"antialiased font-sans w-full bg-gray-300 text-left text-black py-8\">\n  <div class=\"container mx-auto max-w-xl py-8 font-normal leading-normal\">\n    <h3 class=\"text-2xl\">Grow Your Business<\/h3>\n    <p class=\"\">Build high performing teams, establish design practices, mentor and grow the next generation of great designers, and design interfaces and experiences.<\/p>\n    <div class=\"max-w-sm mt-4 sm:flex\">\n      <input type=\"email\" class=\"block w-full focus:outline-0 bg-white py-3 px-6 mb-2 sm:mb-0\" name=\"email\" placeholder=\"Enter your email\" required=\"\">\n      <button class=\"uppercase text-sm text-white focus:outline-0 w-full sm:w-auto bg-black hover:bg-gray-900 focus:bg-gray-300 tracking-wide px-6\">Subscribe<\/button>\n    <\/div>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 19,
                        name: "Hero 3",
                        type: "her",
                        con: "<section class=\"bg-gray-300 font-sans\">\n  <div class=\"container m-auto flex flex-col md:flex-row max-w-xl\">\n    <div class=\"flex flex-col w-full lg:w-1\/2 justify-center items-start py-8\">\n      <label for=\"tagline\" class=\"uppercase tracking-loose\">best app ever<\/label>\n      <h1 class=\"my-4 font-normal\">Our Work Flow<\/h1>\n      <p class=\"leading-normal mb-4\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor\n        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, ex ea commodo consequat. \u2029\u2029Sed ut\n        perspiciatis unde omnis iste natus error sit voluptatem accusantium natus error sit.<\/p>\n      <button\n        class=\"bg-transparent hover:bg-black text-black font-semibold hover:text-white py-2 px-4 border border-black hover:border-transparent\">Learn\n        More<\/button>\n    <\/div>\n    <div class=\"w-full lg:w-1\/2 lg:py-6\"><img src=\"https:\/\/stitches.hyperyolo.com\/images\/demo-devices.png\" alt=\"image\"\n        class=\"w-full\"><\/div>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 20,
                        name: "List 1",
                        type: "lis",
                        con: "<ul class=\"font-sans list-none p-0 container m-auto text-gray-900\">\n  <li class=\"inline-block border-b border-gray-300 flex justify-between items-center py-4\">\n    <div class=\"flex items-start w-2\/5\">\n      <div class=\"w-10 h-10 rounded mr-3\">\n        <div class=\"rounded-full h-10 w-10 bg-gray-300 m-auto\"><\/div>\n      <\/div>\n      <div class=\"flex-1 overflow-hidden\">\n        <div>\n          <span class=\"font-bold\">Logan Slayer<\/span>\n          <span class=\"text-gray-700 text-xs\">@logan<\/span>\n        <\/div>\n        <p class=\"text-black leading-normal\">1-324-352-3000<\/p>\n      <\/div>\n    <\/div>\n    <p class=\"w-2\/5\">UI\/UX Designer @Squarespace.<\/p>\n    <label for=\"status\" class=\"font-bold w-1\/5 text-right\">Active<\/label>\n  <\/li>\n  <li class=\"inline-block border-b border-gray-300 flex justify-between items-center py-4\">\n    <div class=\"flex items-start w-2\/5\">\n      <div class=\"w-10 h-10 rounded mr-3\">\n        <div class=\"rounded-full h-10 w-10 bg-gray-300 m-auto\"><\/div>\n      <\/div>\n      <div class=\"flex-1 overflow-hidden\">\n        <div>\n          <span class=\"font-bold\">Sarah Mann<\/span>\n          <span class=\"text-gray-700 text-xs\">@sarah<\/span>\n        <\/div>\n        <p class=\"text-black leading-normal\">1-324-111-0000<\/p>\n      <\/div>\n    <\/div>\n    <p class=\"w-2\/5\">Web security expert at cloudflare<\/p>\n    <label for=\"status\" class=\"font-bold w-1\/5 text-right\">Inactive<\/label>\n  <\/li>\n  <li class=\"inline-block flex justify-between items-center py-4\">\n    <div class=\"flex items-start w-2\/5\">\n      <div class=\"w-10 h-10 rounded mr-3\">\n        <div class=\"rounded-full h-10 w-10 bg-gray-300 m-auto\"><\/div>\n      <\/div>\n      <div class=\"flex-1 overflow-hidden\">\n        <div>\n          <span class=\"font-bold\">Kotlin Lee<\/span>\n          <span class=\"text-gray-700 text-xs\">@kotlin<\/span>\n        <\/div>\n        <p class=\"text-black leading-normal\">1-332-435-1322<\/p>\n      <\/div>\n    <\/div>\n    <p class=\"w-2\/5\">System admin at Drip.<\/p>\n    <label for=\"status\" class=\"font-bold w-1\/5 text-right\">Active<\/label>\n  <\/li>\n<\/ul>"
                    },
                    {
                        id: 21,
                        name: "My Lead",
                        type: "my ",
                        con: "<section class=\"font-sans flex flex-col lg:flex-row\">\n  <div class=\"w-full lg:w-1\/2\"><img src=\"\/ipsum_images\/baking_01.jpeg\" alt=\"\"><\/div>\n  <div class=\"w-full lg:w-1\/2 flex flex-col items-center justify-center text-center p-8\">\n    <date for=\"date\" class=\"text-gray-500 text-sm uppercase tracking-widest\">january 10th 2020<\/date>\n    <h1 class=\"my-4 font-normal text-3xl font-bold leading-tight tracking-tight\">The Best Sound is from Wales<\/h1>\n    <p class=\"leading-normal mb-4 w-2\/3 text-gray-700\">Andy Fairweather Lowe and the impossible story.<\/p>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 22,
                        name: "Navigation 1",
                        type: "nav",
                        con: "<nav class=\"font-sans bg-white text-center flex justify-between my-4 mx-auto container overflow-hidden\">\n  <a href=\"\/\" class=\"block text-left\">\n    <img src=\"https:\/\/stitches.hyperyolo.com\/images\/logo.png\" class=\"h-10 sm:h-10 rounded-full\" alt=\"logo\">\n  <\/a>\n  <ul class=\"text-sm text-gray-700 list-none p-0 flex items-center\">\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Products<\/a><\/li>\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Pricing<\/a><\/li>\n    <li class=\"pr-2\"><a href=\"#\"\n        class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">FAQs<\/a><\/li>\n    <li class=\"pl-2 border-l\"><a href=\"#\"\n        class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Log In<\/a><\/li>\n    <button class=\"bg-black hover:bg-text-gray-800 text-white ml-4 py-2 px-3\">\n      Sign Up\n    <\/button>\n  <\/ul>\n<\/nav>"
                    },
                    {
                        id: 23,
                        name: "Navigation 2",
                        type: "nav",
                        con: "<nav class=\"font-sans bg-white text-center flex justify-between items-center my-4 mx-auto container overflow-hidden\">\n  <button class=\"bg-transparent text-sm hover:text-gray-700 text-gray-900 py-2 px-3\">\n    Subscribe\n  <\/button>\n  <ul class=\"text-sm text-gray-700 list-none p-0 flex items-center\">\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Products<\/a><\/li>\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Pricing<\/a><\/li>\n    <li class=\"px-6\"><a href=\"\/\">\n        <img src=\"https:\/\/stitches.hyperyolo.com\/images\/logo.png\" class=\"h-10 sm:h-10 rounded-full\" alt=\"logo\">\n      <\/a><\/li>\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">About Us<\/a><\/li>\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Status<\/a><\/li>\n  <\/ul>\n  <button class=\"text-sm bg-black hover:bg-text-gray-800 text-white ml-4 py-2 px-3\">\n    Log In\n  <\/button>\n<\/nav>"
                    },
                    {
                        id: 24,
                        name: "Navigation 3",
                        type: "nav",
                        con: "<nav class=\"font-sans bg-white text-center flex justify-between my-4 mx-auto container overflow-hidden items-center\">\n  <div class=\"flex items-center\">\n    <a href=\"\/\" class=\"mr-4 w-32\">\n      <img src=\"https:\/\/stitches.hyperyolo.com\/images\/logo.png\" class=\"rounded-full w-full\" alt=\"logo\">\n    <\/a>\n    <input type=\"search\" placeholder=\"Search\" class=\"text-sm transition focus:outline-0 border border-transparent focus:bg-white focus:border-gray-300 placeholder-gray-900 rounded bg-gray-300 py-1 px-2 pl-10 appearance-none leading-normal ds-input\">\n    <ul class=\"text-sm text-gray-700 list-none p-0 flex items-center\">\n      <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Status<\/a><\/li>\n      <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Questions<\/a><\/li>\n    <\/ul>\n  <\/div>\n  <ul class=\"text-sm text-gray-700 list-none p-0 flex items-center\">\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Log In<\/a><\/li>\n    <li>\n        <button class=\"bg-black hover:bg-text-gray-800 text-white ml-4 py-2 px-3\">\n    Sign Up\n    <\/button>\n    <\/li>\n  <\/ul>\n<\/nav>"
                    },
                    {
                        id: 25,
                        name: "Navigation 4",
                        type: "nav",
                        con: "<nav class=\"font-sans bg-white text-center flex justify-between items-center my-4 mx-auto container overflow-hidden\">\n  <a href=\"#\">\n    <img src=\"https:\/\/stitches.hyperyolo.com\/images\/logo.png\" class=\"h-10\" alt=\"logo\">\n  <\/a>\n  <ul class=\"text-sm text-gray-700 list-none p-0 flex items-center\">\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Products<\/a><\/li>\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Pricing<\/a><\/li>\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">About Us<\/a><\/li>\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Status<\/a><\/li>\n  <\/ul>\n  <ul class=\"text-sm text-gray-700 list-none p-0 flex items-center\">\n    <li><a href=\"#\" class=\"inline-block py-2 px-3 text-gray-900 hover:text-gray-700 no-underline\">Log In<\/a><\/li>\n    <li>\n      <button class=\"bg-black hover:bg-text-gray-800 text-white ml-4 py-2 px-3\">\n        Sign Up\n      <\/button>\n    <\/li>\n  <\/ul>\n<\/nav>"
                    },
                    {
                        id: 26,
                        name: "Notification 1",
                        type: "not",
                        con: "<section class=\"bg-gray-100 text-gray-900 py-4 lg:px-4\" role=\"alert\">\n  <div class=\"container items-center flex max-w-xl m-auto leading-none\">\n    <span class=\"flex rounded-full bg-gray-300 uppercase px-2 py-1 text-xs font-bold mr-3\">New<\/span>\n    <span class=\"mr-2 text-left mr-auto\">New Feature! It is a long established fact that a reader will be distracted.<\/span>\n    <span class=\"opacity-75 h-4 w-4\"><i class=\"fas fa-chevron-right\"><\/i><\/span>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 27,
                        name: "Notification 2",
                        type: "not",
                        con: "<section class=\"bg-gray-100 text-gray-900 py-4 lg:px-4\" role=\"alert\">\n  <div class=\"items-center flex leading-none\">\n    <div class=\"rounded-full h-6 w-6 mr-2 bg-gray-300\"><\/div>\n    <span class=\"mr-2 text-left mr-auto\">New Feature! It is a long established fact that a reader will be distracted.<a href=\"#\" class=\"ml-2 uppercase text-black text-sm text-blue-500\">read more<\/a><\/span>\n    <span class=\"opacity-75 h-4 w-4\"><i class=\"fas fa-times\"><\/i><\/span>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 28,
                        name: "Pricing 1",
                        type: "pri",
                        con: "<section class=\"font-sans container m-auto max-w-xl flex flex-col flex-wrap sm:flex-row justify-center\">\n  <div class=\"w-full sm:w-1\/2 lg:w-1\/4 text-center py-8\">\n    <label for=\"\" class=\"uppercase tracking-loose font-bold text-sm\">Basic Plan<\/label>\n    <h1 for=\"\" class=\"uppercase tracking-loose font-bold text-5xl my-2\">$29<span class=\"text-gray-700 font-light text-xs\">\/mo<\/span><\/h1>\n    <p class=\"my-2 text-gray-700\"><strong class=\"text-black pr-2\">5<\/strong>Projects<\/p>\n    <p class=\"my-2 text-gray-700\"><strong class=\"text-black pr-2\">20<\/strong>Images<\/p>\n    <p class=\"mt-2 mb-6 text-gray-700\"><strong class=\"text-black pr-2\">9\/5<\/strong>Support<\/p>\n    <button class=\"bg-transparent hover:bg-black text-black-dark font-semibold hover:text-white py-2 px-4 border border-black hover:border-transparent\">\n    Buy Now\n    <\/button>\n  <\/div>\n  <div class=\"w-full sm:w-1\/2 lg:w-1\/4 text-center py-8\">\n    <label for=\"\" class=\"uppercase tracking-loose font-bold text-sm\">Team Plan<\/label>\n    <h1 for=\"\" class=\"uppercase tracking-loose font-bold text-5xl my-2\">$59<span class=\"text-gray-700 font-light text-xs\">\/mo<\/span><\/h1>\n    <p class=\"my-2 text-gray-700\"><strong class=\"text-black pr-2\">10<\/strong>Projects<\/p>\n    <p class=\"my-2 text-gray-700\"><strong class=\"text-black pr-2\">40<\/strong>Images<\/p>\n    <p class=\"mt-2 mb-6 text-gray-700\"><strong class=\"text-black pr-2\">12\/7<\/strong>Support<\/p>\n    <button class=\"bg-transparent hover:bg-black text-black-dark font-semibold hover:text-white py-2 px-4 border border-black hover:border-transparent\">\n    Buy Now\n    <\/button>\n  <\/div>\n  <div class=\"w-full sm:w-1\/2 lg:w-1\/4 text-center py-8\">\n    <label for=\"\" class=\"uppercase tracking-loose font-bold text-sm\">Corporate Plan<\/label>\n    <h1 for=\"\" class=\"uppercase tracking-loose font-bold text-5xl my-2\">$79<span class=\"text-gray-700 font-light text-xs\">\/mo<\/span><\/h1>\n    <p class=\"my-2 text-gray-700\"><strong class=\"text-black pr-2\">Unlimited<\/strong>Projects<\/p>\n    <p class=\"my-2 text-gray-700\"><strong class=\"text-black pr-2\">Unlimited<\/strong>Images<\/p>\n    <p class=\"mt-2 mb-6 text-gray-700\"><strong class=\"text-black pr-2\">24\/7<\/strong>Support<\/p>\n    <button class=\"bg-transparent hover:bg-black text-black-dark font-semibold hover:text-white py-2 px-4 border border-black hover:border-transparent\">\n    Buy Now\n    <\/button>\n  <\/div>\n  <div class=\"w-full sm:w-1\/2 lg:w-1\/4 text-center py-8\">\n    <label for=\"\" class=\"uppercase tracking-loose font-bold text-sm\">Enterprise Plan<\/label>\n    <h1 for=\"\" class=\"uppercase tracking-loose font-bold text-5xl my-2\">$199<span class=\"text-gray-700 font-light text-xs\">\/mo<\/span><\/h1>\n    <p class=\"my-2 text-gray-700\"><strong class=\"text-black pr-2\">Unlimited<\/strong>Projects<\/p>\n    <p class=\"my-2 text-gray-700\"><strong class=\"text-black pr-2\">Unlimited<\/strong>Images<\/p>\n    <p class=\"mt-2 mb-6 text-gray-700\"><strong class=\"text-black pr-2\">24\/7<\/strong>Support<\/p>\n    <button class=\"bg-transparent hover:bg-black text-black-dark font-semibold hover:text-white py-2 px-4 border border-black hover:border-transparent\">\n    Buy Now\n    <\/button>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 29,
                        name: "Progress 1",
                        type: "pro",
                        con: "<section class=\"font-sans flex justify-between mt-6 mx-auto max-w-xl\">\n  <a href=\"#\" class=\"w-1\/4 flex flex-col items-center text-center text-xs text-black no-underline\">\n    <div class=\"bg-black text-white rounded-full h-8 w-8 flex items-center justify-center mb-2 z-10\"><i class=\"fas fa-check\"><\/i><\/div>\n    <label class=\"font-bold uppercase tracking-wide\">Step 1<\/label>\n  <\/a>\n  <a href=\"#\" class=\"w-1\/4 relative flex flex-col items-center text-center text-xs text-black no-underline\">\n    <div class=\"bg-black text-white rounded-full h-8 w-8 flex items-center justify-center mb-2 z-10\"><i class=\"fas fa-check\"><\/i><\/div>\n    <div class=\"absolute h-1 mt-4 bg-black inset-x-0 -translate-50-50\"><\/div>\n    <label class=\"font-bold uppercase tracking-wide\">Step 2<\/label>\n  <\/a>\n  <a href=\"#\" class=\"w-1\/4 relative flex flex-col items-center text-center text-xs text-black no-underline\">\n    <div class=\"bg-black text-white rounded-full h-8 w-8 flex items-center justify-center mb-2 z-10\"><i class=\"fas fa-check\"><\/i><\/div>\n    <div class=\"absolute h-1 mt-4 bg-black inset-x-0 -translate-50-50\"><\/div>\n    <label class=\"font-bold uppercase tracking-wide\">Step 3<\/label>\n  <\/a>\n  <a href=\"#\" class=\"w-1\/4 relative flex flex-col items-center text-center text-xs text-black no-underline\">\n    <div class=\"bg-gray-700 text-white rounded-full h-8 w-8 flex items-center justify-center mb-2 z-10\"><i class=\"fas fa-check\"><\/i><\/div>\n    <div class=\"absolute h-1 mt-4 bg-gray-700 inset-x-0 -translate-50-50\"><\/div>\n    <label class=\"font-bold uppercase tracking-wide text-gray-700\">Step 4<\/label>\n  <\/a>\n<\/section>"
                    },
                    {
                        id: 30,
                        name: "Stats 1",
                        type: "sta",
                        con: "<section class=\"bg-white py-4 font-sans\">\n  <div class=\"container max-w-xl m-auto flex flex-wrap md:flex-no-wrap items-center justify-center\">\n    <h1 class=\"w-full md:w-1\/4 font-medium tracking-normal mb-4 md:mb-0\">Important<br>Stats<\/h1>\n    <div class=\"w-1\/3 md:w-1\/4\">\n      <span class=\"text-xs inline-block mr-2 uppercase text-gray-900 tracking-wide\">clickrate<\/span>\n      <h2 class=\"inline-block\">34%<\/h2>\n    <\/div>\n    <div class=\"w-1\/3 md:w-1\/4\">\n      <span class=\"text-xs inline-block mr-2 uppercase text-gray-900 tracking-wide\">pageviews<\/span>\n      <h2 class=\"inline-block\">465<\/h2>\n    <\/div>\n    <div class=\"w-1\/3 md:w-1\/4\">\n      <span class=\"text-xs inline-block mr-2 uppercase text-gray-900 tracking-wide\">influence<\/span>\n      <h2 class=\"inline-block\">65%<\/h2>\n    <\/div>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 31,
                        name: "Stats 2",
                        type: "sta",
                        con: "<section class=\"bg-white py-4 font-sans\">\n  <div class=\"container max-w-xl m-auto flex flex-wrap md:flex-no-wrap items-center justify-between\">\n    <div class=\"flex w-full justify-start justify-center md:justify-start\">\n      <div class=\"flex flex-col border-r px-8 items-center\">\n        <h1 class=\"\">34%<\/h1>\n        <span class=\"text-xs block uppercase text-gray-900 tracking-wide mt-1\">clickrate<\/span>\n      <\/div>\n      <div class=\"flex flex-col px-8 border-r items-center\">\n        <h1 class=\"\">465<\/h1>\n        <span class=\"text-xs block uppercase text-gray-900 tracking-wide mt-1\">pageviews<\/span>\n      <\/div>\n      <div class=\"flex flex-col px-8 items-center\">\n        <h1 class=\"\">65%<\/h1>\n        <span class=\"text-xs block uppercase text-gray-900 tracking-wide mt-1\">influence<\/span>\n      <\/div>\n    <\/div>\n    <button class=\"w-full md:w-32 bg-black hover:bg-black text-white py-2 px-4 mt-6 md:mt-0\" type=\"button\">\n    Read More\n    <\/button>\n  <\/div>\n<\/section>"
                    },
                    {
                        id: 32,
                        name: "Tabs 1",
                        type: "tab",
                        con: "<section class=\"bg-white py-4 font-sans\">\n  <div class=\"container m-auto max-w-xl flex items-baseline justify-start border-b-2 border-gray-300 mb-10\">\n  <h2 class=\"text-gray-700 text-base font-bold tracking-wide uppercase py-4 px-6\">All<\/h2>\n  <h2 class=\"text-base font-bold tracking-wide uppercase py-4 px-6 border-b-2 border-black -mb-4\">Recent<\/h2>\n  <h2 class=\"text-gray-700 text-base font-bold tracking-wide uppercase py-4 px-6\">Assigned to Me<\/h2>\n  <h2 class=\"text-gray-700 text-base font-bold tracking-wide uppercase py-4 px-6\">Pending<\/h2>\n  <\/div>\n<\/section>"
                    }
                ],

                listorig: [
                    { name: "John", id: 1 },
                    { name: "Joao", id: 2 },
                    { name: "Jean", id: 3 },
                    { name: "Gerard", id: 4 }
                ],
                list2: []
            };
        },
        methods: {
            log: function(evt) {
                window.console.log(evt);
                window.console.log(this.list2);
            },
            onMove({ relatedContext, draggedContext }) {
                const relatedElement = relatedContext.element;
                const draggedElement = draggedContext.element;
                return (
                    (!relatedElement || !relatedElement.fixed) && !draggedElement.fixed
                );
            },
            remove: function(indx) {
                this.$delete(this.list2, indx)
            }
        },
        computed: {
            dragOptions() {
                return {
                    animation: 0, group: "description", disabled: !this.editable, ghostClass: "ghost"
                };
            },
        }

    };
</script>
<style>
    .flip-list-move {
        transition: transform 0.5s;
    }

    .no-move {
        transition: transform 0s;
    }

    .sortable-ghost {
        opacity: 0.1;
        background: #fbb147;
    }

    .list-group {
        min-height: 520px;
    }

    .dragArea.list-group .list-group-item:last-child{
        margin-bottom: 100px;

    }

    .list-group-item {
        cursor: move;
    }

    /*.list-group-item i {*/
    /*  cursor: pointer;*/
    /*}*/

    .work_area {
        height: calc(100vh - 32px);
    }


    .component_list {
        width: 1120px;
    }
    .result_list {
        /*width: 10vw;*/
    }

    .component_list .list-group .list-group-item{
        opacity: 0.3;
        transform: scale(0.7);
    }

    .component_list:hover .list-group{
        opacity: 1;
    }




    .component_list section {



        margin-bottom: 100px;
        background-color: white;
    }

    .result_list,
    .component_list {
        padding: 0 10px;
    }




    .result_list {
        border-left: .5px solid #c2c2c2;
    }


</style>
