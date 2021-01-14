<?php

include_once 'Config/config.php';
include_once 'Functions/functions.php';
include_once 'Config/config.php';

require 'Controleur/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();

