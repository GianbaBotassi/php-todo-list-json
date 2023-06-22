<?php

  header("Access-Control-Allow-Origin: http://localhost:5173");
  header("Access-Control-Allow-Headers: X-Requested-With");

  $tasks = file_get_contents('tasks.json');
  echo $tasks;

?>