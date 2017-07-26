<?php
require_once 'vendor/autoload.php';


$bookIndex = new Index();

$bookIndex->addTextField('title')
->addTextField('author')
->addNumericField('price')
->addNumericField('stock')
->create();


$bookIndex->add([
    new TextField('title', 'PHP开发手册'),
    new TextField('author', 'sunny5156'),
    new NumericField('price', 9.99),
    new NumericField('stock', 231),
]);
$bookIndex->add([
    new TextField('title', 'PHP7编程思想'),
    new TextField('author', 'sunny5156'),
    new NumericField('price', 59.99),
    new NumericField('stock', 245),
]);
$bookIndex->add([
    new TextField('title', 'Java核心开发'),
    new TextField('author', 'yuxang'),
    new NumericField('price', 34),
    new NumericField('stock', 123),
]);

$result = $bookIndex->search('sunny');

$result->count();     // Number of documents.
$result->documents(); // Array of matches.

// Documents are returned as objects by default.
$firstResult = $result->documents()[0];
$firstResult->title;
$firstResult->author;