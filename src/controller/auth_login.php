<?php
session_start();
require_once('../config/dbConnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $cpf = preg_replace('/\D/', '', $_POST['cpf']); // Remove não dígitos
    $senha = $_POST['senha'];

    // Validar se CPF e senha foram fornecidos
    if ($cpf && $senha) {

        // Verificar se o CPF existe no banco de dados
        $verifLogin = "SELECT cpf, senha, id_tipo FROM usuario WHERE cpf = :cpf";
        $req = $dbh->prepare($verifLogin);
        $req->bindValue(':cpf', $cpf);
        $req->execute();

        // Se o CPF existir
        if ($usuario = $req->fetch(PDO::FETCH_ASSOC)) {
            // Comparar a senha fornecida com o hash armazenado no banco
            if (password_verify($senha, $usuario['senha'])) {
                // Se a senha estiver correta, iniciar a sessão e redirecionar
                $_SESSION['cpf'] = $cpf;
                $_SESSION['id_tipo'] = $usuario['id_tipo'];
                $_SESSION['logged_in'] = true;

                // Redirecionar conforme o tipo de usuário ou página de destino
                if ($_SESSION['id_tipo'] == 1) {
                    header('Location: ../../views/admin_dashboard.php');
                    exit();
                } else {
                    header('Location: ../../views/user_dashboard.php');
                    exit();
                }
            } else {
                // Se a senha for inválida
                $_SESSION['error'] = 'senha_incorreta';
                header('Location: ../../views/login.html');
                exit();
            }
        } else {
            // Se o CPF não existir
            $_SESSION['error'] = 'cpf_nao_encontrado';
            header('Location: ../../views/login.html');
            exit();
        }
    } else {
        // Se o CPF ou senha não forem informados
        $_SESSION['error'] = 'campo_vazio';
        header('Location: ../../views/login.html');
        exit();
    }
} else {
    // Se a requisição não for POST, redireciona
    header("Location: ../../views/login.html");
    exit();
}
?>
