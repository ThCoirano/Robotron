<?php
    SESSION_START();
    $_SESSION["Authentication"] = false;

    if(!isset($_POST["loginName"]) || !isset($_POST["userPassword"])){
        $_SESSION["Authentication"] = false;
        $_SESSION["UserMessage"] = "É necessário inserir senha e login";
        header("location: ../View/SignIn.php");
    }

    $loginName = $_POST["loginName"];
    $userPassword = $_POST["userPassword"];

    include_once "../Model/UserLogin.php";

    $ModelUserLogin = new UserLogin();
    $loginResult = $ModelUserLogin->getUserLogin($loginName, $userPassword);

    if(count($loginResult) > 0){
        $_SESSION["UserMessage"] = "Autenticação realizada com sucesso !";
        $_SESSION["Authentication"] = true;
        header("location: ../View/Game.php");
    }
    else{
        $_SESSION["Authentication"] = false;
        $_SESSION["UserMessage"] = "Usuário não autorizado";
        header("location: ../View/SignIn.php");
    }
?>