$(document).ready(function(){  
    window.onload = function () {
        const saveBtn = document.getElementById("saveBtn");
        const canvas = document.getElementById("quadro");
        //todo conteúdo ficará aqui
        var largura = 500;
        var altura = 100;

        var quadro = document.getElementById("quadro");
        quadro.setAttribute("width", largura);
        quadro.setAttribute("height", altura);

        var ctx = quadro.getContext("2d");

        var desenhando = false;
        quadro.onmousedown = function (evt) {
            ctx.moveTo(evt.clientX, evt.clientY);
            desenhando = true;
        }
        quadro.onmouseup = function () {
            desenhando = false;
        }
        quadro.onmousemove = function (evt) {
            if (desenhando) {
                ctx.lineTo(evt.clientX, evt.clientY);
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
});