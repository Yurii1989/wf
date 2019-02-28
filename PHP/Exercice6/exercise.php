<?php

function easterReverse($filePath) {
    $fileContent = file_get_contents($filePath);
    $secondPart = substr($fileContent, floor(strlen($fileContent) / 2));
    $firstPart = substr($fileContent, 0 , strlen($secondPart) - 1);
    $file = fopen($filePath, 'r+');
    fseek($file, strlen($firstPart), SEEK_SET);
    fwrite($file, strrev($secondPart), strlen($secondPart));
    fclose($file);
};
