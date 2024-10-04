<?php
function calcularMedia($n1, $n2)
{
$media = ($n1 + $n2)/2;
return $media;  
}

//========================================================

function verificarAprovado($media)
{
if($media >= 6)
 {
 echo "<p> Aluno aprovado, com media <span> $media </span>! </p>";
 }
else
 {
 echo "<p> Aluno reprovado, com media <span> $media </span>! </p>";
 }
}
