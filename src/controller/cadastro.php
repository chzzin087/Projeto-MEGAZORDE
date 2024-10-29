<?php
require_once("../config/dbConnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $nome = htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8');

    $data_nasc = trim($_POST['data_nasc']);
    $data_nasc_valid = DateTime::createFromFormat('Y-m-d', $data_nasc) !== false;

    $senha = filter_input(INPUT_POST, 'senha');

    $cpf = preg_replace('/\D/', '', $_POST['cpf']); // Remove não dígitos
    if (strlen($cpf) !== 11) {
        header('Location: ../views/cadastro.php?error=invalid_cpf');
        exit;
    }

    // Verificar se todos os campos foram preenchidos
    if ($email && $nome && $senha && $cpf && $data_nasc_valid) {
        $verifCadastro = "SELECT cpf FROM usuario WHERE cpf = :cpf";
        $req = $dbh->prepare($verifCadastro);
        $req->bindValue(':cpf', $cpf);
        $req->execute();

        if (!$req->fetch(PDO::FETCH_ASSOC)) {
            try {
                // Hash da senha
                $senhaHash = password_hash($senha, PASSWORD_ARGON2ID);

                $status = "1";
                $id_tipo = 1;

                // Preparar a query de inserção
                $insert = "INSERT INTO usuario (cpf, nome, senha, email, data_nasc, stts, id_tipo) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $dbh->prepare($insert);

                // Executar a query
                if ($stmt->execute([$cpf, $nome, $senhaHash, $email, $data_nasc, $status, $id_tipo])) {
                    // Sucesso: usuário cadastrado
                    header('Location: ../views/login.html');
                    exit;
                } else {
                    // Erro ao inserir
                    header('Location: ../views/cadastro.php?error=insert_failed');
                    exit;
                }
            } catch (PDOException $e) {
                error_log("Erro no banco de dados: " . $e->getMessage()); // Logar erro
                header('Location: ../views/cadastro.php?error=db_error');
                exit;
            }
        } else {
            header('Location: ../views/cadastro.php?error=user_exists');
            exit;
        }
    } else {
        header('Location: ../views/cadastro.php?error=empty');
        exit;
    }
} else {
    header("Location: ../views/cadastro.php");
    exit;
}
