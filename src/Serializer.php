<?php


namespace vsflash\Serialize;


use vsflash\Serialize\encoders\EncoderInterface;

class Serializer
{

    /**
     * @var array
     */
    private $data;

    /**
     * @var EncoderInterface
     */
    private $encoder;

    /**
     * Serializer constructor.
     * @param EncoderInterface $encoder
     */
    public function __construct(EncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * Dismount object to array
     * @param $object
     * @return array
     */
    private function dismount($object)
    {
        $reflectionClass = new \ReflectionClass(get_class($object));
        $array = [];
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($object);
            $property->setAccessible(false);
        }
        return $array;
    }

    /**
     * Serialize data
     * @param $object
     * @return mixed
     */
    public function serialize($object)
    {
        if (!is_object($object)) {
            throw new \InvalidArgumentException(\sprintf('This argument "%s" must be have type Object.', $object));
        } else {
            $this->data = $this->dismount($object);
            return $this->encoder->encode($this->data);
        }
    }
}
