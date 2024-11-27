<?php
require_once("../config/dbConnect.php");

$mat = $_POST['matricula'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$verificaCadastro = "SELECT matricula, nome FROM professor WHERE matricula = :mat";

$req = $dbh->prepare($verificaCadastro);
$req->bindValue(':mat', $mat);
$req->execute();
$dadosProf = $req->fetch(PDO::FETCH_ASSOC);

if($dadosProf){
    header('Location: ./cadastro_prof.php?sucesso=0');
} else {
    $insereProf = "INSERT INTO professor (matricula, nome, senha) VALUES (:mat, :nome, :senha)";
    $req = $dbh-> prepare($insereProf);
    $req->bindValue(':mat', $mat);
    $req->bindValue(':nome', $nome);
    $req->bindValue(':senha', $senhaHash);
    $req->execute();

    header('Location: ./cadastro_prof.php?sucesso=1');
}
?>