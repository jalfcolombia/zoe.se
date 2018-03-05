<?php

namespace ZoeSE\intf;

interface ITask
{

  public function __construct($value, $params);

  public function main();

}
