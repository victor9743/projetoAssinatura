<?php
    require_once 'AssinaturaController.php';

    $controler = new AssinaturaController;
    if (isset($_POST["action"])){
        switch($_POST["action"]){
            case 'salvar':
                $array = array('msg' => $controler->salvarAssinatura($_POST["cliente"], $_POST["assinatura"] ));
                echo json_encode($array);
            break;

            case 'getAll':
                var_dump($controler->getAllAssinaturas());
            break;

            case 'remover':
                $array = array('msg' => $controler->removerAssinatura($_POST["id"]));
                echo json_encode($array);
            break;
        }
    }