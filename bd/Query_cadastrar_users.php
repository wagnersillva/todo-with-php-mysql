<?php
 if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])){
    if($_POST['email']==='' || $_POST['password']==='' || $_POST['name']===''){
        if($_POST['email']==='') {
            $msg_email = 'Campo email está vazio, por favor preencha!';
        }
        if($_POST['password']==='') {
            $msg_password = 'Campo password está vazio, por favor preencha!';
        }
        if($_POST['name']==='') {
            $msg_name = 'Campo name está vazio, por favor preencha!';
        }
    }else {
        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $name_post = addslashes($_POST["name"]);
            $email_post = addslashes($_POST["email"]);
            $password_post = md5(addslashes($_POST["password"]));
            $stmt = $conn->prepare("SELECT email FROM users WHERE email = :e");
            $stmt ->bindValue(":e", $email_post);
            $stmt->execute();
            $result_stmt = $stmt-> fetchALL(PDO:: FETCH_ASSOC);
            if(!array_key_exists(0, $result_stmt)) { 
                try {
                    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:n, :e, :p)");
                    $stmt->bindValue(":n", $name_post);
                    $stmt->bindValue(":e", $email_post);
                    $stmt->bindValue(":p", $password_post);
                    $stmt->execute();
                    header("location: ./login.php");
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else { 
                $msg_form = 'Email já cadastrado. Se já tiver cadastro, faça <a class="underlineHover" href="./login.php">Login</a>'; 
                $_POST['name'] = '';
                $_POST['email'] = '';
            }
            
        } else { $msg_form = 'Email invalido';}
    }
} 