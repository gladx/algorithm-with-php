<?php

class MinStack
{
    private $min = +INF;
    private $size = 0;
    private $stack = [];
    /**
     */
    function __construct()
    {
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val)
    {
        $this->size++;

        if ($val < $this->min) {
            $this->min = $val;
        }

        $this->stack[] = ['value' => $val, 'min' => $this->min];
    }

    /**
     * @return NULL
     */
    function pop()
    {
        $this->size--;
        $item =  array_pop($this->stack);

        if ($this->size > 0 && $item['min'] == $this->min) {
            $this->min = $this->stack[$this->size - 1]['min'];
        }

        if($this->size == 0) {
            $this->min = +INF;
        }

        return $item['value'];
    }

    /**
     * @return Integer
     */
    function top()
    {
        return $this->stack[$this->size - 1]['value'];
    }

    /**
     * @return Integer
     */
    function getMin()
    {
        return $this->min;
    }
}

class MinStackV2
{
    private $size = 0;
    private $stack = [];
    /**
     */
    function __construct()
    {
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val)
    {
        if($this->size == 0 || $val < $this->getMin()) {
            $this->stack[] = ['value' => $val, 'min' => $val];
            $this->size++;
            return;
        }
        
        $this->stack[] = ['value' => $val, 'min' => $this->getMin()];
        $this->size++;
    }

    /**
     * @return NULL
     */
    function pop()
    {
        $this->size--;
        $item =  array_pop($this->stack);

        return $item['value'];
    }

    /**
     * @return Integer
     */
    function top()
    {
        return $this->stack[$this->size - 1]['value'];
    }

    /**
     * @return Integer
     */
    function getMin()
    {
        return $this->stack[$this->size - 1]['min'];;
    }
}