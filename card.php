<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de moedas</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <main>
        <h1>Conversor de Moedas</h1>
<?php 

$inicio=date("m-d-Y", strtotime("-7 days"));
$fim=date("m-d-Y");
$url='https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$inicio.'\'&@dataFinalCotacao=\''.$fim.'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

$dados = json_decode(file_get_contents($url), true);
$cotaçao =$dados["value"][0]["cotacaoCompra"];
 
$euro = 6.1743;  
$libra = 7.2926	; 
$lene = 0.03823;  
$franco = 6.5528;  
$peso = 0.0061;
$rublo = 0.067;

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $valorReal = isset($_GET['valor']) ? floatval($_GET['valor']) : 0;
    $moedaSelecionada = isset($_GET['moeda']) ? $_GET['moeda'] : '';

    $resultado = 0;

    // Exemplo de ação baseada na opção selecionada
    switch ($moedaSelecionada) {
        case 'dolar':
            $resultado =  $valorReal/$cotaçao;
            break;
        case 'euros':
            $resultado =  $valorReal/$euro;;
            break;
        case 'libras':
            $resultado =  $valorReal/$libra;
            break;
        case 'lenes':
            $resultado =  $valorReal/$lene;
            break;
        case 'francos':
            $resultado =  $valorReal/$franco;
            break;
        case 'pesos':
            $resultado =  $valorReal/$peso;
            break;
        case 'rublos':
             $resultado =  $valorReal/$rublo;
            break;
    }
    $resultfinal = number_format($resultado,2,",",".");

    echo "<p>Valor em reais: R$ $valorReal</p>";
    echo "<p>Moeda selecionada: $moedaSelecionada</p>";
    echo "<p>Resultado da conversão:<strong>$resultfinal</strong></p>";
} else {
    echo "Método de requisição inválido.";
} 
?>

<br />
<button onclick="javascript:window.location.href='index.html'">&#11013; Voltar</button>


    </main>
</body>
</html>


