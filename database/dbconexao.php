<?php

    try
    {
        $user = "root";
        $password = "032MendicantBias";
        $con = new PDO('mysql:host=localhost; dbname=dbProduto', $user, $password);
    }
    catch(PDOException $e)
    {
        echo "Erro na conexão ao banco de dados.";
    }

?>