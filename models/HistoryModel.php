<?php

class HistoryModel{
    
    function insertWord($word){
        include 'Credentials.php';

        //Open Connection and select database
        $con = mysqli_connect($host, $user, $passwd, $database) or die(mysqli_connect_error());
        $query = "INSERT INTO history VALUES ('$word')";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        mysqli_close($con);
    }
    
    function getWords($input) {
        include 'Credentials.php';

        //Open Connection and select database
        $con = mysqli_connect($host, $user, $passwd, $database) or die(mysqli_connect_error());
        $query = "SELECT word FROM history WHERE word LIKE '$input%' ORDER BY word ASC LIMIT 5";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $wordArray = array();

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($wordArray, $row['word']);
        }
        
        mysqli_close($con);
        return $wordArray;
    }
}