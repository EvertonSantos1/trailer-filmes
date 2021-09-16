<?php 

    include('banco.php') ; 

    $query = $_GET['query'] ;

    $banco = new BANCO ; 

    $banco->conecta('localhost','root','','filmes');

  $banco->loadPages($query);