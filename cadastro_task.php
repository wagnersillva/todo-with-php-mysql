<?php
    require_once './verificarLogin.php';
    require_once "./conexao.php";

    $users_id =  $_SESSION["id_UsuarioLogado"];

    if(isset($_POST['description'])){
        $stmt = $conn->prepare("INSERT INTO `task_list`(`users_id`, `description`, `status`) VALUES (:i,:d,:s)");
        $status = 0;
        $stmt->bindValue(":i", $users_id);
        $stmt->bindValue(":d", $_POST['description']);
        $stmt->bindValue(":s", $status);
        $stmt->execute();
        
        header("location: ./index.php");
    }