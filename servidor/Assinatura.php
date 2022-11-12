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
                return 1;
             } else {
                return 2;
             }

        }
    }