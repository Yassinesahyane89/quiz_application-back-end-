<?php

include_once('database.php');  // Path to the DataBase

class quiz extends Connection{


    public function getQuizDB(){
        $sql = "SELECT id,question,a,b,c,d FROM questions";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getResultDB(){
        $sql = "SELECT id,correct,explan FROM questions";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'executeFunction'){
    $quiz = new quiz();
    $results = $quiz->getQuizDB();
    echo json_encode($results);
}

if (isset($_POST['action']) && $_POST['action'] == 'geteresult'){
    $quiz = new quiz();
    $results = $quiz->getResultDB();
    echo json_encode($results);
}