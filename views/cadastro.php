<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/cadastro.css">
    <title>Cadastro</title>
</head>

<body>
    <div class="bola"></div>
    <div class="triangulo-azul"></div>
    <main class="container">
        <h1 class="titulo">CADASTRO</h1>
        <div class="form">
            <div class="form-input">
                <label for="nome">Nome</label>
                <div class="circulo"></div>
                <img class="img-input" src="../public/imgs/user_img.svg" alt="">
                <input type="text" class="nome" id="nome" name="nome" placeholder="Ex.: Rômulo Ferreira Santos">
            </div>
            <div class="form-input">
                <label for="cpf">CPF</label>
                <div class="circulo"></div>
                <img class="img-input" src="../public/imgs/cpf_img.svg" alt="">
                <input type="text" class="cpf" id="cpf" name="cpf" pattern="\d{3}(\.?\d{3}){2}-?\d{2}|^\d{11}$"
                    placeholder="Ex.: 000.000.000-00">
            </div>
            <div class="form-input">
                <label for="data-nasc">Data de nascimento</label>
                <div class="circulo"></div>
                <img class="img-input" src="../public/imgs/calendario_img.svg" alt="">
                <input type="text" class="data-nasc" id="data" name="data-nasc" placeholder="Ex.: 01/01/1999">
            </div>
            <div class="form-input">
                <label for="email">E-mail</label>
                <div class="circulo"></div>
                <img class="img-input" src="../public/imgs/envelope_img.svg" alt="">
                <input type="email" class="email" id="email" name="email" placeholder="Ex.: senac321@petrolina.pe.senac.br">
            </div>
            <div class="form-input">
                <label for="senha">Senha</label>
                <div class="circulo"></div>
                <img class="img-input" src="../public/imgs/cadeado_img.svg" alt="">
                <input type="password" class="senha" id="senha" name="senha" placeholder="Ex.: senac123">
            </div>
            <div class="erro-php">
                <?php
                
                ?>
            </div>
            <button class="botao-cadastro">CRIAR CONTA</button>
            <p class="text">Já possui conta? <a href="login.html">Log-in</a></p>
        </div>
    </main>
    <div class="triangulo-principal"></div>
    <div class="senac">
        <img src="../public/imgs/logo_branco 1.png" alt="Logo do Senac">
    </div>
    <div class="texto-triangulo">
        <h2>Sistema de Gerenciamento</h2>
        <h1>Laboratório Maker</h3>
    </div>
    <div class="triangulo-laranja"></div>
    <div class="triangulo-laranja-claro"></div>
    <div class="rodape"></div>
</body>

</html>