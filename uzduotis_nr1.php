<?php

const TABLE_LINE = "+------------+-------+---------+---------+\n";

function printData($data){
    printf(" %-1s |", $data);
}

function printRow($columns, $item = []){
    echo "|";
    foreach ($columns as $column) {
        if (empty($item))
            printData($column);
        else {
            printData($item[$column]);
        }
    }
    echo "\n";
}

function printTable($data, $columns){
    echo TABLE_LINE;
    printRow($columns);
    echo TABLE_LINE;
    
    foreach ($data as $item) {
        printRow($columns, $item);
    }
    echo TABLE_LINE;
}

$data = array(
    array(
        'Name' => 'Trikse',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers'
        ),
    array(
        'Name' => 'Vardenis',
        'Element' => 'Air',
        'Likes' => 'Singning',
        'Color' => 'Blue'
        ),  
    array(
        'Element' => 'Water',
        'Likes' => 'Dancing',
        'Name' => 'Jonas',
        'Color' => 'Pink'
        ),
);

$columns = array_keys($data[0]);
printTable($data, $columns);
?>
