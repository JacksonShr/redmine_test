<?php
$atomKey = "ad4e541dd538a5623b88fe3eb9c76d498c540b1d";


$path = "http://redmine.softmg.ru/projects/suharev/time_entries.atom?key=" . $atomKey;
$curDate = date( "Y-m-d", time() );

$xml = simplexml_load_file( $path );

foreach( $xml as $entry ){

    $upDate = date( "Y-m-d", strtotime( $entry->updated ) );

    if( $upDate != $curDate ) continue;

    $itemArr = explode( "(", $entry->title );

    $itemArr[3] = explode(")", $itemArr[2]);

    $itemTitle = $itemArr[1] . $itemArr[3][1];
    $itemTime = (float) $itemArr[0];
    $itemStatus = $itemArr[3][0];

    echo $itemTime . "\n";

    $Str =  $itemTitle . " - " . $itemStatus;

    echo $Str;

    echo "<hr />";

}