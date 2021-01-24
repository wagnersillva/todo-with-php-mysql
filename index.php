<?php
    require_once './verificarLogin.php';
    require_once "./conexao.php";

    $users_id =  $_SESSION["id_UsuarioLogado"];
    $users_logado = $_SESSION["UsuarioLogado"];
    $users_name = $_SESSION['name_UsuarioLogado'];
    

    $stmt = $conn->prepare("SELECT * FROM task_list WHERE users_id = :id");
    $stmt->bindValue(":id", $users_id);
    $stmt->execute();
    $task_list = $stmt->fetchAll(PDO:: FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cfbfa23fac.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <title>Todo List - <?php echo $users_name; ?> </title>
</head>
<body>
<!-- $row['task_id'] -->
    <button type="button" class="btn btn-secondary btn-logout"><a style="text-decoration:none;color:white;" href="./logout.php">Deslogar</a></button>
    
    <div class="content">
        <div class="div-inputs">
            <form action="./cadastro_task.php" method="post">
                <input type="text" name="description" class="input-tarefa" placeholder="Cria uma tarefa">
                <input type="submit"  class="input-submit" value="criar novo afazer">
            </form>
        </div>
        <table class="table table-bordered table-index">
            <thead>
                <tr>
                    <th scope="col">descrição</th>
                    <th scope="col">status</th>
                    <th scope="col">Marcar como concluído</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                       if($task_list) {
                           foreach( $task_list as $row) {
                               if($row['status']==1){
                                   $class_linha = 'concluido';
                                   $description_status='Concluído';
                               } else {
                                    $class_linha = 'disable';
                                    $description_status='Não concluído';
                               }
                               echo "<tr>";
                               echo "<th class=".$class_linha." >".$row['description']."</th>";
                               echo "<th class=".$class_linha." >".$description_status."</th>";
                               echo "<th >".'<a class="'.$class_linha.'" style="text-decoration:none;" href="./concluir_task.php?param='.$row['task_id'].'">concluir</a>'."</th>";
                               echo "<th >".'<a class="'.$class_linha.'" style="text-decoration:none;" href="./excluir_task.php?param='.$row['task_id'].'">Excluir</a>'."</th>";
                               echo "<tr>";
                           }
                       }
                    ?>
            </tbody>
        </table>
    </div>
</body>
</html>