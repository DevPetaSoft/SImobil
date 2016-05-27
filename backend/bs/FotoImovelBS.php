<?php
include "../class/FotoImovel.php";
include "../connect.php";


class FotoImovelBS{

	public function __construct(){

	}

	//Cadastra um foto de um imovel no banco de dados
	public function save(FotoImovel $fotoImovel){
		$query = sprintf("INSERT INTO si_fotoImovel (si_imovel_id,photoLink) VALUES (%d, '%s')",
		                  $fotoImovel->getImovelId(), $fotoImovel->getPhotoLink());
		mysql_query($query) or die(mysql_error());
		return true;
	}


    
    //Altera os dados de um Endereco
	public function update(FotoImovel $fotoImovel){
		$query = sprintf("UPDATE si_fotoImovel SET si_imovel_id=%d, photoLink='%s' WHERE id=%d",$fotoImovel->getImovelId(),
		                 $fotoImovel->getPhotoLink(), $fotoImovel->getId());
		mysql_query($query) or die(mysql_error());
		return true;
	}
	
	//Deleta um registro de endereço
	public function delete($id){
		$query = sprintf("DELETE FROM si_fotoImovel WHERE id=%d",$id);
		mysql_query($query) or die(mysql_error());
		return true;

	}

    //Faz uma busca por todos os enderecos no banco, retorna um array de Enderecos
	public function findALLByImovel($imovelId){
		$query = sprintf("SELECT * FROM si_fotoImovel WHERE si_imovel_id=%d",$imovelId);
        $result = mysql_query($query);
        $fotos = array();
        $cont = 0;
        while($row = mysql_fetch_array($result)){
        	$fotos[$cont] = $this->rowToFotoImovel($row);
        	$cont++;
        }

        return $fotos;
	}
	/*
	Realiza uma busca passando o id como parametro e retorna 
	somente um endereco
	*/
	public function findById($id){
		$query = sprintf("SELECT * FROM si_fotoImovel WHERE id=%d",$id);
        $result = mysql_query($query);
        $row = mysql_fetch_assoc($result);
        return $this->rowToFotoImovel($row);
	}

    //Função para converter uma linha retirada do banco de dados para o objeto Endereco
	public function rowToFotoImovel($row){
		$fotoImovel = new FotoImovel($row['si_imovel_id']);
        $fotoImovel->setId($row['id']);
        $fotoImovel->setPhotoLink($row['photoLink']);
        return $fotoImovel;
	}

	//Caso precise implementar novas consultas, insira o codigo abaixo desse comentario

}
?>