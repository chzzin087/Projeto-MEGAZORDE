<?php
require_once("../config/dbConnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $email = filter_input(INPUT_POST, 'email');
    $nome = filter_input(INPUT_POST, 'nome');
    $data_nasc = filter_input(INPUT_POST, 'data_nasc');
    $senha = filter_input(INPUT_POST, 'senha');
    $cpf = filter_input(INPUT_POST, 'cpf');
    // Verificar se todos os campos foram preenchidos

    if (!empty($email) && !empty($nome) && !empty($senha) && !empty($cpf) && !empty($data_nasc)) {
        try {
            // Preparar a query de inserção
            $insert = "INSERT INTO recepcionista (id, crm, nome, email, telefone, cpf) VALUES (null, ?, ?, ?, ?, ?)";
            $stmt = $dbh->prepare($insert);

            // Executar a query
            if ($stmt->execute([$cpf, $senha, $nome, $data_nasc])) {
                header('Location: ../views/cadastro.php?sucesso=1');
               } else {
                header('Location: ../views/cadastro.php?sucesso=0');
            }
        } catch (PDOException $e) {
            echo "Erro no banco de dados: " . $e->getMessage();
        }
    } else {
        header('Location: ../views/cadastro.php?sucesso=2');
    }
} else {
    header("Location: ../views/cadastro.php");
}