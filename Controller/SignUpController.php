<?php
    SESSION_START();

    if(!isset($_POST["username"]) || !isset($_POST["email"]) || !isset($_POST["loginName"]) || !isset($_POST["password"]) || !isset($_POST["passwordConfirmation"]) || !isset($_POST["keyword"])){
        $_SESSION["UserMessage"] = "Todas as informações devem ser obrigatóriamente preenchidas !";
        header("Refresh:0");
    }else if ($_POST["password"] != $_POST["passwordConfirmation"] ){
        $_SESSION["UserMessage"] = "A senha e a confirmação devem ser iguais !";
        header("location: ../View/SignUp.php");
        return;
    }

    include_once "../Model/SystemUser.php";
    include_once "../Model/UserLogin.php";

    $username = $_POST["username"];
    $email = $_POST["email"];
    $loginName = $_POST["loginName"];
    $password = $_POST["password"];
    $passwordConfirmation = $_POST["passwordConfirmation"];
    $keyword = $_POST["keyword"];

    $SystemUser = new SystemUser();
    $SystemUserResult = $SystemUser->getSystemUser($email);
    
    if(count($SystemUserResult) > 0){
        $_SESSION["UserMessage"] = "Já existe um usuário com este e-mail";
        header("location: ../View/SignUp.php");
        return;
    }

    $UserLogin = new UserLogin();
    $UserLoginResult = $UserLogin->getUserLoginByLoginName($loginName);

    if(count($UserLoginResult) > 0){
        $_SESSION["UserMessage"] = "Já existe um usuário com este login";
        header("location: ../View/SignUp.php");
        return;
    }

    $SystemUser->insertSystemUser($username, $email);
    $SystemUserResult = $SystemUser->getSystemUser($email);
    $UserLogin->insertUserLogin($loginName, $password, $keyword, $SystemUserResult[0]->id);

    $_SESSION["UserMessage"] = "Usuário cadastrado com sucesso !";
    header("location: ../View/SignIn.php");
?>