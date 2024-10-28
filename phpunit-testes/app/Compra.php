<?php
        namespace app;

        class Compra
        {
            public function freteGratis($valor)
            {
                return $valor >= 150;
            }
        }