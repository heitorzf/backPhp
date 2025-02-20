<?php 
    $nome2 = $_POST['nome2'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $media = ($nota1 + $nota2) / 2;
    echo "Aluno: ".$nome2."Media final: ".$media;


?>