<?php
            //Funcao para conversao de temperaturas
            function aritimetica($nota01, $nota02, $nota03)
            {
                $media = ($nota01 + $nota02 + $nota03)/3;
                return $media;
            }
            function ponderada($nota01, $nota02, $nota03, $peso01, $peso02, $peso03)
            {
                $media = ($nota01 + $peso01 * $nota02 + $peso02 * $nota03 + $peso03) / ($peso01 + $peso02+ $peso03);
                return $media;
            }

            
            ?>