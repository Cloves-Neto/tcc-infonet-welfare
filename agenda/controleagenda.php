<?php

include_once('classagenda.php');

$classAgenda = new Agenda();


// ------------R E T O R N O --------------- //

$dataAgenda = ($classAgenda->dataCount());

$buscaMedico = ($classAgenda->buscaMedico()); 

?>