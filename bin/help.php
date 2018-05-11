<?php

$help = <<<HELP

The Zoe (Student Edition) project implements the MVC development pattern in PHP7 for SENA apprentices in a basic way and also for anyone else who wants to make use of this library under MIT license.
  
The way to use the ZoeSE command is as follows:
  
  ./vendor/zoe.se/bin/ZoeSE GenerateApp:[NAME YOUR APP] output:[DIRECTORY PATH TARGET]
  
Example:
  
  ./vendor/zoe.se/bin/ZoeSE GenerateApp:MyApp output:/var/www/html/MyApp/


HELP;

echo $help;
