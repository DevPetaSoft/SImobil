<?php
include "../class/Imovel.php";
include "../connect.php";


class ImovelBS{

	public function __construct(){

	}

	//Cadastra um endereco no banco de dados
	public function save(Imovel $imovel){
		$query = sprintf("INSERT INTO si_imovel(descricao,quarto,preco,tipo,deletado,dataLocacao, dataCriacao, banheiro, garagem,
			cozinha, sala, disponivel, si_endereco_idsi_endereco, si_imobiliaria_id, codigo,regiao) VALUES('%s', %d, %f, %d, %d, '%s',
			'%s',%d,%d,%d,%d,%d,%d,%d,'%s','%s')",$imovel->getDescricao(), $imovel->getQuarto(), $imovel->getPreco(),
		    $imovel->getTipo(), $imovel->getDeletado(), $imovel->getDataLocacao(), $imovel->getDataCriacao(),$imovel->getBanheiro(),
		    $imovel->getGaragem(),$imovel->getCozinha(),$imovel->getSala(),$imovel->getDisponivel(), $imovel->getEnderecoId(),
		    $imovel->getImobiliariaId(), $imovel->getCodigo(),$imovel->getRegiao());
		mysql_query($query) or die(mysql_error());
		return true;
	}


    
    //Altera os dados de um Imovel
	public function update(Imovel $imovel){
		$query = sprintf("UPDATE si_imovel SET descricao='%s', quarto=%d, preco=%f,tipo=%d, deletado=%d, dataLocacao='%s',
		dataCriacao='%s',banheiro=%d,garagem=%d,cozinha=%d,sala=%d,disponivel=%d,si_endereco_idsi_endereco=%d,si_imobiliaria_id=%d,codigo='%s',regiao='%s' WHERE id=%d",$imovel->getDescricao(), $imovel->getQuarto(), $imovel->getPreco(),
		    $imovel->getTipo(), $imovel->getDeletado(), $imovel->getDataLocacao(), $imovel->getDataCriacao(),$imovel->getBanheiro(),
		    $imovel->getGaragem(),$imovel->getCozinha(),$imovel->getSala(),$imovel->getDisponivel(), $imovel->getEnderecoId(),
		    $imovel->getImobiliariaId(), $imovel->getCodigo(),$imovel->getRegiao(),$imovel->getId());
		mysql_query($query) or die(mysql_error());
		return true;
	}
	
	//Deleta um registro de Imovel
	public function delete($id){
		$query = sprintf("DELETE FROM si_imovel WHERE id=%d",$id);
		mysql_query($query) or die(mysql_error());
		return true;

	}

    //Faz uma busca por todos os enderecos no banco, retorna um array de Imovel
	public function findAllByImobiliaria($imobiliariaId){
		$query = sprintf("SELECT * FROM si_imovel WHERE si_imobiliaria_id=%d",$imobiliariaId);
        $result = mysql_query($query);
        $imoveis = array();
        $cont = 0;
        while($row = mysql_fetch_array($result)){
        	$imoveis[$cont] = $this->rowToImovel($row);
        	$cont++;
        }

        return $imoveis;
	}

	/*
	Realiza uma busca passando o id como parametro e retorna 
	somente um endereco
	*/
	public function findById($id){
		$query = sprintf("SELECT * FROM si_imovel WHERE id=%d",$id);
        $result = mysql_query($query);
        $row = mysql_fetch_assoc($result);
        return $this->rowToImovel($row);
	}

    //Função para converter uma linha retirada do banco de dados para o objeto Endereco
	public function rowToImovel($row){
		$imovel = new Imovel();
        $imovel->setId($row['id']);
        $imovel->setDescricao($row['descricao']);
        $imovel->setQuarto($row['quarto']);
        $imovel->setPreco($row['preco']);
        $imovel->setTipo($row['tipo']);
        $imovel->setDeletado($row['deletado']);
        $imovel->setDataLocacao($row['dataLocacao']);
        $imovel->setDataCriacao($row['dataCriacao']);
        $imovel->setBanheiro($row['banheiro']);
        $imovel->setGaragem($row['garagem']);
        $imovel->setCozinha($row['cozinha']);
        $imovel->setSala($row['sala']);
        $imovel->setDisponivel($row['disponivel']);
        $imovel->setEnderecoId($row['si_endereco_idsi_endereco']);
        $imovel->setImobiliariaId($row['si_imobiliaria_id']);
        $imovel->setCodigo($row['codigo']);
        $imovel->setRegiao($row['regiao']);
        return $imovel;
	}

	//Caso precise implementar novas consultas, insira o codigo abaixo desse comentario

}
?>