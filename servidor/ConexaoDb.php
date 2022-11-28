<?php
    class ConexaoDb extends PDO {
        private $conn;
        public function __construct(){
            $this->conn  = new PDO("mysql:host=localhost;dbname=cliente", "root", "");
        }

        protected function insert($cliente, $assinatura){
            // inserindo dados
            $stmt = $this->conn->prepare("INSERT INTO assinaturas (cliente, assinatura) VALUES (:CAMPO1, :CAMPO2)");

            // uni os valores aos campo do parametro de inserção ao banco
            $stmt->bindParam(":CAMPO1", $cliente);
            $stmt->bindParam(":CAMPO2", $assinatura);

            $stmt->execute();
            return $stmt->fetchAll();

        }

        protected function getAll(){
            $stmt = $this->conn->prepare("SELECT * FROM assinaturas");
            $stmt->execute();


            return $stmt->fetchAll();
        }

        protected function remove($id){
            $stmt = $this->conn->prepare("DELETE FROM assinaturas WHERE id = :CAMPO1;");

            $stmt->bindParam(":CAMPO1", $id);
            $stmt->execute();

            return $stmt->fetchAll();
        }


    }