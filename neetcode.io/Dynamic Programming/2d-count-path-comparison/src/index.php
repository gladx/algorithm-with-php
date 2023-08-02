<?php

require_once "../vendor/autoload.php";
require_once "./func.php";

use MaddHatter\MarkdownTable\Builder;


$tableBuilder = new Builder();
$tableBuilder->headers(['function', 'size', 'memory(bytes)', 'time', 'result']);
foreach ([4, 10, 50, 100, 1000, 10000] as $d) {
    foreach (['bruteForce', 'memoization', 'dp'] as $func) {
        echo "Run " . $func . " size: " . $d . "\n"; 
        [$name, $memoryUsageBytes, $passedTime, $result] = runTest($func, $d);
        $tableBuilder->row([$func, $d, number_format($memoryUsageBytes), number_format($passedTime, 4), $result]);
    }
    $tableBuilder->row(["------", "------", "--------", "-----"]);
}
echo $tableBuilder->render() . PHP_EOL;

function runTest($name, $d)
{
    $memoryUsageStartBytes = memory_get_usage();
    $startTime = microtime(true);
    $r = -1;
    switch ($name) {
        case 'bruteForce':
            if($d > 10) {
                return [$name, '-1', '-1', '-1'];
            }
            $r = bruteForce(0, 0, $d, $d);
            break;
        case 'dp':
            $r = dp($d, $d);
            break;
        case 'memoization':
            $cache = [];
            $r = memoization(0, 0, $d, $d, $cache);
            $cache = [];
            break;
    }

    $passedTime = microtime(true) - $startTime;
    $memoryUsageBytes = memory_get_usage() - $memoryUsageStartBytes;

    return [$name, $memoryUsageBytes, $passedTime, $r];
}


// | function    | size   | memory(bytes) | time     | result              |
// |-------------|--------|---------------|----------|---------------------|
// | bruteForce  | 4      | 0             | 0.0001   | 20                  |
// | memoization | 4      | 32            | 0.0001   | 20                  |
// | dp          | 4      | 0             | 0.0002   | 20                  |
// | ------      | ------ | --------      | -----    |
// | bruteForce  | 10     | 0             | 0.1755   | 48620               |
// | memoization | 10     | 32            | 0.0002   | 48620               |
// | dp          | 10     | 0             | 0.0000   | 48620               |
// | ------      | ------ | --------      | -----    |
// | bruteForce  | 50     | -1            | -1.0000  | -1                  |
// | memoization | 50     | 32            | 0.0049   | 2.5477612258981E+28 |
// | dp          | 50     | 0             | 0.0011   | 2.5477612258981E+28 |
// | ------      | ------ | --------      | -----    |
// | bruteForce  | 100    | -1            | -1.0000  | -1                  |
// | memoization | 100    | 32            | 0.0204   | 2.2750883079423E+58 |
// | dp          | 100    | 0             | 0.0056   | 2.2750883079423E+58 |
// | ------      | ------ | --------      | -----    |
// | bruteForce  | 1000   | -1            | -1.0000  | -1                  |
// | memoization | 1000   | 32            | 1.8422   | INF                 |
// | dp          | 1000   | 0             | 0.2953   | INF                 |
// | ------      | ------ | --------      | -----    |
// | bruteForce  | 10000  | -1            | -1.0000  | -1                  |
// | memoization | 10000  | 32            | 248.1035 | INF                 |
// | dp          | 10000  | 0             | 31.4508  | INF                 |