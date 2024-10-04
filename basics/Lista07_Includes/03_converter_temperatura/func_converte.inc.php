<?php
            //Funcao para conversao de temperaturas
            function converterDeFparaC($temp)
            {
                $tempConvertida = ($temp - 32) * 5/9;
                return $tempConvertida;
            }
            function converterDeCparaF($temp)
            {
                $tempConvertida = ($temp * 9/5) + 32;
                return $tempConvertida;
            }

            
            ?>