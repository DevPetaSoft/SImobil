<?php

include "../bs/FotoImovelBS.php";

$fotoImovel = new FotoImovel(2);

//$fotoImovel->setPhotoLink("https://www.google.com.br/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjanoCnuPrMAhXDf5AKHbfUDb0QjRwIBw&url=http%3A%2F%2Fwww.adorocinema.com%2Fslideshows%2Ffilmes%2Fslideshow-113889%2F&psig=AFQjCNFKZJcRfmExugNhx6uHTUB7_vGG_g&ust=1464444842201451");


$bs = new FotoImovelBS();

//$bs->save($fotoImovel);

//$fotoImovel->setPhotoLink("https://www.teste.com.br/");
//$fotoImovel->setId(2);
//echo $fotoImovel->getPhotoLink();

//$bs->update($fotoImovel);

//$imoveis = $bs->findAllByImovel(2);
//echo $imoveis[0]->getPhotoLink();


$fotoImovel = $bs->findById(2);
echo $fotoImovel->getPhotoLink();

?>