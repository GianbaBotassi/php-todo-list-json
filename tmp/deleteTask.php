<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type: application/json");


$indexTask = $_POST['index'];   //ricevo oggetto newTask da Vue

$fileTasks = "tasks.json";    //richiamo todolist json

$dataTaskStr = file_get_contents($fileTasks);   //ottengo i dati in stringa json

$data = json_decode($dataTaskStr);    //decodifico il file json

array_splice($data, $indexTask, 1);   //elimino l'elemento dell'array con l'indice inviato, n.b.:non è un problema se indice arriva sotto forma di stringa

$dataTaskStr = json_encode($data);    //faccio tornare in str json

file_put_contents($fileTasks, $dataTaskStr);    //riaggiorno il file json

echo $dataTaskStr;    //mando come risposta axios il file aggiornato
?>
