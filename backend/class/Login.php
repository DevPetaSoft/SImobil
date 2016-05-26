<?php

class Login{
	//Atributos da classe Login
	private $id;
	private $login;
	private $senha;
	private $permicao;
	private $ultimoLogin;

	//Construtor padrão
	public function __construct($login, $senha){
		$this->login = $login;
		$this->senha = hash('sha512',$senha);
	}

    //Getters e Setters
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	public function getLogin(){
		return $this->login;
	}
	public function setLogin($login){
		$this->login = $login;
	}

	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getPermicao(){
		return $this->permicao;
	}
	public function setPermicao($permicao){
		$this->permicao = $permicao;
	}

	public function getUltimoLogin(){
		return $this->ultimoLogin;
	}
	public function setUltimoLogin($ultimoLogin){
		$this->ultimoLogin = $ultimoLogin;
	}
}

?>