<?php
declare (strict_types = 1);

namespace foo;

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
}