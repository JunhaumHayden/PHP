<?php
        namespace Tests;

        require __DIR__ . "/../app/Compra.php";

        use PHPUnit\Framework\TestCase;
        use app\Compra;

        class CompraTest extends TestCase
        {
            public function testFreteGratis()
            {
                $compra = new Compra();
                $this->assertTrue($compra->freteGratis(150));
            }
        }