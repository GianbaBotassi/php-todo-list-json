<script >

import axios from 'axios';

export default {
  data() {
    return {
      urlIndexPhp: "http://localhost/Esercizi%20BackEnd/php-todo-list-json/tmp/index.php",
      newTask: "",
      tasks: []
    }
  },
  mounted() {
    axios.get(this.urlIndexPhp)
      .then(response => {
        this.tasks = response.data;   //prende task list da server PHP
      })
  },
  methods: {
    addTask() {
      const url = 'http://localhost/Esercizi%20BackEnd/php-todo-list-json/tmp/newTask.php';
      const data = {
        name: this.newTask,
      };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      if (this.newTask === "") {    //return in caso di campo vuoto
        return
      }

      axios.post(url, data, headers)
        .then(response => {

          this.tasks = response.data;

          this.newTask = ""
        })
        .catch(error => {
          console.error(error);
        });
    },
    deleteTask(idx) {
      const url = 'http://localhost/Esercizi%20BackEnd/php-todo-list-json/tmp/deleteTask.php';
      const data = { index: idx };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      axios.post(url, data, headers)
        .then(response => {
          this.tasks = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    toggleTask(idx) {
      const url = 'http://localhost/Esercizi%20BackEnd/php-todo-list-json/tmp/toggleDoneTask.php';
      const data = { index: idx };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      axios.post(url, data, headers)
        .then(response => {
          this.tasks = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
}
</script>



<template>
  <h1>Todo List</h1>
  <ul class="container">
    <li v-for="(task, idx) in tasks" :key="idx">
      <span :class="task.done ? 'done' : ''" @click="toggleTask.trim(idx)">{{ task.name }}</span>
      <i class="fa-solid fa-trash" @click="deleteTask(idx)"></i>
    </li>

  </ul>
  <form @submit.prevent="addTask">
    <input type="text" name="newtask" id="newtask" v-model.trim="newTask" placeholder="Inserisci un nuovo task..">
    <input type="submit" value="Inserisci">
  </form>
</template>

<style></style>
