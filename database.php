<?php
    if (isset($_POST['action']) && $_POST['action'] == 'executeFunction'){
            try {
            $conn = new PDO("mysql:host=localhost;dbname=quizapp", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id,question,a,b,c,d FROM questions");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } catch (PDOException $e) {
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'geteresult'){
            try {
            $conn = new PDO("mysql:host=localhost;dbname=quizapp", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id,correct,explan FROM questions");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } catch (PDOException $e) {
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
