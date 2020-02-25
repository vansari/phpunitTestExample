<?php
declare (strict_types = 1);

namespace foo;

use InvalidArgumentException;

class SampleClass {
  
    /**
     * Einfache Funktion um Unit Test durchzuführen
     * @param int $left
     * @param int $right
     */
    public function doSomething(int $left, int $right): int {
        return $left + $right;
    }
  
    /**
     * "Komplexere" Funktion mit Exception
     * @param int $left
     * @param string $right
     */
    public function doSomethingHard(int $left, string $right): int {
        if (1 !== preg_match('/[0-9]+/', $right)) {
            throw new InvalidArgumentException('Falsch!');
        }
        
        return $this->doSomething($left, (int)$right);
    }
  
    /**
     * Öffentliche Funktion ruft eine private auf um einen Input zu verändern
     * @param string $input
     */
    public function doSomethingHidden(string $input): string {
        // Bail out if String is empty
        if ('' === trim($input)) {
            throw new InvalidArgumentException('String is empty.');
        }
        
        return $this->manipulate($input);
    }
    
    /**
     * @param string $input 
     */
    private function manipulate(string $input): string {
        // Bail out if String is too short
        if (2 >= strlen($input)) {
            throw new InvalidArgumentException('String is too short.');
        }
        
        // Bail out if String is too long
        if (20 <= strlen($input)) {
            throw new InvalidArgumentException('String is too long.');
        }
        // return all chars from pos 5
        if (10 === strlen($input)) {
            return substr($input, 5);
        }
        
        // return the last 2 chars
        return substr($input, -2);
    }
}