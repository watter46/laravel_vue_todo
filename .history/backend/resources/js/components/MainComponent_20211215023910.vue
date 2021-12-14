<template>
<div class="container">
  <div class="row justify-content-center align-items-center main-row">
    <div class="col shadow main-col bg-white">
			<form>
					<div class="form-group">
							<div class="input-group">
									<input type="text" class="form-control" aria-label="Text input with checkbox" v-model="newItem">
									<span>
											<button id="send" type="type" class="btn btn-primary" @click.prevent="addTask">追加</button>
									</span>
							</div>
					</div>
			</form>
      <div class="container">
        <ul class="list-group row" v-for="todo in todos" v-bind:key="todo.id">
          <div class="col-9">
            <li class="list-group-item">{{ todo.task }}</li>
          </div>
          <div class="col">
            <button type="button" class="btn btn-outline-secondary bg-danger text-white col" @click.prevent="deleteTask(todo.id)">X</button>
          </div>
        </ul>
      </div>
    </div>
  </div>
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
            },
            deleteTask(task_id) {
                axios.post('/api/delete', {
                  id: task_id 
                })
                .then((response) => {
                  this.todos = response.data
                });
            }
        },
        mounted() {
            this.getJsonData();
        },
    }
</script>
