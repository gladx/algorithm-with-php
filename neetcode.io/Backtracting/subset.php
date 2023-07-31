<?php

class Solution {
    public $nums = [];
    public $res  = [];
    public $subset  = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $this->nums = $nums;
        $this->res = [];
        $this->subset = [];

        $this->dfs(0);

        return $this->res;
    }

    function dfs($i)
    {
        if($i >= count($this->nums))
        {
            $this->res[] = $this->subset;
            echo "\n";
            return;
        }

        echo $i;
        $this->subset[] = $this->nums[$i];
        $this->dfs($i + 1);

        array_pop($this->subset);
        $this->dfs($i + 1);
    }
}

// $s = new Solution();
// $r = $s->subsets([1,2,3]);

// dump($r);

// str_replace(".", "[.]", "1.1.1");