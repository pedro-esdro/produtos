<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        input {
            height: 35px;
        }
        button {
            height: 35px;
            width: 150px;
            background-color: #767EE3;
            color: #fff;
            cursor: pointer;
            border: 0;
            outline: 0;
            box-shadow: 0px 2px 4px rgba(0,0,0,0.4);
        }
        button:hover {
            background-color: #686fcb;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
            </ul>
        </nav>
    </header>
    <?php
    include_once "database/dbconexao.php";
 
    $id = $_GET['id'] ?? "";
    $operacao = "Cadastrar";
 
    $nome = "";
    $valor = "";
 
    $select = $con->prepare("SELECT * FROM Produto WHERE idProduto = :id");
    $select->bindParam(':id', $id);
    $select->execute();
    if ($x = $select->fetch(PDO::FETCH_ASSOC)) {
        $nome = $x['nomeProduto'] ?? "";
        $valor= $x['valorProduto'] ?? "";
        $operacao = "ATUALIZAR";
    }
    ?>
    <main>
        <div class="main-head">
            <h1>Cadastrar ou alterar Produto</h1>
        </div>
        <br>
        <form action="#" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= $nome ?>" required>
                <label for="valor">Valor (R$):</label>
                <input type="text" id="valor" name="valor" value="<?= $valor ?>" required>
                <button type="submit"><?= $operacao ?></button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'] ?? "";
            $valor = $_POST['valor'] ?? "";
 
            if ($id) {
                $operacao = "Atualização";
                $insert_update = $con->prepare("UPDATE `Produto` SET `nomeProduto`=?, `valorProduto`=? WHERE idProduto = $id");
            } else {
                $operacao = "Cadastro";
                $insert_update = $con->prepare("INSERT INTO `Produto` (`nomeProduto`, `valorProduto`) VALUES (?, ?);");
            }
            $foi = $insert_update->execute([
                0 => $nome,
                1 => $valor
            ]);
 
            if ($foi) {
                echo "$operacao realizado com sucesso";
            } else {
                echo "$operacao falhou";
            }
        }
        ?>
    </main>
</body>
 
</html>