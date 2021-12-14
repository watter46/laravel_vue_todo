<template>
<div class="container">
  <div class="row justify-content-center align-items-center main-row">
    <div class="col shadow main-col bg-white">
			<form>
					<div class="form-group">
							<div class="input-group">
									<input type="text" class="form-control" aria-label="Text input with checkbox" v-model="newItem">
									<button type="button" class="btn btn-primary" @click.prevent="addTask">追加</button>
							</div>
					</div>
			</form>
      
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          A list item
          <button class="btn btn-outline-secondary bg-danger text-white" @click.prevent="deleteTask(todo.id)">X</button>
        </li>
      </ul>


      <div class="container">
        <div class="row">
          <div class="col" v-for="todo in todos" v-bind:key="todo.id">
            <ul>
              <li class="form-control">{{ todo.task }}</li>
            </ul>
          </div>
          <div class="col">
            <button type="button" class="btn btn-outline-secondary bg-danger text-white" @click.prevent="deleteTask(todo.id)">X</button>
          </div>
        </div>
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
