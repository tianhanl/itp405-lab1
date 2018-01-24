<?php
require('./Product.php');
require('./Track.php');
use Apple\Checkout\Track;

$pdo = new PDO('sqlite:chinook.db');
$tracks = Track::all($pdo);
var_dump($tracks);
?>