<?php
include_once 'lib/simple_html_dom.php';
include_once 'classes/APIMethods.php';
include_once 'classes/CURLParser.php';
include_once 'GetNameNCostOfDoshirak.php';
include_once 'GetNumEnding.php';


print "<link rel='stylesheet' type=\"text/css\" href='styles/Styles.css'>";
$currency = isset($_POST['Option']) ? $_POST['Option'] : false;
if (!$currency) {
    echo "One more try=)<br>";
    echo "<a href=\"index.php\">Come back</a>";
    die();
}
$realise = new APIMethods();

$arrayOfExchangeRate = $realise->objectOfExchangeRateToArray($realise->getObjectOfExchangeRate($currency));
$endingsOfCount = array("штука", "штуки", "штук");
echo "<form method=\"post\" action=\"Exchange.php\">";
echo "<select name=\"Option\" >";
echo "<option value=" . ">Select...</option>";
echo "<option value=https://play.google.com/store/apps/details?id=com.application.razin.calculatorx>Cool App</option>";
echo "<option value=" . "BTC" . ">BTC</option>";
echo "<option value=" . "ETH" . ">ETH</option>";
echo "</select>";
echo "<input type=\"submit\" value=\"Submit the form\"/>";
echo "</form>";

echo "<h>{$currency} VS Doshirak</h>";
echo "<table >";
for ($i = 0; $i < sizeof($arrayOfExchangeRate); $i++) {
    try {
        echo "<tr >";
        echo "<td><div>{$arrayOfExchangeRate[$i]}</div></td>";
        echo "</tr >";
    } catch (InvalidArgumentException $e) {
        echo 'Выброшено исключение: ', $e->getMessage(), "\n";
    }

}
echo "</table >";
//////////////////////////////////////////////////////////////////////////////////////
echo "<table >";
for ($j = 0; $j < 12; $j++) {
    $arrayOfNameNCostOFDoshirak = GetNameNCostOFDoshirak();
    $exchangeRateOneBitcoinToDoshirak = ceil($arrayOfExchangeRate[2] / (float)$arrayOfNameNCostOFDoshirak[$j][1]);
    $endingOfCount = getNumEnding($exchangeRateOneBitcoinToDoshirak, $endingsOfCount);
    echo "<tr >";
    echo "<td><div>{$arrayOfNameNCostOFDoshirak[$j][0]}</div></td>";
    echo "<td><div>{$exchangeRateOneBitcoinToDoshirak} {$endingOfCount} за один {$currency}</div></td>";
    echo "</tr >";
}
echo "</table >";