Serialize
===============

This library is designed to serialize objects of different classes into JSON, XML, YAML formats.

Installation
------------

For creating new project based on this template just execute the following command

```
$ git clone create-project vsflash/serialize project-name
```

Usage
-----

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

$serializer = new Serializer($book, new YamlEncoder());
$yaml = $serializer->serialize();

$serializer = new Serializer($book, new JsonEncoder());
$json = $serializer->serialize();

$serializer = new Serializer($book, new XmlEncoder());
$xml = $serializer->serialize();


Copyright (c) 2019, Vadim Selyan
