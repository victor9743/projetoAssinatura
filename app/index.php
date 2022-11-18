<?php
    require_once "../servidor/AssinaturaController.php";
    $clientes = new AssinaturaController();
    // var_dump($clientes->getAllAssinaturas());
    $clientes = $clientes->getAllAssinaturas();
    $clientes = $clientes[0];
    var_dump($clientes[0]['id']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cliente - Index</title>
</head>
<body>
    <table>
        <thead>
            <th>#</th>
            <th>Cliente</th>
            <th>Contrato</th>
        </thead>
        <tbody>
            <?php for($i=0; $i<count($clientes); $i ++) { ?>
                <tr><?= $clientes[$i]['id'] ?></tr>
                <tr><?= $clientes[$i]['cliente'] ?></tr>
                <tr><?= $clientes[$i]['assinatura'] ?></tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="create.php">Novo</a> 
</body>
</html>