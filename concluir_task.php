<?php
    require_once './verificarLogin.php';
    require_once "./conexao.php";

    $users_id =  $_SESSION["id_UsuarioLogado"];
    $id = $_GET['param'];

    if($id){
        $stmt = $conn->prepare("UPDATE `task_list` SET `status` = :s WHERE `task_id` = :i ");
        $stmt->bindValue(":i", $id);
        $stmt->bindValue(":s", 1);
        $stmt->execute();
        
        header("location: https://koallaproject.000webhostapp.com/index.php");
    }