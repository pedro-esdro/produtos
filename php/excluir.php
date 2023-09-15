<?php
include_once "../database/dbconexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'] ?? 0;

    if($id>0){
        $stmt = $con->prepare("DELETE FROM Produto WHERE idProduto = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo 'Registro '.$id.' excluído com sucesso';
    }
}

?>