<template>
    <div class="row">
        <div class="work_area row-auto  w-screen flex">

            <div class="component_list   overflow-y-scroll">

                <draggable class="dragArea list-group" :list="list1" :group="{ name: 'people', pull: 'clone', put: false }" >
                    <div class="list-group-item"  v-for="brick in list1">

                        <img v-bind:src="'/storage/' + brick.id+'.png'" />
                    </div>
                </draggable>
            </div>
            <!--------->
            <div class="result_list  overflow-y-scroll">
                <draggable class="dragArea list-group" :list="list2" group="people" @change="log" :move="onMove">
                    <div @click.shift="remove(i)" class="list-group-item" v-for="brick,i in list2" >
                        <img v-bind:src="'/storage/' + brick.id+'.png'" />

                    </div>
                </draggable>
            </div>

            <ul class="w-2 w-1/12 ">
                <li class="w-full">
                    <button @click="previewPage()" v-bind:disabled="!buttonActive" class="w-full text-center mt-6 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <span>Preview</span>
                </button></li>

               <!-- <li><button v-bind:disabled="!buttonActive" class="w-full text-center mt-6 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <span>Download</span>
                </button></li>-->

                <li><button @click="clearlist()" v-bind:disabled="!buttonActive" class="w-full text-center mt-6 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <span>Clear</span>
                </button></li>

                <li><button @click="loadlist(designCode)" v-bind:disabled="designCode.length === 0" class="w-full text-center mt-6 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <span>Load</span>
                </button></li>

                <li>
                    <input v-model="designCode" class="mt-6  shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="code">
                </li>

            </ul>

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
                list1: bricks,
                list2: [],
                designCode: '',
            };
        },
        methods: {
            log: function() {
                this.designCode = this.calcCode;
            },
            onMove({ relatedContext, draggedContext }) {
                const relatedElement = relatedContext.element;
                const draggedElement = draggedContext.element;
                return (
                    (!relatedElement || !relatedElement.fixed) && !draggedElement.fixed
                );
            },
            remove: function(indx) {
                this.$delete(this.list2, indx);

                let activeCode = this.list2.map(row => {
                    return row.id
                });

                this.designCode = activeCode.join('-');;
            },
            clearlist: function() {
                this.list2 = [];
                this.log();
            },
            loadlist: function(list) {
                let choices = list.split('-');

                var result = this.list1.reduce(function(map, obj) {
                    map[obj.id] = obj;
                    return map;
                }, {});

                this.list2 = choices.map(r =>{
                    return result[r];
                });
            },
            previewPage: function(){

                window.open('/preview/' + this.designCode, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
            }

        },
        computed: {
            dragOptions() {
                return {
                    animation: 0, group: "description", disabled: !this.editable, ghostClass: "ghost"
                };
            },
            calcCode() {
               let activeCode = this.list2.map(row => {
                    return row.id
                });
                return activeCode.join('-');
            },
            buttonActive() {
                return this.list2.length > 0;
            }
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

    .component_list {
        width: 350px;

    }

    .result_list {

        width: 700px;

    }


    .work_area {
        height: calc(100vh - 32px);
    }




    .component_list .list-group .list-group-item{
        cursor: move;
        box-shadow: 3px 2px 4px 1px #00000042;
        margin: 17px;
        opacity: .8;
    }

    .component_list .list-group .list-group-item:hover{
        opacity: 1;
    }




    /*.component_list section {*/



    /*    margin-bottom: 100px;*/
    /*    background-color: white;*/
    /*}*/

    /*.result_list,*/
    /*.component_list {*/
    /*    padding: 0 10px;*/
    /*}*/




    /*.result_list {*/
    /*    border-left: .5px solid #c2c2c2;*/
    /*}*/


</style>
