<?php

include "../bs/EnderecoBS.php";

$endereco = new Endereco();

$endereco->setRua("Rua Santana");
$endereco->setBairro("Centro");
$endereco->setCidade("Lavras");
$endereco->setNumero(143);
$endereco->setComplemento("Ap 202");
$endereco->setEstado("Minas Gerais");
$endereco->setCep("37200-000");


$bs = new EnderecoBS();

//$bs->save($endereco);

$endereco->setId(2);
$endereco->setNumero(173);

//$bs->update($endereco);

$bs->delete(2);
?>