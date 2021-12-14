<template>
<div class="container">
    <form>
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" v-model="newItem">
                <span>
                    <button id="send" type="type" class="btn btn-primary" @click.prevent="addTask">追加</button>
                </span>
            </div>
        </div>
    </form>
    <ul class="list-group">
        <li class="list-group-item" v-for="todo in todos" v-bind:key="todo.id">{{ todo.task }}</li>
    </ul>
</div>
</template>
<script>
    export default {
        data() {
            return {
                newItem: "",
                todos: []
            }
        },
        methods: {
            getJsonData() {
                axios.get('/api/get')
                .then((response) => {
                    this.todos = response.data;
                });
            },
            addTask() {
                axios.post('/api/add', {
                    task: this.newItem
                })
                .then((response) => {
                    this.todos = response.data;
                    this.newItem = "";
                });
            }
        },
        mounted() {
            this.getJsonData();
        },
    }
</script>
