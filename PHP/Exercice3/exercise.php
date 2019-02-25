<?php

$input;
$bortherA = 0;
$brotherB = 0;
foreach ($input as $game) {
        if ($game[0]>$game[1]) {
            $bortherA++;
        } else if ($game[0]<$game[1]) {
            $brotherB++;
        }
        else {};
}
if ($bortherA>$brotherB) {
    echo $winner = 'A';
    } else {
    echo $winner = 'B';
}