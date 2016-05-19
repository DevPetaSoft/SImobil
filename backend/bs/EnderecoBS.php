<?php
include "../class/Endereco.php";
include "../connect.php";


class EnderecoBS{

	public function __construct(){

	}

	//Cadastra um endereco no banco de dados
	public function save(Endereco $endereco){
		$query = sprintf("INSERT INTO si_endereco(rua,bairro,cidade,numero,estado,cep, complemento)
		                  VALUES ('%s', '%s', '%s', %d, '%s', '%s','%s)",$endereco->getRua(), $endereco->getBairro(), $endereco->getCidade(),
		                  $endereco->getNumero(), $endereco->getEstado(), $endereco->getCep(), $endereco->getComplemento());
		mysql_query($query) or die(mysql_error());
		return true;
	}


    
    //Altera os dados de um Endereco
	public function update(Endereco $endereco){
		$query = sprintf("UPDATE si_endereco SET rua='%s', bairro='%s', cidade='%s',numero='%d', estado='%s', 
			cep='%s', complemento='%s' WHERE id=%d",$endereco->getRua(), $endereco->getBairro(), $endereco->getCidade(),
		    $endereco->getNumero(), $endereco->getEstado(), $endereco->getCep(), $endereco->getComplemento(),$endereco->getId());
		mysql_query($query) or die(mysql_error());
		return true;
	}
	
	//Deleta um registro de endereço
	public function delete($id){
		$query = sprintf("DELETE FROM si_endereco WHERE id=%d",$id);
		mysql_query($query) or die(mysql_error());
		return true;

	}

    //Faz uma busca por todos os enderecos no banco
	public function find(){
		$query = "SELECT * FROM si_endereco";
        $result = mysql_query($query);
        return $result;
	}
	/*
	Realiza uma busca passando o id como parametro e retorna 
	somente um endereco
	*/
	public function findById($id){
		$query = sprintf("SELECT * FROM si_endereco WHERE id=%d",$id);
        $result = mysql_query($query);
        return $result;
	}

	//Caso precise implementar novas consultas, insira o codigo abaixo desse comentario

}
?>