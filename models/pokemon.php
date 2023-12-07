<?php
class Pokemon{
    private ?int $idPokemon;
    private string $nomEspece;
    private ?string $description;
    private string $typeOne;
    private ?string $typeTwo;
    private ?string $urlImg;

    public function GetIdPokemon(): ?int{
        return $this->idPokemon;
    }
    public function getNomEspece(): ?string{
        return $this->nomEspece;
    }
    public function getDescription(): ?string{
        return $this->description;
    }
    public function getTypeOne(): ?string{
        return $this->typeOne;
    }
    public function getTypeTwo(): ?string{
        return $this->typeTwo;
    }
    public function getUrlImg(): ?string{
        return $this->urlImg;
    }

    public function setIdPokemon(?int $idPokemon) {
        $this->idPokemon = $idPokemon;
    }
    public function setNomEspece(?string $nomEspece){
        $this->nomEspece = $nomEspece;
    }
    public function setDescription(?string $description) {
        $this->description = $description;
    }
    public function setTypeOne(?string $typeOne) {
        $this->typeOne = $typeOne;
    }
    public function setTypeTwo(?string $typeTwo) {
        $this->typeTwo = $typeTwo;
    }
    public function setUrlImg(?string $urlImg) {
        $this->urlImg = $urlImg;
        
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
}
    

?>