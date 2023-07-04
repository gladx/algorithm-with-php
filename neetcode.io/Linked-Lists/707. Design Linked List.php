<?php

class Node
{
    public $next = null;
    public $value;

    function __construct($value)
    {
        $this->value = $value;
    }
}

class MyLinkedList
{
    private $head = null;

    private $list = null;

    /**
     */
    function __construct()
    {
    }

    /**
     * @param Integer $index
     * @return Integer
     */
    function get($index)
    {
        if (!isset($this->head)) {
            return -1;
        }

        $cur = $this->head;
        for ($i = 0; $i < $index && $cur; $i++) {
            $cur = $cur->next ?? null;
        }

        return $cur->value ?? -1;
    }

    function show()
    {
        $cur = $this->head;
        while ($cur) {
            echo $cur->value . ' ';
            $cur = $cur->next;
        }

        echo "\n";
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function addAtHead($val)
    {
        $new = new Node($val);

        if (isset($this->head)) {
            $new->next = $this->head;
        }

        $this->head = $new;

    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function addAtTail($val)
    {
        $new = new Node($val);

        if (isset($this->head)) {
            $cur = $this->head;

            while($cur->next) {
                $cur = $cur->next;
            }
            $cur->next = $new;

        } else {
            $this->head = $new;
        }
    }

    /**
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     */
    function addAtIndex($index, $val)
    {

        if ($index == 0) {
            return $this->addAtHead($val);
        }

        $prev = $cur = $this->head;
        for ($i = 0; $i < $index && $cur; $i++) {
            $prev = $cur;
            $cur = $cur->next;
        }

        if(!$cur && $i != $index) {
            return; // invalid
        }

        if(!$cur && $i == $index) {
            $new = new Node($val);
            $prev->next = $new;
            return;
        }

        $new = new Node($val);
        $prev->next = $new;
        $new->next = $cur;
    }

    /**
     * @param Integer $index
     * @return NULL
     */
    function deleteAtIndex($index)
    {
        if(!$this->head) {
            return;
        }

        $prev = $cur = $this->head;
        for ($i = 0; $i < $index && $cur; $i++) {
            $prev = $cur;
            $cur = $cur->next;
        }

        if(!$cur && $i < $index) {
            return;
        }
        
        if ($cur == $this->head) {
            if($cur->next == null) {
                $this->head = null;
            } else {
                $this->head = $cur->next;
            }
            return;
        }

        if($cur->next == null) {
            $prev->next = null;
            return;
        }

        $prev->next = $cur->next;
    }
}

// $obj = new MyLinkedList();

// $obj->addAtHead(1);
// $obj->addAtTail(3);
// $obj->show();
