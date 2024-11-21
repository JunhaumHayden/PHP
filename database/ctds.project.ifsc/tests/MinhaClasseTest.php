<?php
use PHPUnit\Framework\TestCase;
use Hayden\CtdsProjectIfsc\MinhaClasse; // Importa a classe a ser testada

class MinhaClasseTest extends TestCase
{
    public function testSomar()
    {
        $obj = new MinhaClasse();
        $resultado = $obj->somar(2, 3);
        
        $this->assertEquals(5, $resultado);
    }
}
