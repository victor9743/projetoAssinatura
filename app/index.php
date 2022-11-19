<?php
    require_once "../servidor/AssinaturaController.php";
    $clientes = new AssinaturaController();
    // var_dump($clientes->getAllAssinaturas());
    $clientes = $clientes->getAllAssinaturas();
    $clientes = $clientes[0];
    var_dump($clientes[0]['assinatura']);
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
                <tr>
                    <td><?= $clientes[$i]['id'] ?></td>
                    <td><?= $clientes[$i]['cliente'] ?></td>
                    <td><button onclick="gerarPdf()">visualizar contrato</button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="create.php">Novo</a>
    <script src='../scripts/jquery.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script>
        function gerarPdf() {
            var doc = new jsPDF()
            var image = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAABkCAYAAABwx8J9AAAAAXNSR0IArs4c6QAABpRJREFUeF7t3b2KJGUYBeCz6w+roaAYm6qRGHkDht6CgYF4C2IggmBgYrCJ4C2YeQNiJCYaiRgZiGIq/iufdMPQO8ouXTVddb5nMted6u99zrt9pntqdm/FBwECBAgQILB7gVu7n8AABAgQIECAQBS6JSBAgAABAgUCCr0gRCMQIECAAAGFbgcIECBAgECBgEIvCNEIBAgQIEBAodsBAgQIECBQIKDQC0I0AgECBAgQUOh2gAABAgQIFAgo9IIQjUCAAAECBBS6HSBAgAABAgUCCr0gRCMQIECAAAGFbgcIECBAgECBgEIvCNEIBAgQIEBAodsBAgQIECBQIKDQC0I0AgECBAgQUOh2gAABAgQIFAgo9IIQjUCAAAECBBS6HSBAgAABAgUCCr0gRCMQIECAAAGFbgcIECBAgECBgEIvCNEIBAgQIEBAodsBAgQIECBQIKDQC0I0AgECBAgQUOh2gAABAgQIFAgo9IIQjUCAAAECBBS6HSBAgAABAgUCCr0gRCMQIECAAAGFbgcIECBAgECBgEIvCNEIBAgQIEBAodsBAgQIECBQIKDQC0I0AgECBAgQUOh2gAABAgQIFAgo9IIQjUCAAAECBBS6HSBAgAABAgUCCr0gRCMQIECAAAGFbgcIECBAgECBgEIvCNEIBAgQIEBAodsBAgQIECBQIKDQC0I0AgECBAgQUOh2gAABAgQIFAgo9IIQjUCAAAECBBS6HSBAgAABAgUCCr0gRCMQIECAAAGFbgcIECBAgECBgEIvCNEIBAgQIEBAodsBAgQIECBQIKDQC0I0AgECBAgQUOh2gAABAgQIFAgo9IIQjUCAAAECBBT6ujvw97qXd3UC/wqMPXsryTs8CBCYV0Chr5u9Ql/X19XvFRg7dxsMAQLzCSj0/WT+S5JHk1zNbDx5/5bkzn7GWP2kLyT5JMmTSb5K8vzqj7iNB/g9yUMn+/HX4de2cUKnIEBgVQGFvirvahd/I8kHJ0/ex7deZ3519mWS55L8mOTlJF+slsC2L/znyav08YXf+LVHtn1spyNA4BwBhX6O3nY+95skzxwK/rMkL23naKuf5PUk7yV5/PBuxdtJ3l39UffzAONV+um7OqPgx6t5HwQIFAko9KIwkxyfvJtzHV+4fJTkxSSPHeL7I8nXSZ7tinPRad5MMr7YuW43vIJflNrFCFxGoPmJ/zKil3/U4414Tdl+mOSVJE8cCmnM+FOSj5O8dnnyXZ7g+yRPHU5+uivHHfohydO7nM6hCUwo0PSkP2F814786YXecv+/O/pP/994J+G/Psar7fExvt87Pu/hw3//nOTzJK8m+VbYqwhcd2Pdkg/kDvwlNV2LwImAQu9cidPvm97ElEsX+jjzd0neT3L3JgbwGNcKjJvpxvPEUs8V44uG8dMaPggQWFhgqT+kCx/L5QgQKBRo/HZQYUxG2quAQt9rcs5NYJ8Co9S99b7P7Jx64wIKfeMBFR7vEt8OKGTc/UhKffcRGmBrAgp9a4l0n8dfhdud74NM57nnQbT8XgL3IeAP1X0g+S1nC4wboY53q7sp6mxOFyBAgMC9AgrdVqwtcHyL3Vusa0u7PgECUwso9KnjX3X4q3+fuDJfldrFCRAgsNzPlrIkcBT49crPGStye0GAAIEbEvAK/YagJ3mYq3ewj2L3z7pOErwxCRC4vIBCv3wGDSe4WuT+De6GRM1AgMDuBBT67iLb3IHd9La5SByIAIEZBRT6jKkvN7MyX87SlQgQIHCWgEI/i2/qT1bmU8dveAIEtiag0LeWyL7OM0r99r6O7LQECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE1DokwVuXAIECBDoFFDonbmaigABAgQmE/gH8uZYZbBsv5EAAAAASUVORK5CYII='
            // doc.text('<h1>Hello world!</h1>', 10, 10)
            // doc.addImage(image, 15, 25,50, 50)
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
            doc.fromHTML("<strong>Cliente:</strong> teste", 14, 173)
            doc.addImage(image, 76, 173, 50,50)
            doc.fromHTML("___________________________________________", 55, 201)
            doc.save('teste.pdf')
        }
    </script>
</body>
</html>