<?php

function getAllMondaysOfMonth($year, $month)
{
    $mondays = [];
    $date = new DateTime('first monday of '.(DateTime::createFromFormat('Yn', $year.$month))->format('F Y'));
    $interval = DateInterval::createFromDateString('next monday');
    while($date->format('m') == $month) {
        $mondays[] = $date->format('l j, M Y');
        $date->add($interval);
    }
    return $mondays;
    }

