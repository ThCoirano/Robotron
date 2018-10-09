<?php
    SESSION_START();

    if($_SESSION["Authentication"] != true){
        header("location: SignIn.php");
        $_SESSION["UserMessage"] = "É necessário inserir suas credenciais";
    }

?>

<html>
    <header>

        <?php if(isset($_SESSION["UserMessage"])) :?>
        <script>
            window.onload = function(){
                alert("<?php echo $_SESSION['UserMessage']?>");
            }
        </script>
        <?php unset($_SESSION['UserMessage']); ?>
    <?php endif ?>
    </header>
    <body>
        <?php echo "tela do game - usuário autenticado !" ?>        
    </body>
</html>