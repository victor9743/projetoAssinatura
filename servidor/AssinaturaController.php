<?php
    require_once 'Assinatura.php';
    class AssinaturaController {

        function getAllAssinaturas(){
            $assinatura = new Assinatura;
            return array($assinatura->getAllAss());
        }

        function salvarAssinatura($cliente, $assinatura){
            $assinaturaModel = new Assinatura;    
            return $assinaturaModel->insertAss($cliente, $assinatura);
        }

        function removerAssinatura($id) {
            $assinatura = New Assinatura;
            return $assinatura->removerAss($id);
        }
    }
