<?php
$password;
$salt;
$firstpart = substr($password, 0, floor(strlen($password)/2)+(strlen($password)%2));
$secondpart = (substr($password, ceil(strlen($password)/2)));
$saltedPassword = $firstpart.$salt.$secondpart;
echo $saltedPassword;
