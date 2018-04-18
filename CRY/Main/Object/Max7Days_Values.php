<?php
/**
 * Created by PhpStorm.
 * User: Quoc Huy
 * Date: 4/7/2018
 * Time: 10:53 PM
 */

class Max7Days_Values
{
    private $last7values;

    /**
     * Max7Days_Values constructor.
     * @param $last7values
     */
    public function __construct($last7values)
    {
        $this->last7values = $last7values;
    }

    /**
     * @return mixed
     */
    public function getLast7values()
    {
        return $this->last7values;
    }

    /**
     * @param mixed $last7values
     */
    public function setLast7values($last7values)
    {
        $this->last7values = $last7values;
    }//mảng giá trị


}