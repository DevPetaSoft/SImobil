<?php

include "../bs/ImovelBS.php";


/*$imovel = new Imovel();

$imovel->setImobiliariaId(1);
$imovel->setEnderecoId(1);
$imovel->setDescricao("Excelente localizaçao");
$imovel->setQuarto(3);
$imovel->setPreco(1200.00);
$imovel->setTipo(2);
$imovel->setDataCriacao(date("Y-m-d H:i:s"));
$imovel->setBanheiro(2);
$imovel->setGaragem(0);
$imovel->setCozinha(2);
$imovel->setSala(1);
$imovel->setDisponivel(1);
$imovel->setCodigo("000001");
$imovel->setRegiao("Central");*/


$bs = new ImovelBS();

//$bs->save($imovel);

//$imovel->setId(1);
//$imovel->setPreco(1400.00);

//$bs->update($imovel);

//$imoveis = $bs->findAllByImobiliaria(1);

//echo $imoveis[0]->getDescricao();

//$imovel = $bs->findById(1);

//echo $imovel->getDescricao();

$bs->delete(1);

?>