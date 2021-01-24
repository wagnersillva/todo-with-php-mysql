<?php
session_start();
require_once "./conexao.php";
    if(isset($_POST['email']) && isset($_POST['password'])) {
        if($_POST['email']==='' || $_POST['password']==='') {
            if($_POST['email']==='') {
                $msg_email = 'Campo email está vazio, por favor preencha!';
            }
            if($_POST['password']==='') {
                $msg_password = 'Campo password está vazio, por favor preencha!';
            }
        } else {
            $email_post = addslashes($_POST['email']);
            $password_post = md5(addslashes($_POST['password']));
            $stmt = $conn->prepare("SELECT * FROM users WHERE `email`= :e and `password`= :p");
            $stmt->bindValue(":e", $email_post);
            $stmt->bindValue(":p", $password_post);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO:: FETCH_ASSOC);
            if($results) {
                $_SESSION['UsuarioLogado'] = $email_post;
                $_SESSION['name_UsuarioLogado'] = $results[0]["name"];
                $_SESSION['id_UsuarioLogado'] = $results[0]["id"];
                header("location: ./index.php");
            } else {
                $msg_form = 'Usuário ou senha estão incorretos';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./css/estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <form action="#" method="post">
                <?php if(!empty($msg_form)) echo '<p  class="msgErro">'.$msg_form.'</p>'?>
                <input type="text" id="email" class="fadeIn second"  name="email" placeholder="email" >
                <?php if(!empty($msg_email)) echo '<p  class="msgErro">'.$msg_email.'</p>'?>
                <input type="password" id="password" class="fadeIn third " name="password" placeholder="password">
                <?php if(!empty($msg_password)) echo '<p class="msgErro">'.$msg_password.'</p>'?>
                <input type="submit" class="fadeIn fourth" value="Entrar">
            </form>
            <div id="formFooter">
                <p>Não é cadastrado? <a class="underlineHover" href="./cadastro.php">Cadastre-se</a> </p>
            </div>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>