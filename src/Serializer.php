<?php


namespace vsflash\Serialize;


use vsflash\Serialize\encoders\EncodeInterface;

class Serializer {

    /**
     * @var array
     */
    private $data;

    /**
     * @var EncodeInterface
     */
    private $encoder;

    /**
     * Serializer constructor.
     * @param $object
     * @param EncodeInterface $encoder
     */
    public function __construct($object, EncodeInterface $encoder)
    {
        if (!is_object($object)) {
            throw new \InvalidArgumentException(\sprintf('This argument "%s" must be have type Object.', $object));
        } else {
            $this->data = $this->dismount($object);
            $this->encoder = $encoder;
        }
    }

    /**
     * Dismount object to array
     * @param $object
     * @return array
     */
    private function dismount($object)
    {
        $reflectionClass = new \ReflectionClass(get_class($object));
        $array = array();
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($object);
            $property->setAccessible(false);
        }
        return $array;
    }

    /**
     * Serialize data
     * @return false|mixed|string
     */
    public function serialize()
    {
        return $this->encoder->encode($this->data);
    }
}
