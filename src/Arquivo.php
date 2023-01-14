<?php
    namespace src;

    class Arquivo{
        private $arquivo;
        private $dados = array();

        public function lerArquivoCSV(){
            $handle = fopen($this->getArquivo(), 'r');

            while(($linha = fgetcsv($handle, 10000, ';'))){
                $this->setDados($linha[0], $linha[1], $linha[2]);
            }

            fclose($handle);
        }

        public function lerArquivoTXT(){
            $handle = fopen($this->getArquivo(), 'r');

            while(!feof($handle)){
                $linha = fgets($handle);
                $nome = substr($linha, 11, 30);
                $documento = substr($linha, 0, 11);
                $email = substr($linha, 41, 50);

                $this->setDados($nome, $documento, $email);
            }

            fclose($handle);
        }

        public function lerArquivoXLSX(){
            // Ler XLSX
        }


        /**
         * Get the value of arquivo
         */
        public function getArquivo()
        {
                return $this->arquivo;
        }

        /**
         * Set the value of arquivo
         *
         * @return  self
         */
        public function setArquivo($arquivo)
        {
                $this->arquivo = $arquivo;

                return $this;
        }

        /**
         * Get the value of dados
         */
        public function getDados()
        {
                return $this->dados;
        }

        /**
         * Set the value of dados
         *
         * @return  self
         */
        public function setDados(string $nome, string $documento, string $email)
        {
            array_push($this->dados, array(
                "nome" => iconv('ISO-8859-1', 'UTF-8', $nome),
                "documento" => $documento,
                "email" => $email
            ));

            return $this;
        }
    }
