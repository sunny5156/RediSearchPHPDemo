<?php
require_once  "./vendor/autoload.php";

use Ehann\RediSearch\Index;
use Ehann\RediSearch\Fields\TextField;
use Ehann\RediSearch\Fields\NumericField;
use Ehann\RediSearch\Redis\RedisClient;

$redis = new RedisClient('Redis', '106.75.93.100', 6379, 0, '');


$bookIndex = new Index($redis,'books');

$bookIndex->addTextField('title')
->addTextField('author')
->addNumericField('price')
->addNumericField('stock')
->create();


// $bookIndex->add([
//     new TextField('title', 'PHP'),
//     new TextField('author', 'sunny5156'),
//     new NumericField('price', 9.99),
//     new NumericField('stock', 231),
// ]);
// $bookIndex->add([
//     new TextField('title', 'PHP7编程思想'),
//     new TextField('author', 'sunny5156'),
//     new NumericField('price', 59.99),
//     new NumericField('stock', 245),
// ]);
// $bookIndex->add([
//     new TextField('title', 'Java核心开发'),
//     new TextField('author', 'yuxang'),
//     new NumericField('price', 34),
//     new NumericField('stock', 123),
// ]);


$result = $bookIndex->search('sunny*');

echo $result->getCount();     // Number of documents.
$res = $result->getDocuments(); // Array of matches.
echo "<pre>";
print_r($res);

// Documents are returned as objects by default.
$firstResult = $result->getDocuments()[0];
$firstResult->title;
$firstResult->author;