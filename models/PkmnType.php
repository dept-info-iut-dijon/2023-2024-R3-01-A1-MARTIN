<?php
    class PkmnType{
        private ?int $idType;
        private string $nomType;
        private string $urlImg;

        public function getIdType(): ?int{
            return $this->idType;
        }

        public function getNomType(): string{
            return $this->nomType;
        }
        public function getUrlImg(): string{
            return $this->urlImg;
        }
        public function setIdType(?int $idType) {
            $this->idType = $idType;
        }
        public function setNomType(string $nomType){
            $this->nomType = $nomType;
        }
        public function setUrlImg(string $urlImg) {
            $this->urlImg = $urlImg;
        }

        public function Hydrate(array $data){
            foreach ($data as $key => $value) {
                $method = 'set' . ucfirst($key);
                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }
    }
?>