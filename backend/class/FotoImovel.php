<?php

class FotoImovel{
	//Atributos da classe foto imovel

	private $id;
	private $photoLink;


    //Construtor padrão
	public function __construct(){
		$this->imovel = new Imovel();
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

}

?>