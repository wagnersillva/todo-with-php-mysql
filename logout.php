<?php
session_start();
if(isset($_SESSION['UsuarioLogado'])){
    session_destroy();
    header("location: ./index.php");
    exit();
}