<?php

//Definition for a Node.
class Node
{
    public $val = null;
    public $neighbors = null;
    function __construct($val = 0)
    {
        $this->val = $val;
        $this->neighbors = array();
    }
}

class Solution
{
    /**
     * @param Node $node
     * @return Node
     */
    function cloneGraph($node)
    {
        $visit = [];
        $newList = [];

        if (!$node) {
            return;
        }

        $newNode = new Node($node->val);
        $newList[$newNode->val] = $newNode;

        $queue[] = $node;
        while (count($queue) > 0) {
            $cur = array_shift($queue);
            $curNew =   $newList[$cur->val];
            if (isset($visit[$cur->val])) {
                continue;
            } else {
                $visit[$cur->val] = true;
            }

            foreach ($cur->neighbors as $n) {
                if (!isset($newList[$n->val])) {
                    $newList[$n->val] = new Node($n->val);
                }
                $curNew->neighbors[] = $newList[$n->val];
                $queue[] = $n;
            }
        }

        return $newNode;
    }


    public function cloneGraphDfs($node) 
    {
        $new = [];

        function dfs(&$node) {
            if(isset($new[$node->val])) {
                return $new[$node->val];
            }

            $copy = new Node($node->val);
            $new[$copy->val] = $copy;

            foreach ($cur->neighbors as $n) { {
                $copy->neighbors[] = dfs($n);
            }

            return $copy;
        }

        if(!$node) {
            return null;
        } else {
            return dfs($node);
        }
    }
    
}
