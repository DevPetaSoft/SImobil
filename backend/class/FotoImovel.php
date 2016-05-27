<?php

class FotoImovel{
	//Atributos da classe foto imovel

	private $id;
	private $photoLink;
	private $imovelId;


    //Construtor padrão
	public function __construct($imovelId){
		$this->imovelId = $imovelId;
	}

	//Getters and Setters
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getPhotoLink(){
		return $this->photoLink;
	}

	public function setPhotoLink($photoLink){
		$this->photoLink = $photoLink;
	}

    public function getImovelId(){
		return $this->imovelId;
	}

	public function setImovelId($imovelId){
		$this->imovelId = $imovelId;
	}


}

?>