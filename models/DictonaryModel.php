<?php

class DictonaryModel {
    
    function getWords($input) {
        include 'Credentials.php';

        //Open Connection and select database
        $con = mysqli_connect($host, $user, $passwd, $database) or die(mysqli_connect_error());
        $query = "SELECT word FROM entries WHERE word LIKE '$input%' ORDER BY word ASC";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $wordArray = array();

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($wordArray, $row['word']);
        }
        
        mysqli_close($con);
        return $wordArray;
    }
    
    function getDefinition($input) {
        include 'Credentials.php';

        //Open Connection and select database
        $con = mysqli_connect($host, $user, $passwd, $database) or die(mysqli_connect_error());
        $query = "SELECT definition FROM entries WHERE word = '$input'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $definitionArray = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($definitionArray, $row['definition']);
        }
        
        mysqli_close($con);
        return $definitionArray;
    }
}