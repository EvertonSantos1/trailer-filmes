<?php
require_once('banco.php') ;

header('Content-type: aplication/json');

    $name = filter_input( INPUT_GET , 'name' , FILTER_SANITIZE_STRING ) ;

    $consulta = new BANCO; 

   $consulta->conecta('localhost','root','','filmes');

   $consulta->consulta($name);

   