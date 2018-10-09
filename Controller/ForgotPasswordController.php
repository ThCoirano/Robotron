<?php
    SESSION_START();

    if(!isset($_POST["loginName"]) || !isset($_POST["keyword"])){
        $_SESSION["UserMessage"] = "É necessário informar login e senha";
        header("location: ../View/ForgotPassword.php");
    }

    $loginName = $_POST["loginName"];
    $keyword = $_POST["keyword"];

    include_once "../Model/UserLogin.php";

    $UserLogin = new UserLogin();
    $result = $UserLogin->getUserLoginForgot($loginName, $keyword);

    if(count($result) > 0)
        $_SESSION["UserMessage"] = "Sua senha é: '".$result[0]->userPassword."'";
    else
        $_SESSION["UserMessage"] = "Login e/ou Palavra-Chave incorretos !";
    
    header("location: ../View/SignIn.php");
?>