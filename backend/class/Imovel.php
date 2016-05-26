<?php

include "Endereco.php";

class Imovel{

	//Atributos da classe Imovel
	private $id;
	private $descricao;
	private $quarto;
	private $preco;
	private $tipo;
	private $deletado;
	private $dataLocacao;
	private $dataCriacao;
	private $banheiro;
	private $garagem;
	private $cozinha;
	private $sala;
	private $disponivel;
	private $endereco;
	private $idImobiliaria;
	private $codigo;

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

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getQuarto(){
		return $this->quarto;
	}

	public function setQuarto($quarto){
		$this->quarto = $quarto;
	}

	public function getPreco(){
		return $this->preco;
	}

	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}	

	public function getDeletado(){
		return $this->deletado;
	}

	public function setDeletado($deletado){
		$this->deletado = $deletado;
	}

	public function getDataLocacao(){
		return $this->dataLocacao;
	}

	public function setDataLocacao($dataLocacao){
		$this->dataLocacao = $dataLocacao;
	}

	public function getDataCriacao(){
		return $this->dataCriacao;
	}

	public function setDataCriacao($dataCriacao){
		$this->dataCriacao = $dataCriacao;
	}

	public function getBanheiro(){
		return $this->banheiro;
	}

	public function setBanheiro($banheiro){
		$this->banheiro = $banheiro;
	}
	
	public function getGaragem(){
		return $this->garagem;
	}

	public function setGaragem($garagem){
		$this->garagem = $garagem;
	}

	public function getCozinha(){
		return $this->cozinha;
	}

	public function setCozinha($cozinha){
		$this->cozinha = $cozinha;
	}

	public function getSala(){
		return $this->sala;
	}

	public function setSala($sala){
		$this->sala = $sala;
	}

	public function getDisponivel(){
		return $this->disponivel;
	}

	public function setDisponivel($disponivel){
		$this->disponivel = $disponivel;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setDisponivel(Endereco $endereco){
		$this->endereco = $endereco;
	}

	public function getIdImobiliaria(){
		return $this->idImobiliaria;
	}

	public function setIdImobiliaria($idImobiliaria){
		$this->idImobiliaria = $idImobiliaria;
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

}

?>