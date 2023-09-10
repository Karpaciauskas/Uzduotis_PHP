<?php

const GROUPS_COUNT = 3;

function findGroups($values, $groups) {
    rsort($values);
    $lastNum = array_key_last($values);

    foreach ($values as $key => $num) {
        $groupSizes = array_map('array_sum', $groups);
        $minSumIndex = array_search(min($groupSizes), $groupSizes);
        $minSum = $groupSizes[$minSumIndex];
        $filteredGroupSizes = array_filter($groupSizes, fn($sum) => $sum === $minSum && $sum !== 0);
        $equalSums = array_keys(array_diff($filteredGroupSizes, [0]));

        if (count($equalSums) > 1 && $key == $lastNum) {
            $groups[end($equalSums)][] = $num;
        } else { 
            $groups[$minSumIndex][] = $num;
        }
    }

    return $groups;
}

$values = [1, 2, 4, 7, 1, 6, 2, 8];
$groups = array_fill(0, GROUPS_COUNT, []);

foreach (findGroups($values, $groups) as $group){
    echo implode(",", $group) . " = " . array_sum($group) . "\n";
}
?>