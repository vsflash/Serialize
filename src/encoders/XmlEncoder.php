<?php


namespace vsflash\Serialize\encoders;


use SimpleXMLElement;

class XmlEncoder implements EncodeInterface {

    /**
     * Encode $data to XML
     * @param array $data
     * @return mixed
     */
    public function encode(array $data)
    {
        $xml = new SimpleXMLElement('<rootTag/>');
        $this->createXml($xml, $data);

        return $xml->asXML();
    }

    /**
     * Sending the array to xml, with uses recursion
     * @param SimpleXMLElement $xml
     * @param array $data
     */
    private function createXml(SimpleXMLElement $xml, array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $new_object = $xml->addChild($key);
                $this->createXml($new_object, $value);
            } else {
                // if the key is an integer, it needs text with it to actually work.
                if ($key == (int) $key) {
                    $key = "key_$key";
                }
                $xml->addChild($key, $value);
            }
        }
    }
}
