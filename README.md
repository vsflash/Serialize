Serialize
===============

This library is designed to serialize objects of different classes into JSON, XML, YAML formats.

Installation
------------

For creating new project based on this template just execute the following command

```
$ composer require vsflash/serialize
```

Usage
-----
```php
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
```

Expanding library
-----
Create NewEncoder in dir src/encoders
```php
namespace vsflash\Serialize\encoders;

class NameEncoder implements EncoderInterface
{
    public function encode(array $data)
    {
        $result = name_encoder($data);
        return $result;
    }
}
```

Copyright (c) 2019, Vadim Selyan
