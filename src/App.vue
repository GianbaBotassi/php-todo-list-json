<script >

import axios from 'axios';

export default {
  data() {
    return {
      urlPHP: "http://localhost/Esercizi%20BackEnd/php-todo-list-json/tmp/index.php",
      newTask: "",
      tasks: [],
      // headers: "'Content-Type': 'multipart/form-data'"
    }
  },
  mounted() {
    axios.get(this.urlPHP)
      .then(response => {
        this.tasks = response.data;
      })
  },
  methods: {
    addTask() {
      console.log(this.newTask);
    },
    doneTask(item) {
      item.done = !item.done
    }
  }
}
</script>



<template>
  <h1>Todo List</h1>
  <ul class="container">
    <li v-for="task in tasks" :key="task.id">
      <span :class="task.done ? 'done' : ''" @click="doneTask(task)">{{ task.name }}</span>
      <i class="fa-solid fa-trash"></i>
    </li>

  </ul>
  <form>

    <input type="text" name="newtask" id="newtask" v-model="newTask" placeholder="Inserisci un nuovo task..">
    <input type="submit" value="Inserisci" @click.prevent="addTask">


  </form>
</template>

<style></style>
