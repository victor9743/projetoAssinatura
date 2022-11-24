<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Cliente - Novo</title>
</head>
<body>
    <div class="accordion container-sm" id="accordionExample">
        <h2 class="text-center button-disciplina button-border display-6">Contrato de serviço</h2>
        <br>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Cláusula primeira
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    Cláusula segunda
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree">
                    Cláusula terceira
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
            </div>
        </div>
    </div>
    <div class="container"class="col-md-4">
        <br><label>Nome do cliente</label>
        <input class="form-control" type="text" id="cliente">
    </div>
    <br>
    <div class="container">
    <label>Assinatura</label>
    <canvas class="container" id="quadro" style="background:beige; margin-center: 275px"></canvas>
    </div>
    <br><button class="btn btn-primary" id="saveBtn">Salvar</button>
    <a class="btn btn-secondary" href="index.php">Voltar</a>
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
                ctx.moveTo((evt.clientX - 280), (evt.clientY - 420));
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
                    beforeSend: function (xhr) { xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').last().attr('content')) },
                    url: 'http://localhost/projetoAssinatura/servidor/Rotas.php',
                    data: { action: "salvar", assinatura: params, cliente: $("#cliente").val() },
                    success: function (data) {
                        console.log(data);
                    }
                });
            }
        }
    </script>
</body>
</html>