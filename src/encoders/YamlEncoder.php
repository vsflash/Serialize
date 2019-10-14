<?php


namespace vsflash\Serialize\encoders;

use Symfony\Component\Yaml\Yaml;

class YamlEncoder implements EncodeInterface {

    /**
     * Encode data to YAML
     * @param array $data
     * @return mixed|string
     */
    public function encode(array $data)
    {
        return Yaml::dump($data);
    }
}
