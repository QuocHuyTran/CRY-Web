<?php
/**
 * Created by PhpStorm.
 * User: Quoc Huy
 * Date: 4/7/2018
 * Time: 2:46 PM
 */

class Coin
{
    private $name;
    private $symbol;
    private $available_supply;
    private $last_values;
    private $max7days_values;

    /**
     * Coin constructor.
     * @param $name
     * @param $symbol
     * @param $available_supply
     */
    public function __construct($name, $symbol, $available_supply)
    {
        $this->name = $name;
        $this->symbol = $symbol;
        $this->available_supply = $available_supply;
    }


    /**
     * Coin constructor.
     * @param $name
     * @param $symbol
     * @param $available_supply
     */

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param mixed $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return mixed
     */
    public function getAvailableSupply()
    {
        return $this->available_supply;
    }

    /**
     * @param mixed $available_supply
     */
    public function setAvailableSupply($available_supply)
    {
        $this->available_supply = $available_supply;
    }

    /**
     * @return mixed
     */
    public function getLastValues()
    {
        return $this->last_values;
    }

    /**
     * @param mixed $last_values
     */
    public function setLastValues($last_values)
    {
        $this->last_values = $last_values;
    }

    /**
     * @return mixed
     */
    public function getMax7daysValues()
    {
        return $this->max7days_values;
    }

    /**
     * @param mixed $max7days_values
     */
    public function setMax7daysValues($max7days_values)
    {
        $this->max7days_values = $max7days_values;
    }
}