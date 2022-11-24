<?php
    require_once "../servidor/AssinaturaController.php";
    $clientes = new AssinaturaController();
    // var_dump($clientes->getAllAssinaturas());
    $clientes = $clientes->getAllAssinaturas();
    $clientes = $clientes[0];

    function valueTransform($param1, $param2){
        $value = "$param1 () $param2";
        return $value;

    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Cliente - Index</title>
</head>
<body class='container' style="margin-top: 90px">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Contrato</th>
            </tr>
        </thead>
            <tbody>
                <?php for($i=0; $i<count($clientes); $i ++) { ?>
                    <tr>
                        <td><?= $clientes[$i]['id'] ?></td>
                        <td><?= $clientes[$i]['cliente'] ?></td>
                        <td><button class="vis btn btn-outline-secondary" value="<?= valueTransform($clientes[$i]['assinatura'], $clientes[$i]['cliente'])?>">Visualizar contrato</button>
                        <button class= "remover btn btn-danger">Remover</button></td>
                    </tr>
                <?php } ?>
            </tbody>
    </table>
    <div class="d-flex justify-content-end pt-3 pb-3">
        <a href="create.php" class="btn btn-primary" id="novaAssinatura">Novo</a>
    </div>
    <script src='../scripts/jquery.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script>
        $(".vis").click(function(){
            var parametros  = this.value.split("()")
            var doc = new jsPDF()
            var cliente = "<strong>Cliente:</strong>" + parametros[1]
            doc.fromHTML("<h2>Contrato de serviço</h2>", 76, 15)
            doc.fromHTML("<h4>Cláusula primeira</h4>", 15, 30)
            doc.fromHTML("<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the in-", 15, 38)
            doc.fromHTML("dustry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and ", 14, 46)
            doc.fromHTML("scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into", 14, 52) 
            doc.fromHTML("electronic typesetting, essentially unchanged. It was popularised in the 1960s with the release of Letraset ", 14, 58) 
            doc.fromHTML("sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus ", 14, 64)
            doc.fromHTML("PageMaker including versions of Lorem Ipsum.</br>", 14, 67)
            doc.fromHTML("<h4>Cláusula segunda</h4>", 15, 75)
            doc.fromHTML("<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the in-", 15, 83)
            doc.fromHTML("dustry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and ", 14, 91)
            doc.fromHTML("scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into", 14, 97) 
            doc.fromHTML("electronic typesetting, essentially unchanged. It was popularised in the 1960s with the release of Letraset ", 14, 103) 
            doc.fromHTML("sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus ", 14, 109)
            doc.fromHTML("PageMaker including versions of Lorem Ipsum.</br>", 14, 112)
            doc.fromHTML("<h4>Cláusula terceira</h4>", 15, 120)
            doc.fromHTML("<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the in-", 15, 128)
            doc.fromHTML("dustry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and ", 14, 136)
            doc.fromHTML("scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into", 14, 142) 
            doc.fromHTML("electronic typesetting, essentially unchanged. It was popularised in the 1960s with the release of Letraset ", 14, 148) 
            doc.fromHTML("sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus ", 14, 154)
            doc.fromHTML("PageMaker including versions of Lorem Ipsum.</br>", 14, 157)
            doc.fromHTML(cliente, 14, 173)
            doc.addImage(parametros[0], 76, 173, 50,50)
            doc.fromHTML("___________________________________________", 55, 201)
            doc.save('assinatura.pdf')
        });

        //implementar chamada ajax para o servidor
    </script>
</body>
</html>