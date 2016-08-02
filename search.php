<?php

require 'models/DictonaryModel.php';
require 'models/HistoryModel.php';

if(isset($_POST['input'])){
    $input = $_POST['input']; 
    $historyModel = new HistoryModel();
    $historyModel->insertWord($input);
    $dictonaryModel = new DictonaryModel();
    $definitionArray = $dictonaryModel->getDefinition($input);
    $definition = " ";
    
    foreach ($definitionArray as $key => $value){
        $definition=$definition.$value."\r\n";
    }
    echo $definition; 
}

else if (isset($_GET['term'])) {
    //get search inout
    $input = trim($_GET['term']);

    $historyModel = new HistoryModel();
    $historyArray = $historyModel->getWords($input);
    
    $dictonaryModel = new DictonaryModel();
    $wordArray = $dictonaryModel->getWords($input);
    
    echo json_encode(array_merge($historyArray,$wordArray));
}