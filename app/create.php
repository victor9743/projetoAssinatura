<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente - Novo</title>
    
</head>
<body>
    <div>
        <h2>Contrato de serviço</h2>
        <h4>Cláusula primeira</h4>
        <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
        <h4>Cláusula segunda</h4>
        <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
        <h4>Cláusula terceira</h4>
        <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
        <label>Nome do cliente</label><br>
        <input type="text" id="cliente"><br/>
        <label>Assinatura</label><br>
        
        <canvas id="quadro" style="background:beige; margin-left: 275px"></canvas>
    </div>
    

    <br><button id="saveBtn"> Salvar</button>
    <a href="index.php">voltar</a>
    <script src="../scripts/jquery.js"></script>
    <script>
        window.onload = function () {
            const saveBtn = document.getElementById("saveBtn");
            const canvas = document.getElementById("quadro");
            //todo conteúdo ficará aqui
            var largura = 700;
            var altura = 150;
            var quadro = document.getElementById("quadro");
            quadro.setAttribute("width", largura);
            quadro.setAttribute("height", altura);

            var ctx = quadro.getContext("2d");

            var desenhando = false;
            quadro.onmousedown = function (evt) {
                ctx.moveTo((evt.clientX -280), (evt.clientY - 420));
                desenhando = true;
            }
            quadro.onmouseup = function () {
                desenhando = false;
            }
            quadro.onmousemove = function (evt) {
                if (desenhando) {
                    ctx.lineTo((evt.clientX - 280), (evt.clientY - 420));
                    ctx.stroke();
                }
            }

            saveBtn.onclick = function (e) {

                // Converte o canvas para image/png; base64:
                var image = canvas.toDataURL()

                // Define a imagem como valor a ser enviado:
                var params = image;
                $.ajax({
                    type: "post",
                    beforeSend: function(xhr) {xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').last().attr('content'))},
                    url: 'http://localhost/projetoAssinatura/servidor/Rotas.php',
                    data: {action: "salvar" ,assinatura: params, cliente: $("#cliente").val()},
                    success: function(data) {
                        console.log(data);
                    }
                });
            }
        }
    </script>
</body>
</html>