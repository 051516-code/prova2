<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>prova 2</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
  
        body{
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: 'Lobster', cursive;
            font-family: 'Montserrat', sans-serif;
        }
    /* form  */
        form{
            width: 100%;
            max-width: 350px;
            padding: 2%;
        }
        .single-input{
            position: relative;
            margin: 30px 0;
        }
        .single-input label{
            position: absolute;
            bottom: 20px;
            left: 0;
            color: rgb(150,150,150);
            cursor: text;
            transition: 0.5s ease-in-out;
        }
        .input{
            width: 100%;
            padding: 5px;
            border: 0;
            border-bottom: 2px solid rgb(200,200,200);
            outline: 0;
            font-size: 16px;
            color: rgb(80,80,80);
            transition: 0.5s ease-in-out;
            text-align: right;
        }
        .input:focus
        {
            border-bottom: 2px solid cornflowerblue;
        }

        .input:hover ~ label {
            transform: translateY(-30px);
        }

        .input:focus ~ label
        {
            transform: translateY(-40px);
            font-size: 12px;
            color: cornflowerblue;
        }
      

    /* Button  */
        .wrapper{
            position: relative; 
            top: 50%;
            left:65%;
            transform: translate(-50%, -50%);
        }

        .wrapper input{
            display: block;
            width: 200px;
            height: 40px;
            line-height: 40px;
            font-size: 18px;
            font-family: sans-serif;
            color: #333;
            border: 2px solid #333;
            letter-spacing: 2px;
            text-align: center;
            position: relative;
            transition: all .35s;
        }


        .wrapper input:hover{
            color: cornflowerblue;
        }

     /* errors  */
        .error {
            display: inline-block;
            color : red;
            margin-left: 180px;
            font-weight: 300;
        }
        .success {
            font-size: 25px;
            color: greenyellow;
            position: relative;
            animation-name: success;
            animation-duration: 4s;
            z-index: 200;
            animation-fill-mode: forwards;
        }

        @keyframes success {
            from {top: 0px;}
            to {top: 250px; color: greenyellow;}
        }

        .esconde {
            position: relative;
            animation-name: successForm;
            animation-duration: 4s;
            z-index: 200;
            animation-fill-mode: forwards;
        }

        @keyframes successForm {
            from {top: 0px;}
            to {top: 1000px; display: none;}
        }
        
    </style>
</head>
<body>
    
<!-- Crie um formulário que recebe os seguintes campos: Nome, Sobrenome, Idade e CPF.
O formulário deve conter também um botão chamado "Enviar".
Ao clicar no botão enviar, esse formulário deve estar preparado para informar uma mensagem de erro para o caso do usuário não ter informado algum dos campos.
Caso todos os dados sejam informados, então esses dados devem ser gravados em um arquivo chamado "base_de_dados.txt". Esses dados devem ser dispostos da seguinte forma: -->
<?php 
$nomeErr = "";
$sobrenomeErr = "";
$idadeErr ="";
$cpfErr = "";

$nome = "";
$sobrenome = "";
$idade ="";
$cpf = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
$valido = false;

   
    if(empty($_POST["nome"])) {
        $nomeErr = "obrigatorio";
    }else {
        $nome = test_input($_POST["nome"]);
    }

    if(empty($_POST["sobrenome"])) {
        $sobrenomeErr = "obrigatorio";
    }else {
        $sobrenome = test_input($_POST["sobrenome"]);
    }

    if(empty($_POST["idade"])) {
        $idadeErr = "obrigatorio";
    }else {
        $idade = test_input($_POST["idade"]);
    }

    if(empty($_POST["cpf"])) {
        $cpfErr = "obrigatorio";
    }else {
        $cpf = test_input($_POST["cpf"]);
    }
    
    

    echo " <h1 class='success'> Enviado com sucesso </h1>";

  

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<div class="box esconde">
    <h2>VALIDANDO FORMULARIOS</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="single-input">
            <input type="text" class="input" name="nome" value=<?= $nome ?>>
            <label for="nome">Nome</label>
            <span class="error"><?= $nomeErr;?></span>
            <br><br>
        </div> 

        <div class="single-input">
            <input type="text" class="input" name="sobrenome" value=<?= $sobrenome ?>>
            <label for="sobrenome">SobreNome</label>
            <span class="error"><?= $sobrenomeErr;?></span>
            <br><br>
        </div> 

        <div class="single-input">
            <input type="text" class="input" name="idade" value=<?= $idade ?>>
            <label for="idade">Idade</label>
            <span class="error"><?= $idadeErr;?></span>
            <br><br>
        </div> 

        <div class="single-input">
            <input type="text" class="input" name="cpf" min="11" value=<?= $cpf ?>>
            <label for="cpf">CPF</label>
            <span class="error"><?= $cpfErr;?></span>
            <br><br>
        </div> 

        <div class="wrapper">
            <input type="submit" value="ENVIAR">
        </div>
    </form>
</div>

</body>
</html>




    



