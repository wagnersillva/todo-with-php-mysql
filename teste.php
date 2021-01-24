<?php
    require_once "./conexao.php";
        try {
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:n, :e, :p)");
            $stmt->bindValue(":n", 'teste');
            $stmt->bindValue(":e", 'teste@teste.com');
            $stmt->bindValue(":p", 123456);
            $stmt->execute();
            header("location: ./login.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    

?>