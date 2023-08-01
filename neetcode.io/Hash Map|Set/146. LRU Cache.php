<?php

class DNode
{
    public $prev = null;
    public $next = null;
    public function __construct(public $key, public $value)
    {
    }
}

class LRUCache
{
    private $left;
    private $right;
    private $cache = [];

    /**
     * @param int $capacity
     */
    function __construct(private int $capacity)
    {
        $this->left = new DNode(0, 0);
        $this->right = new DNode(0, 0);

        $this->left->next = $this->right;
        $this->right->prev = $this->left;
    }

    private function remove(DNode $node)
    {
        $prev = $node->prev;
        $next = $node->next;

        $prev->next = $next;
        $next->prev = $prev;
    }

    private function insert(DNode $node)
    {
        $prev = $this->right->prev;
        $next = $this->right;
        $prev->next = $next->prev = $node;
        $node->next = $next;
        $node->prev = $prev;
    }

    /**
     * @param int $key
     * @return int
     */
    function get(int $key)
    {
        if (isset($this->cache[$key])) {
            $this->remove($this->cache[$key]);
            $this->insert($this->cache[$key]);

            return $this->cache[$key]->value;
        }

        return -1;
    }

    /**
     * @param int $key
     * @param int $value
     * @return NULL
     */
    function put(int $key, int $value)
    {
        if (isset($this->cache[$key])) {
            $this->remove($this->cache[$key]);
        }

        $this->cache[$key] = new DNode($key, $value);
        $this->insert($this->cache[$key]);

        if(count($this->cache) > $this->capacity) {
            // remove from the list and delete the LRU from the hashmap
            $lru = $this->left->next;

            $this->remove($lru);

            unset($this->cache[$lru->key]);
        }
        
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */

// $obj = new LRUCache(3);
// $obj->put(8, 1);
// $obj->put(8, 2);
// $obj->put(9, 1);
// $obj->put(10, 1);
// $obj->put(7, 1);
// $obj->put(11, 1);
// $obj->put(11, 1);
// $obj->put(11, 1);

// dump($obj->get(11));
// dump($obj->get(9));
// dump($obj->get(10));
