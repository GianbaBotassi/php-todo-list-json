<script >

import axios from 'axios';

export default {
  data() {
    return {
      urlIndexPhp: "http://localhost/Esercizi%20BackEnd/php-todo-list-json/tmp/index.php",
      urlActionTaskPhp: 'http://localhost/Esercizi%20BackEnd/php-todo-list-json/tmp/actionTask.php',
      newTask: "",
      tasks: [],
      headers: {
        headers: { 'Content-Type': 'multipart/form-data' }
      }
    }
  },
  mounted() {
    axios.get(this.urlIndexPhp)
      .then(response => {
        this.tasks = response.data;   //prende all'inizio task list da server PHP
      })
  },
  methods: {
    addTask() {   //metodo per aggiungere nuova task
      const data = {
        name: this.newTask,
        action: "add"
      }
      if (this.newTask === "") {    //return in caso di campo vuoto
        return
      }
      this.axiosPostCall(data)
    },
    deleteTask(idx) {   //metodo per eliminare task
      const data = {
        index: idx,
        action: "delete"
      };
      this.axiosPostCall(data)
    },
    toggleTask(idx) {   //metodo per togglare task.done
      const data = {
        index: idx,
        action: "toggle"
      };
      this.axiosPostCall(data)
    },
    axiosPostCall(data) {
      axios.post(this.urlActionTaskPhp, data, this.headers)
        .then(response => {
          this.tasks = response.data;
          this.newTask = ""
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
      <span :class="task.done ? 'done' : ''" @click="toggleTask(idx)">{{ task.name }}</span>
      <i class="fa-solid fa-trash" @click="deleteTask(idx)"></i>
    </li>

  </ul>
  <form @submit.prevent="addTask">
    <input type="text" name="newtask" id="newtask" v-model.trim="newTask" placeholder="Inserisci un nuovo task..">
    <input type="submit" value="Inserisci">
  </form>
</template>

<style></style>
