<?php
    require_once "./conexao.php";
    include_once('./bd/Query_cadastrar_users.php')
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Cadastro</title>
</head>
<body>
<div class="wrapper fadeInDown">
        <div id="formContent">
            <form action="#" method="post">
                <?php if(!empty($msg_form)) echo '<p  class="msgErro">'.$msg_form.'</p>'?>
                <input type="text" id="name" class="fadeIn second" name="name" placeholder="name" <?php if(isset($_POST['name'])){echo 'value='.$_POST['name'];} ?>>
                <?php if(!empty($msg_name)) echo '<p  class="msgErro">'.$msg_name.'</p>'?>
                <input type="text" id="email" class="fadeIn second" name="email" placeholder="email " <?php if(isset($_POST['email'])){echo 'value='.$_POST['email'];} ?>>
                <?php if(!empty($msg_email)) echo '<p  class="msgErro">'.$msg_email.'</p>'?>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" >
                <?php if(!empty($msg_password)) echo '<p  class="msgErro">'.$msg_password.'</p>'?>
                <input type="submit" class="fadeIn fourth" value="Cadastrar-se">
            </form>
            <div id="formFooter">
                <p>Já é cadastrado? <a class="underlineHover" href="./login.php">Login</a></p>
            </div>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>