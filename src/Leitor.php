<?php
    namespace src;

    use src\Arquivo;

    class Leitor{
        private $diretorio;
        private $arquivo;

        public function __construct()
        {
        }

        public function lerArquivo(){
            $arquivo = new Arquivo();
            $caminho = $this->getDiretorio()."\\".$this->getArquivo();
            $extensao = explode(".", $this->getArquivo());

            $arquivo->setArquivo($caminho);

            if($extensao[1] == "csv"){
                $arquivo->lerArquivoCSV();
            }

            if($extensao[1] == "txt"){
                $arquivo->lerArquivoTXT();
            }

            return $arquivo->getDados();
        }

        /**
         * Get the value of diretorio
         */
        public function getDiretorio() : string
        {
                return $this->diretorio;
        }

        /**
         * Set the value of diretorio
         *
         * @return  self
         */
        public function setDiretorio(string $diretorio)
        {
                $this->diretorio = $diretorio;

                return $this;
        }

        /**
         * Get the value of arquivo
         */
        public function getArquivo() : string
        {
                return $this->arquivo;
        }

        /**
         * Set the value of arquivo
         *
         * @return  self
         */
        public function setArquivo(string $arquivo)
        {
                $this->arquivo = $arquivo;

                return $this;
        }
    }
