<?php


namespace vsflash\Serialize\encoders;


interface EncoderInterface
{

    /**
     * Encode data
     * @param array $data
     * @return mixed
     */
    public function encode(array $data);

}
