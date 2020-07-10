<?php

/* 739. Daily Temperatures
Given a list of daily temperatures T, return a list such that, for each day in the input, tells you how many days you would have to wait until a warmer temperature. If there is no future day for which this is possible, put 0 instead.

For example, given the list of temperatures T = [73, 74, 75, 71, 69, 72, 76, 73], your output should be [1, 1, 4, 2, 1, 1, 0, 0].

Note: The length of temperatures will be in the range [1, 30000]. Each temperature will be an integer in the range [30, 100].
*/
function dailyTemperatures($T) {
    $answer = [];
    $answer[] = 0;
    $stack = [];
    $stack[] = [
            'idx' => 0,
            'val' => $T[0],
        ];  
        
    for ($i = 1; $i < count($T); $i++) {
        $answer[] = 0;
        if (count($stack) > 0) {
            while (count($stack) > 0 && $stack[count($stack) - 1]['val'] < $T[$i]) {
                $stackId = $stack[count($stack) - 1]['idx'];
                $answer[$stackId] = $i - $stackId;
                array_splice($stack, count($stack) - 1, 1);
            }
        }
        $stack[] = [
            'idx' => $i,
            'val' => $T[$i],
        ];
    }
    return $answer;
}


$temp = dailyTemperatures([73,74,75,71,69,72,76,73]);
echo json_encode($temp);
exit;