<?php
$user = "root"; //Para criar variaveis em php, use $
$pass = "1234";
try{
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=senac', $user, $pass);
    echo "Conexão estabelecida!";
} catch (PDOException $e) {
    echo "Erro!";
    echo $e;
}
?>