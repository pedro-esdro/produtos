<div class="produtos">
    <?php
        include_once "../database/dbconexao.php";

        $pesquisa = $_GET['pesquisa'] ?? "";

        $sql = "SELECT * FROM Produto";

        if ($pesquisa)
        {
            $sql .= " WHERE nomeProduto LIKE :pesquisa || valorProduto LIKE :pesquisa";
        }
        
        $select = $con->prepare($sql);

        if ($pesquisa)
        {
            $select->bindValue(':pesquisa', '%' . $pesquisa . '%', PDO::PARAM_STR);
        }

        $select->execute();

        if ($select->rowCount() > 0)
        {
            $i = 1;
            while ($x = $select->fetch(PDO::FETCH_ASSOC)) 
            {
    ?>
                <div class="produto">
                    <h2><?= $x['nomeProduto'] ?></h2>
                    <ul>
                        <li>Código do produto: <?= $x['idProduto'] ?></li>
                        <li>Valor: R$<?= $x['valorProduto'] ?></li>
                    </ul>
                    <div class="alterar-deletar">
                        <a href="cadastrar.php?id=<?= $x['idProduto'] ?>" style="background-color: #767EE3; color: #fff;"class="btn btn-info"><i class="bi bi-pencil"></i></a>
                        <button value="<?= $x['idProduto'] ?>" id="<?= $i ?>" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        <div id="resultado"></div>
                    </div>
                </div>
    <?php
            $i++;
            }
        }
        else
        {
            echo "<p>Nenhum produto consta.</p>";
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(".alterar-deletar button").click(function(){
            var id = $(this).attr("value");
            
            const confirma = window.confirm("Deseja deletar esse produto?");

            if(confirma)
            {
                $.get('php/excluir.php', { id: id }, function(resp) {
                    alert(resp);

                    $('#resultado-pesquisa').load('php/pesquisa.php');

                }).fail(function(){
                    alert("erro ao deletar");
                })
            }
        });
    </script>
</div>