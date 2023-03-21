<?php

use Wtw\Repository\OmdRepository;

require_once 'vendor/autoload.php';

$repository = new OmdRepository('tt0208092');

echo '<pre>' . print_r($repository->get(), true) . '</pre>';;