<?php

function divide(int $value, int $divisor) {
  if ($divisor === 0) {
    throw new RuntimeException("Division by 0 is not allowed");
  }
    return $value / $divisor;
};

function arrayDivide(array $valToDiv, int $divisor):array {
    $result = [];
   foreach ($valToDiv as $val) {
       try {
           $result[] = divide($val, $divisor);
       } catch (RuntimeException $exception) {
           $result[] = $val;
       }
   }
    return $result;
}