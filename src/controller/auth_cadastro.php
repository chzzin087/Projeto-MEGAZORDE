<?php
session_start();
require_once("../../config/dbConnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $nome = htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8');
        
    $data_nasc = trim($_POST['data_nasc']);
    $cpf = preg_replace('/\D/', '', $_POST['cpf']); // Remove não dígitos

    // Validar CPF
    if (strlen($cpf) !== 11) {
        $_SESSION['error'] = 'invalid_cpf';
        header('Location: ../../views/cadastro.php');
        exit();
    }

    // Verificar se todos os campos foram preenchidos
    if ($email && $nome && $cpf && $data_nasc) {
        $verifCadastro = "SELECT cpf FROM usuario WHERE cpf = :cpf";
        $req = $dbh->prepare($verifCadastro);
        $req->bindValue(':cpf', $cpf);
        $req->execute();

        if (!$req->fetch(PDO::FETCH_ASSOC)) {
            try {
                $senha = "Senac123";
                $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
                $status = "1";
                $id_tipo = 2;

                $insert = "INSERT INTO usuario (cpf, senha, nome, stts, data_nasc, id_tipo, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $dbh->prepare($insert);

                if ($stmt->execute([$cpf, $senhaHash, $nome, $status, $data_nasc, $id_tipo, $email])) {
                    header('Location: ../../views/login.html');
                    exit();
                } else {
                    $_SESSION['error'] = 'insert_failed';
                    header('Location: ../../views/cadastro.php');
                    exit();
                }
            } catch (PDOException $e) {
                error_log("Erro no banco de dados: " . $e->getMessage());
                $_SESSION['error'] = 'db_error';
                header('Location: ../../views/cadastro.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'user_exists';
            header('Location: ../../views/cadastro.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'empty';
        header('Location: ../../views/cadastro.php');
        exit();
    }
} else {
    header("Location: ../../views/cadastro.php");
    exit();
}
