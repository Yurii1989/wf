<?php
use PHPUnit\Framework\TestCase;

class ExerciseTest extends TestCase
{
    public function testSalting()
    {
        $password = 'azerty1qwerty';
        $salt = 'salt';
        
        require 'exercise.php';
        
        $this->assertEquals('azerty1saltqwerty', $saltedPassword);
    }
}

