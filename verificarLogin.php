<?php
    session_start();
    if(!isset($_SESSION['UsuarioLogado'])) {
        header("location: ./login.php");
    }