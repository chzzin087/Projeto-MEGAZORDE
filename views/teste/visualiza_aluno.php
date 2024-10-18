<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de alunos</h1>
    <p> 
        <?php 
            require_once('menu.php');
            foreach($listaAluno as $aluno){
                echo "</br>";
                echo "{$aluno['nome_completo']}";
            }
        ?>
    </p>
</body>
</html>