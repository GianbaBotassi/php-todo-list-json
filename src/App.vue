<script >
</script>

<template>
  <h1>Todo List</h1>
  <ul class="container">
    <li>
      <span>Ciao</span>
      <i class="fa-solid fa-trash"></i>
    </li>
    <li>
      <span>Ciao</span>
      <span>Ciao</span>
    </li>
    <li>
      <span>Ciao</span>
      <span>Ciao</span>
    </li>
  </ul>
  <form>

    <input type="text" name="new" id="">

  </form>
</template>

<style>
.container {
  background-color: white;
  width: 300px;
  border-radius: 10px;
  color: black;
}

ul {
  list-style: none;
  text-align: left;
  padding: 0;

}

li {
  padding: 20px;
  border-bottom: 1px solid black;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

i {
  padding: 5px;
  background-color: rgb(195, 78, 78);
  color: white;
  border-radius: 5px;
  cursor: pointer;
}

i:hover {
  background-color: red;
}
</style>
