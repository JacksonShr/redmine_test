<?php
$path = "http://redmine.softmg.ru/projects/suharev/time_entries.atom?key=ad4e541dd538a5623b88fe3eb9c76d498c540b1d";
$curDate = date( "Y-m-d", time() );

$xml = simplexml_load_file( $path );


foreach( $xml as $entry ){

    $upDate = date( "Y-m-d", strtotime( $entry->updated ) );

    if( $upDate != $curDate ) continue;

    preg_match('/\((.*?)\)/',  $entry->update, $strArr );
//    var_dump($strArr);
    echo $entry->title;

    echo "<hr />";

}