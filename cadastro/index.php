
<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM produtos ORDER BY name ASC";
// SQL para selecionar os registros
$sql = "SELECT id, name, color, price, startdate, quantity "
        . "FROM produtos ORDER BY name ASC";
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <title>Sistema de Compra</title>
    </head>
    <body>
        <h1>Comprinhas <3</h1>
        <p><a href="form-add.php">Adicionar Comidinha</a></p>
        <h2>Lista de Comidinhas</h2>
        <p>Total de comidas: <?php echo $total ?></p>
        <?php if ($total > 0): ?>
             <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cor</th>
                        <th>Preço</th>
                        <th>Data de Entrada</th>
                        <th>Quantidade</th>
                <br>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($produtos = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $produtos['name'] ?></td>
                            <td><?php echo $produtos['color'] ?></td>
                            <td><?php echo $produtos['price'] ?></td>
                            <td><?php echo dateConvert($produtos['startdate']) ?></td>
                            <td><?php echo $produtos['quantity'] ?></td>

                            <td>
                                <a href="form-edit.php?id=<?php echo $produtos['id'] ?>">Editar</a>
                                <a href="delete.php?id=<?php echo $produtos['id'] ?>" 
                                   onclick="return confirm('Tem certeza de que deseja remover?');">
                                    Remover
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
                </div>
                </div>
                 </div>
        <?php else: ?>
            <p>Nenhuma comidinha registrada :( </p>
        <?php endif; ?>
    </body>
</html>