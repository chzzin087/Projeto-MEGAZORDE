<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../public/css/style_prof.css">
</head>
<body>
    <main>
    <h1 class="title">Cadastro de professor</h1>
    <div class="erro-php">
        <?php
            if (isset($_GET['sucesso'])) {
                if ($_GET['sucesso'] == '1') {
                    echo '<p style="color: green">Cadastro realizado com sucesso</p>';
                } elseif ($_GET['sucesso'] == '0') {
                    echo '<p style="color: red">Usuário já cadastrado!</p>';
                }
            }
        ?>
    </div>
        <div class="formulario">
            <form action="./menu_prof.php" method="POST" class="form-login">
                <div class="form-input">
                    <label for="matricula">Matrícula</label>
                    <input type="text" id="matricula" name="matricula" required>
                </div>
                <div class="form-input">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-input">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" required>
                </div>
                <div class="form-input">
                    <label for="conf-senha">Confirmar Senha</label>
                    <input type="password" id="conf-senha" name="senha" required>
                </div>
                <div class="erro-js">
                    <span class="erro-senha"></span>
                </div>
                <button type="submit">Cadastre-se</button>
            </form>
        </div>
        
    </main>
    <script src="../public/js/script_prof.js"></script>
</body>
</html>