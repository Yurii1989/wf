<?php

function getAllMondaysOfMonth($year, $month) {
    $calendar = [];
    $dateformat = new DateTime('first monday of '.DateTime::createFromFormat('Y-n', $year.'-'.$month)->format('F Y'));
    $interval = DateInterval::createFromDateString('7 days');
    while ($dateformat->format('n') == $month) {
        $calendar [] = $dateformat->format('l j, M Y');
        $dateformat->add($interval);
    }
    return $calendar;

}