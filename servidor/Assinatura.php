<?php
    require_once "ConexaoDb.php";
    class Assinatura extends ConexaoDb {

        function getAllAss(){
            $insert = new ConexaoDb();
            return $insert->getAll();
        }

        function insertAss($cliente, $assinatura) {
            $insert = new ConexaoDb();

             if($insert->insert($cliente, $assinatura)) {
                return true;
             } else {
                return false;
             }

        }

        function removerAss($clienteId){
            $insert = new ConexaoDb();

            if($insert->remove($clienteId)) {
                return true;
            } else {
                return false;
            }
        }
    }