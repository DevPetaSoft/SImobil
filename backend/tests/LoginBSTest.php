<?php

include "../bs/LoginBS.php";

$login = new Login('gust','123');

echo $login->getLogin()."<br>";
echo $login->getSenha()."<br>";

$bs = new LoginBS();

$bs->save($login);
?>