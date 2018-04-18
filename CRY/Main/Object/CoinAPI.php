<?php
/**
 * Created by PhpStorm.
 * User: Quoc Huy
 * Date: 4/7/2018
 * Time: 11:01 PM
 */

class CoinAPI
{
    private $API_COIN="http://cryws.herokuapp.com/api/coins/";
    public $API_COIN_NONCHART="http://cryws.herokuapp.com/api/coins/nonchart/";
    private $API_COIN_CHART7DAY="http://cryws.herokuapp.com/api/coins/chart7days/";
    private $API_COINS_LIMIT="http://cryws.herokuapp.com/api/coins/nonchart/offset/";
    private $API_COIN_SYMBOL="http://cryws.herokuapp.com/res/coins_high/32/icon/";
    private $API_COIN_LIMIT_FULL="http://cryws.herokuapp.com/api/coins/offset/";

    /**
     * @return string
     */
    public function getAPI_COIN_LIMIT_FULL($start,$end)
    {
        return $this->API_COIN_LIMIT_FULL.$start."/".$end;
    }


    /**
     * CoinAPI constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */


    public function getAPICOIN($coin)
    {
        return $this->API_COIN.$coin;
    }

    /**
     * @return mixed
     */
    public function getAPI_COIN_NONCHART($symbol)
    {
        return $this->API_COIN_NONCHART.$symbol;
    }

    /**
     * @return mixed
     */
    public function getAPI_COIN_CHART7DAY($symbol)
    {
        return $this->API_COIN_CHART7DAY.$symbol;
    }

    /**
     * @return mixed
     */
    public function getAPI_COINS_LIMIT($start,$end)
    {
        return $this->API_COINS_LIMIT.$start."/".$end;
    }

    /**
     * @return mixed
     */
    public function getAPI_COIN_SYMBOL()
    {
        return $this->API_COIN_SYMBOL;
    }


}