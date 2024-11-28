<?php
require_once("../../config/dbConnect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Receber e-mail do formulário
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if($email){
        //Verificar se email está cadastrado
        
    } else {
        header('Location: ../../views/redefinir_senha.php?error=blank');
    }

}

?>