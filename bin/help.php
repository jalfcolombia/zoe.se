<?php

$help = <<<HELP

El proyecto Zoe Student Edition implementa el patrón de arquitectura de software MVC en PHP7 para aprendices del SENA
de forma básica y también para cualquier persona que quiera hacer uso de esta librería bajo licencia MIT.

La forma de usar el comando ZoeSE es la siguiente:

  ./vendor/zoe.se/bin/ZoeSE GenerateApp:[NOMBRE DE LA APP] output:[RUTA COMPLETA DEL DIRECTORIO DEL PROYECTO]

Ejemplo:

  ./vendor/zoe.se/bin/ZoeSE GenerateApp:MyApp output:/var/www/html/MyApp/


HELP;

echo $help;
