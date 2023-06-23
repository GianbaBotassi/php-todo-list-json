<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type: application/json");


$dataReceived = $_POST;   //ricevo dati da newTask da Vue

$fileTasks = "tasks.json";    //richiamo todolist json

$dataTaskStr = file_get_contents($fileTasks);   //ottengo i dati in stringa json

$data = json_decode($dataTaskStr);    //decodifico il file json

// Condizioni in base alla "action" richiesta da axios

if($dataReceived['action'] === "add" ){   //Aggiunge task

    $newTask = new StdClass();
    $newTask->name = $dataReceived['name'];
    $newTask->done = false;
    
    // var_dump(array($newTask));
    $data[] = $newTask;
} elseif ($dataReceived['action'] === "delete"){    //elimina task
  
  array_splice($data, $dataReceived['index'], 1);

//  var_dump($dataReceived['index']);
} elseif ($dataReceived['action'] === "toggle"){    //toggla task.done

  $data[$dataReceived['index']]->done = !$data[$dataReceived['index']]->done;

};

$dataTaskStr = json_encode($data);    //faccio tornare in str json

file_put_contents($fileTasks, $dataTaskStr);    //riaggiorno il file json

echo $dataTaskStr;    //mando come risposta axios il file aggiornato
?>
