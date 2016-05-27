<?php
include "../class/Login.php";
include "../connect.php";


class LoginBS{

	public function __construct(){

	}

	//Cadastra um endereco no banco de dados
	public function save(Login $login){
		$query = sprintf("INSERT INTO si_login(login,senha,permicao)
		                  VALUES ('%s', '%s', %d)",$login->getLogin(), $login->getSenha(), $login->getPermicao());
		mysql_query($query) or die(mysql_error());
		return true;
	}

    
    //Altera os dados de um Endereco
	public function update(Login $login){
		$query = sprintf("UPDATE si_login SET login='%s', senha='%s', permicao=%d, ultimoLogin='%s' WHERE id=%d",$login->getLogin(), $login->getSenha(), $login->getPermicao(), date("Y-m-d H:i:s", strtotime($login->getUltimoLogin())) ,$login->getId());
		mysql_query($query) or die(mysql_error());
		return true;
	}
	
	//Deleta um registro de endereço
	public function delete($id){
		$query = sprintf("DELETE FROM si_login WHERE id=%d",$id);
		mysql_query($query) or die(mysql_error());
		return true;

	}

	/*
	Realiza uma busca passando o id como parametro e retorna 
	somente um login
	*/
	public function findById($id){
		$query = sprintf("SELECT * FROM si_login WHERE id=%d",$id);
        $result = mysql_query($query);
        $row = mysql_fetch_assoc($result);
        return $this->rowToLogin($row);
	}

	/*
	Realiza uma busca passando o login como parametro e retorna 
	somente um login
	*/
	public function findByLogin($login){
		$query = sprintf("SELECT * FROM si_login WHERE login='%s'",$login);
        $result = mysql_query($query);
        $row = mysql_fetch_assoc($result);
        return $this->rowToLogin($row);
	}

    //Função para converter uma linha retirada do banco de dados para o objeto Endereco
	public function rowToLogin($row){
		$login = new Login($row['login'],$row['senha']);
        $login->setId($row['id']);
        $login->setPermicao($row['permicao']);
        $login->setUltimoLogin($row['ultimoLogin']);
        return $login;
	}

	//Caso precise implementar novas consultas, insira o codigo abaixo desse comentario

}
?>