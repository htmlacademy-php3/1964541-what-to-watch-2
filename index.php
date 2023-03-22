<?php

use GuzzleHttp\Client;
use Wtw\Repository\OmdRepository;

require_once 'vendor/autoload.php';

$client = new Client();
$repository = new OmdRepository('571da7ed', $client);

echo '<pre>' . print_r($repository->get('tt0208092'), true) . '</pre>';;