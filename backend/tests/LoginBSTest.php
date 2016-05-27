<?php

include "../bs/LoginBS.php";

$login = new Login('gust','123');


$bs = new LoginBS();

//$bs->save($login);

$login->setId(1);
$login->setPermicao(10);
$login->setUltimoLogin(date("Y-m-d H:i:s"));

//echo $login->getUltimoLogin();

//$bs->update($login);

//$login = $bs->findById(1);

//$login = $bs->findByLogin("gust");


//echo $login->getLogin()."<br>";
//echo $login->getSenha()."<br>";

$bs->delete(1);
?>