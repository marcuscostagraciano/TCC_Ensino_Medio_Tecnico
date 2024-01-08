<?php

function printViaVariable($sessao){
$_SESSION['variavel']= $sessao;

if(isset($_SESSION['variavel']))
    {echo $_SESSION['variavel'];
    unset($_SESSION['variavel']);}};