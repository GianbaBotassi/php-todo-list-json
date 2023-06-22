<script >

import axios from 'axios';

export default {
  data() {
    return {
      // urlPHP: "http://localhost/index.php",
      tasks: [],
      // headers: "'Content-Type': 'multipart/form-data'"
    }
  },
  mounted() {
    axios.get('http://localhost/index.php')
      .then(response => {
        console.log(response.data);
      })
  }
}
</script>



<template>
  <h1>Todo List</h1>
  <ul class="container">
    <li v-for="ciao in 4">
      <span>Ciao</span>
      <i class="fa-solid fa-trash"></i>
    </li>

  </ul>
  <form>

    <input type="text" name="newtask" id="newtask" placeholder="Inserisci un nuovo task..">
    <input type="submit" value="Inserisci">


  </form>
</template>

<style></style>
