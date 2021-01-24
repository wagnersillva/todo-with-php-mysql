<?php
    require_once './verificarLogin.php';
    require_once "./conexao.php";

    $users_id =  $_SESSION["id_UsuarioLogado"];
    $id = $_GET['param'];

    if($id){
        $stmt = $conn->prepare("DELETE FROM `task_list` WHERE task_id = :i");
        $stmt->bindValue(":i", $id);
        $stmt->execute();
        
        header("location: https://koallaproject.000webhostapp.com/index.php");
    }