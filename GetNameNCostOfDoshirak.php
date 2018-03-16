<?php
include_once 'lib/simple_html_dom.php';
include_once 'classes/CURLParser.php';
function GetNameNCostOFDoshirak()
{
    $nameAndCostOfDoshirak = array();
    $j = 0;
    $html = CURLParser::getHtmlByCurl("http://www.ftf.ru/production/catalog/?id=30");
    $dom = str_get_html($html);
    $cources = $dom->find('.content__center');
    $countOfTrTags = substr_count($cources[0], "<tr") . PHP_EOL;
    $dom = str_get_html($cources[0]);
    for ($i = 2; $i < $countOfTrTags; $i++) {
        $nameAndCostOfDoshirak[$j] = array();
        $nameAndCostOfDoshirak[$j][0] = $dom->find("tr", $i)->childNodes(0)->plaintext . " ";
        $nameAndCostOfDoshirak[$j][1] = $dom->find("tr", $i)->childNodes(3)->plaintext . PHP_EOL;
        $j++;
    }
    return $nameAndCostOfDoshirak;
}
