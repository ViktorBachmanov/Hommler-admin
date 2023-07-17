<?php

namespace app\util;


class ProductColumn
{
  public string $name;
  public string $label;
  public bool $visible;

  public static array $columns;

  public static function seedProductColumns(array $data)
  {
     foreach($data as $columndata) {
      self::$columns[] = new ProductColumn($columndata[0], $columndata[1]);
    }
  }

  public function __construct(string $name, string $label)
  {
    $this->name = $name;
    $this->label = $label;

    $cookieKey = "check-$name";

    if(isset($_COOKIE[$cookieKey])) {
      $this->visible = $_COOKIE[$cookieKey] === 'true'
        ? true 
        : false;
    }
    else {
      $this->visible = true;
    }
  }

}
