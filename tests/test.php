#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use vsflash\Serialize\Tests\Book;
use vsflash\Serialize\Serializer;
use vsflash\Serialize\encoders\JsonEncoder;
use vsflash\Serialize\encoders\XmlEncoder;
use vsflash\Serialize\encoders\YamlEncoder;

$book = new Book();
$book->setTitle('Clean Code');
$book->setDescription('Even bad code can function. But if code isn\'t clean, it can bring a development organization to its knees. Every year, countless hours and significant resources ...');
$book->setAuthor('Robert Martin');
$book->setPrice(350);

$serializer = new Serializer(new YamlEncoder());
$yaml = $serializer->serialize($book);

$serializer = new Serializer(new JsonEncoder());
$json = $serializer->serialize($book);

$serializer = new Serializer(new XmlEncoder());
$xml = $serializer->serialize($book);