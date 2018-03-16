<?php
/**
 * Created by PhpStorm.
 * User: п
 * Date: 06.03.2018
 * Time: 14:05
 */
class APIMethods
{
    public $objectRate;

    public function getObjectOfExchangeRate($currency)
    {
        $objectWithRate = json_decode(file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=".$currency."&tsyms=USD,EUR,RUR"));

        return $objectWithRate;
    }

    public function objectOfExchangeRateToArray($objectOfExchangeRate)
    {
        foreach ($objectOfExchangeRate as $key => $value) {
            $arrayOfExchangeRate[] = $value;
        }
        return $arrayOfExchangeRate;
    }

}
