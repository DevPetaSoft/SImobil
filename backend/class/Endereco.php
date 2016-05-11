<?php

class Endereco{
	//Atributos da classe Endereco
	private $id;
	private $rua;
	private $bairro;
	private $cidade;
	private $numero;
	private $estado;
	private $cep;

	//Construtor padrão
	public function __construct(){

	}

	//Getters e Setters
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getRua(){
		return $this->rua;
	}

	public function setRua($rua){
		$this->rua = $rua;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getCep(){
		return $this->cep;
	}

	public function setCep($cep){
		$this->cep = $cep;
	}
}

?>