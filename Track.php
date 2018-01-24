<?php

namespace Apple\Checkout;

use Product;

use PDO;

class Track extends Product
{
  protected $bytes;

  public static function find($id, $pdo)
  {
    $statement = $pdo->prepare('
      select *
      from tracks
      where TrackId = ?
    ');
    $statement->bindParam(1, $id);
    $statement->execute();
    $track = $statement->fetch(PDO::FETCH_OBJ);
    return new Track($track);
  }

  public static function all($pdo)
  {
    $statement = $pdo->prepare('
      select *
      from tracks
    ');
    $statement->execute();
    $tracks = $statement->fetchAll(PDO::FETCH_OBJ);
    $output = [];
    foreach ($tracks as $track) {
      $output[] = new Track($track);
    }
    return $output;
  }

  public function __construct($track)
  {
    $this->name = $track->Name;
    $this->price = $track->UnitPrice;
    $this->bytes = $track->Bytes;
  }

  public function getSize($size)
  {
    switch ($size) {
      case 'B':
        return $this->bytes;
      case 'KB':
        return $this->bytes * pow(10, -3);
      case 'MB':
        return $this->bytes * pow(10, -6);
    }
  }
}
