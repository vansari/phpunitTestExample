<?php
declare (strict_types = 1);

namespace foo;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Throwable;
use TypeError;

/**
 * @coversDefaultClass \foo\SampleClass
 */
class SampleClassTest extends TestCase {
  
    /**
     * @covers ::doSomething
     * @testdox Prüft die Addition zweier Inputs
     */
    public function testDoSomething(): void {
        $sample = new SampleClass();
        $this->assertSame(5, $sample->doSomething(2,3));
    }
    
    /**
     * @covers ::doSomethingHard
     */
    public function testDoSomethingHard(): void {
        // mal ohne Testdox
        $sample = new SampleClass();
        $this->assertSame(10, $sample->doSomethingHard(3, '7'));
    }
    
    /**
     * @covers ::doSomethingHard
     */
    public function testDoSomethingHarderFails(): void {
        // mal ohne Testdox
        $sample = new SampleClass();
        $this->expectException(InvalidArgumentException::class);
        $sample->doSomethingHard(3, 'What');
    }
    
    /**
     * @covers ::doSomethingHard
     * @testdox doSomethingHard löst Exception aus bei einem nicht numerischen String
     */
    public function testDoSomethingHardFailsTd(): void {
        // mal mit Testdox
        $sample = new SampleClass();
        $this->expectException(InvalidArgumentException::class);
        $sample->doSomethingHard(3, 'What');
    }
    
    /**
     * @testdox Versteckte Funktion testen ohne Coverage
     */
    public function testDoSomethingHidden(): void {
        $sample = new SampleClass();
        $this->assertSame('fooBa', $sample->doSomethingHidden('BafoofooBa'));
    }
    
    /**
     * Funktion testen mit Coverage auf eine Methode
     * @covers ::doSomethingHidden
     */
    public function testDoSomethingHiddenWithStringOfNineChars(): void {
        $sample = new SampleClass();
        $this->assertSame('Ba', $sample->doSomethingHidden('BafofooBa'));
    }
    
    /**
     * Funktion testen mit Coverage auf beide Methoden
     * @covers ::doSomethingHidden
     * @covers ::manipulate
     */
    public function testDoSomethingHiddenWithStringOfEightChars(): void {
        $sample = new SampleClass();
        $this->assertSame('Ba', $sample->doSomethingHidden('BafofoBa'));
    }
    
    /**
     * Funktion testen mit Coverage auf beide Methoden
     * @covers ::doSomethingHidden
     * @covers ::manipulate
     */
    public function testDoSomethingHiddenWithStringOfTenChars(): void {
        $sample = new SampleClass();
        $this->assertSame('fooBu', $sample->doSomethingHidden('BafoofooBu'));
    }
    
    /**
     * @covers ::doSomethingHidden
     * @testdox doSomethingHidden löst sowohl TypeError als auch InvalidArgumentExceptions aus
     */
    public function testDoSomethingHiddenFailed(): void {
        $sample = new SampleClass();
        // TypeError
        try {
            $sample->doSomethingHidden(123);
            $this->assertTrue(false, 'TypeError must be thrown...');
        } catch (Throwable $exception) {
            $this->assertInstanceOf(TypeError::class, $exception);
        }
        
        // InvalidArgumentException empty
        try {
            $sample->doSomethingHidden('');
            $this->assertTrue(false, 'InvalidArgumentException must be thrown...');
        } catch (Throwable $exception) {
            $this->assertInstanceOf(
                InvalidArgumentException::class,
                $exception,
                'Exception must be an Instance of InvalidArgumentException::class.'
            );
        }
        
        // InvalidArgumentException too short
        try {
            $sample->doSomethingHidden('B');
            $this->assertTrue(false, 'InvalidArgumentException must be thrown...');
        } catch (Throwable $exception) {
            $this->assertInstanceOf(
                InvalidArgumentException::class,
                $exception,
                'Exception must be an Instance of InvalidArgumentException::class.'
            );
        }
        
        // InvalidArgumentException too long
        try {
            $sample->doSomethingHidden('HubbaHubbaHubbaHubba');
            $this->assertTrue(false, 'InvalidArgumentException must be thrown...');
        } catch (Throwable $exception) {
            $this->assertInstanceOf(
                InvalidArgumentException::class,
                $exception,
                'Exception must be an Instance of InvalidArgumentException::class.'
            );
        }
    }
    
    /**
     * @covers ::doSomethingHidden
     */
    public function testDoSomethingHiddenTypeError(): void {
        $sample = new SampleClass();
        // TypeError immer in einem Try/Catch
        try {
            $sample->doSomethingHidden(123);
            $this->assertTrue(false, 'TypeError must be thrown...');
        } catch (Throwable $exception) {
            $this->assertInstanceOf(TypeError::class, $exception, 'Exception must be an Instance of TypeError::class.');
        }
    }
    
    /**
     * @covers ::doSomethingHidden
     */
    public function testDoSomethingHiddenFailedIfInputIsEmpty(): void {
        $sample = new SampleClass();
        $this->expectException(InvalidArgumentException::class);
        $sample->doSomethingHidden('');
    }
    
    /**
     * @covers ::doSomethingHidden
     * @covers ::manipulate
     */
    public function testDoSomethingHiddenFailedIfInputIsTooShort(): void {
        $sample = new SampleClass();
        $this->expectException(InvalidArgumentException::class);
        $sample->doSomethingHidden('B');
    }
    
    /**
     * @covers ::doSomethingHidden
     */
    public function testDoSomethingHiddenFailedIfInputIsTooLong(): void {
        $sample = new SampleClass();
        $this->expectException(InvalidArgumentException::class);
        $sample->doSomethingHidden('HubbaHubbaHubbaHubba');
    }
    
    /**
     * @covers ::doSomethingHidden
     * @covers ::manipulate
     */
    public function testDoSomethingHiddenFailedIfInputIsTooLongWithCoverage(): void {
        $sample = new SampleClass();
        $this->expectException(InvalidArgumentException::class);
        $sample->doSomethingHidden('HubbaHubbaHubbaHubba');
    }
}