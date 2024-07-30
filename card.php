<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 3</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <main>
        <h1>Conversor de Moedas</h1>
<?php 
$dolar= $_GET["real"];
$real = $dolar/5.6472;
$calcu = round($real,2);


echo"Seus R$ $dolar equivalem a<strong> US$ $calcu</strong>";
echo"<br><strong>Cotação fixa de R$5,61</strong> informada diretamente no código.";
?>
<br />
<br />
<button onclick="javascript:history.go(-1)">&#11013; Voltar</button>

    </main>
</body>
</html>