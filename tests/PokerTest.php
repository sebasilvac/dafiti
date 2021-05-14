<?php

use App\Poker;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public $poker;
    public function setUp(){
        $this->poker = new Poker();
    }

    public function testAlgorithm()
    {
        $result1 = $this->poker->isStraight([2, 3, 4, 5, 6]);
        $this->assertEquals( $result1, true, "2, 3, 4, 5, 6" );

        $result2 = $this->poker->isStraight([14, 5, 4, 2, 3]);
        $this->assertEquals( $result2, true, "14, 5, 4, 2, 3" );

        $result3 = $this->poker->isStraight([7, 7, 12, 11, 3, 4, 14]);
        $this->assertEquals( $result3, false, "7, 7, 12, 11, 3, 4, 14" );

        $result4 = $this->poker->isStraight([7, 3, 2]);
        $this->assertEquals( $result4, false, "7, 3, 2");


        $result = $this->poker->isStraight([10, 11, 12, 13, 14]);
        $this->assertTrue($result);

        $result = $this->poker->isStraight([2, 4, 6, 8, 10]);
        $this->assertFalse($result);
    }

    public function test_is_valid_list(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('El listado de cartas se encuentra vacío.');
        $this->poker->isStraight([]);
    }

    public function test_is_valid_value(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Existen valores que no corresponden.');
        $this->poker->isStraight([2, 3, 15]);
    }

    public function test_valid_quantity(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('La cantidad de elementos super el máximo de 7.');
        $this->poker->isStraight([2, 3, 4, 5, 6, 7, 8, 9]);
    }
}