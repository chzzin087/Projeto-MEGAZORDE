<?php
session_start();
if (isset($_SESSION['error'])) {
    $error_message = '';

    switch ($_SESSION['error']) {
        case 'senha_incorreta':
            $error_message = 'Senha incorreta. Tente novamente.';
            break;
        case 'cpf_nao_encontrado':
            $error_message = 'CPF não encontrado. Tente novamente.';
            break;
        case 'campo_vazio':
            $error_message = 'Por favor, preencha todos os campos.';
            break;
        default:
            $error_message = '';
            break;
    }
    unset($_SESSION['error']); // Limpa a variável de erro após exibição
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/login.css">
    <title>Login</title>

    <style>
        .alerta-erro {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="bola"></div>
    <div class="triangulo-azul"></div>
    <main class="tela-login">
        <h1 class="titulo">LOGIN</h1>
        
        <?php if (!empty($error_message)): ?>
            <div class="alerta-erro">
                <p><?php echo $error_message; ?></p>
            </div>
        <?php endif; ?>
        
        <form class="campos" action="/src/controller/auth_login.php" method="POST">
            <div class="form-input">
                <label for="cpf">CPF</label>
                <div class="circulo">
                    <i class="fa-regular fa-address-card" style="color: #ffffff;"></i>
                </div>
                <input type="text" name="cpf" id="cpf" pattern="\d{3}(\.?\d{3}){2}-?\d{2}|^\d{11}$" title="Digite um CPF no formato: xxx.xxx.xxx-xx ou xxxxxxxxxxx" placeholder="Ex.: 000.000.000-00" required>
            </div>
            <div class="form-input">
                <label for="senha">Senha</label>
                <div class="circulo2">
                    <i class="fa-solid fa-lock" style="color: #ffffff;"></i>
                </div>
                <input type="password" id="senha" name="senha" placeholder="Ex.: senac123" required>
            </div>
            <div>
                <label class="labell">
                    <input type="checkbox" id="rememberMe">Lembre-se de mim
                </label>
            </div>
            <button class="entrar" type="submit">ENTRAR</button>
        </form>
        <a class="esq-senha" href="redefinir_senha.html">Esqueceu a senha?</a>
        <div class="menu">
            <hr>
            <p>ou</p>
            <hr>
        </div>
        <button class="horarios" type="submit">VISUALIZAR HORÁRIOS</button>
    </main>
    <div class="triangulo-principal"></div>
    <div class="senac">
        <img src="../public/imgs/logo_branco 1.png" alt="Logo do Senac">
    </div>
    <div class="texto-triangulo">
        <h2>Sistema de Gerenciamento</h2>
        <h1>Laboratório Maker</h1>
    </div>
    <div class="triangulo-laranja"></div>
    <div class="triangulo-laranja-claro"></div>
    <div class="rodape"></div>
</body>

</html>
