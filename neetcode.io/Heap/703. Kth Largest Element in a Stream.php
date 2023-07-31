<?php

class KthLargestV1
{
    public $minHeap = [null];
    public $k;

    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums)
    {
        $this->k = $k;
        foreach ($nums as $num) {
            $this->push($num);
        }

        while ((count($this->minHeap) -1) > $k) {
            $this->popMinHeap($this->minHeap);
        }
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val)
    {
        $this->push($val);
        if((count($this->minHeap) -1) > $this->k) {
            $this->popMinHeap($this->minHeap);
        }
        return $this->minHeap[1];
    }

    public function push($val)
    {
        $this->minHeap[] = $val;

        $i = count($this->minHeap) - 1;

        while ($this->minHeap[$i] < $this->minHeap[(int)($i / 2)]) {
            $tmp = $this->minHeap[$i];
            $this->minHeap[$i] = $this->minHeap[(int)($i / 2)];
            $this->minHeap[(int)($i / 2)] = $tmp;
            $i = (int)($i / 2);
        }
    }

    function popMinHeap(&$heap)
    {
        if (count($heap) == 1) {
            return null;
        }

        if (count($heap) == 2) {
            return array_pop($heap);
        }

        $res = $heap[1];

        // Move last value to root
        $heap[1] = array_pop($heap);

        $i = 1;
        // Percolate down
        while ($i * 2 < count($heap)) {
            if (
                ($i * 2 + 1) < count($heap) && // index right child < number of numbers
                $heap[$i * 2 + 1] < $heap[$i * 2] && // right child > left child
                $heap[$i] > $heap[$i * 2 + 1] // root > left child
            ) {
                # swap right child
                $tmp = $heap[$i];
                $heap[$i] = $heap[$i * 2 + 1];
                $heap[$i * 2 + 1] = $tmp;
                $i = $i * 2  + 1;
            } elseif ($heap[$i] > $heap[$i * 2]) {
                # Swap left child
                $tmp = $heap[$i];
                $heap[$i] = $heap[$i * 2];
                $heap[$i * 2] = $tmp;
                $i = $i * 2;
            } else {
                break;
            }
        }

        return $res;
    }
}

class KthLargest
{
    public SplMinHeap $minHeap;
    public int $k;

    /**
     * @param int $k
     * @param int[] $nums
     */
    function __construct($k, $nums)
    {
        $this->k = $k;
        $this->minHeap = new SplMinHeap();

        foreach ($nums as $num) {
            $this->push($num);
        }

        while ((count($this->minHeap)) > $k) {
            $this->popMinHeap($this->minHeap);
        }
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val)
    {
        $this->push($val);
        if((count($this->minHeap)) > $this->k) {
            $this->popMinHeap();
        }
        return $this->minHeap->top();
    }

    public function push($val)
    {
        $this->minHeap->insert($val);
    }

    function popMinHeap()
    {
       return $this->minHeap->extract();
    }
}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */
// $nums = [4, 5, 8, 2];
// $k = 3;
// $obj = new KthLargest($k, $nums);
// $ret_1 = $obj->add(3);

// dump($ret_1);
// dump($obj->add(5));
// dump($obj->add(10));
