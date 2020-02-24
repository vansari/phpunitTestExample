<?php
declare (strict_types = 1);

namespace foo;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass foo\SampleClass
 */
class SampleClassTest extends TestCase {
  
    /*
     * @covers ::doSomething
     * @testdox check Test
     */
    public function testDoSomething(): void {
        $sample = new SampleClass();
        $this->assertSame(5, $sample->doSomething(2,3));
    }
}