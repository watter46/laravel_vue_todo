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
      <ul class="list-group" v-for="todo in todos" v-bind:key="todo.id">
        <li class="list-group-item">{{ todo.task }}</li>
        <span>
            <button type="button" class="btn btn-outline-secondary bg-danger text-white" @click.prevent="deleteTask">削除</button>
        </span>

        <div class="col col-12 p-2 todo-item" todo-id="0">
        <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="checkbox" onchange="TodoChecked(0)" aria-label="Checkbox for following text input" false="">
          </div>
        </div>
        <input type="text" readonly="" class="form-control false" aria-label="Text input with checkbox" value="fff">
        <div class="input-group-append">
          <button todo-id="0" class="btn btn-outline-secondary bg-danger text-white" type="button" onclick="DeleteTodo(this);">X</button>
        </div>
        </div>
        </div>
      </ul>
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
            deleteTask() {

            }
        },
        mounted() {
            this.getJsonData();
        },
    }
</script>
