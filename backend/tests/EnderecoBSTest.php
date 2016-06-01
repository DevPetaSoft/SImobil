<?php

include "../bs/EnderecoBS.php";

$endereco = new Endereco();

$endereco->setRua("Rua Doutor Jose de Assis Ribeiro");
$endereco->setBairro("Bom Pastor");
$endereco->setCidade("Varginha");
$endereco->setNumero(310);
$endereco->setEstado("Minas Gerais");
$endereco->setCep("37014-380");


$bs = new EnderecoBS();

//$bs->save($endereco);

//$endereco->setId(2);
//$endereco->setNumero(173);

//$bs->update($endereco);

//$bs->delete(2);

//$endereco = $bs->findById(3);

//echo $endereco->getRua();

$enderecos = $bs->find();
echo $enderecos[0]->getRua();
echo $enderecos[1]->getRua();

?>