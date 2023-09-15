<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Produtos</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li>
                    <form method="get">
                        <input type="search" placeholder="Pesquisar produto..." name="pesquisa" id="pesquisa">
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="main-head">
            <h1>Lista de produtos</h1>
            <p>Procure algum produto em específico na barra de pesquisa.</p>
        </div>

        <div id="resultado-pesquisa">

        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#resultado-pesquisa').load('php/pesquisa.php');

            $('#pesquisa').on('input', function(){
                var conteudo = $('#pesquisa').val();
                if(conteudo){
                    $.ajax({
                        url: 'php/pesquisa.php',
                        method: 'GET',
                        data: {
                            pesquisa: conteudo
                        },
                        success: function(resposta){
                            $('#resultado-pesquisa').html(resposta);
                        },
                        error: function(){
                            $('#resultado-pesquisa').html("Erro ao buscar");
                        },
                    });
                }
            });
        });
    </script>
</body>
</html>