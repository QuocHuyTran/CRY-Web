<?php
/**
 * Created by PhpStorm.
 * User: Quoc Huy
 * Date: 4/7/2018
 * Time: 10:50 PM
 */

class Last_Values
{
    private $timeStamp;
    private $price;
    private $marketcap;
    private $volume24;
    private $change_1h;
    private $change_24h;

    /**
     * Last_Values constructor.
     * @param $timeStamp
     * @param $price
     * @param $marketcap
     * @param $volume24
     * @param $change_1h
     * @param $change_24h
     */
    public function __construct($timeStamp, $price, $marketcap, $volume24, $change_1h, $change_24h)
    {
        $this->timeStamp = $timeStamp;
        $this->price = $price;
        $this->marketcap = $marketcap;
        $this->volume24 = $volume24;
        $this->change_1h = $change_1h;
        $this->change_24h = $change_24h;
    }


    /**
     * @return mixed
     */
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    /**
     * @param mixed $timeStamp
     */
    public function setTimeStamp($timeStamp)
    {
        $this->timeStamp = $timeStamp;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getMarketcap()
    {
        return $this->marketcap;
    }

    /**
     * @param mixed $marketcap
     */
    public function setMarketcap($marketcap)
    {
        $this->marketcap = $marketcap;
    }

    /**
     * @return mixed
     */
    public function getVolume24()
    {
        return $this->volume24;
    }

    /**
     * @param mixed $volume24
     */
    public function setVolume24($volume24)
    {
        $this->volume24 = $volume24;
    }

    /**
     * @return mixed
     */
    public function getChange1h()
    {
        return $this->change_1h;
    }

    /**
     * @param mixed $change_1h
     */
    public function setChange1h($change_1h)
    {
        $this->change_1h = $change_1h;
    }

    /**
     * @return mixed
     */
    public function getChange24h()
    {
        return $this->change_24h;
    }

    /**
     * @param mixed $change_24h
     */
    public function setChange24h($change_24h)
    {
        $this->change_24h = $change_24h;
    }


}