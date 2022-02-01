<?php

function get_datetime(){
    date_default_timezone_set( 'Europe/Istanbul' );
    $datetime = date("d/m/Y h:i:sa");

    return $datetime;
}

function get_date(){
    date_default_timezone_set( 'Europe/Istanbul' );
    $date = date("d-m-Y");

    return $date;
}
