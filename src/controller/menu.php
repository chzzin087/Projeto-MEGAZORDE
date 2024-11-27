<?php
//Atividade da aula do dia 07102021

//Realizar um select na tabela de alunos e exibir nessa página, com html
require_once('../config/dbConnect.php');

$consulta = "SELECT * FROM aluno";
$estado = $dbh->query($consulta);
$listaAluno = $estado->fetchAll(PDO::FETCH_ASSOC);

?>