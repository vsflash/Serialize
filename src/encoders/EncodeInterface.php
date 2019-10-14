<?php


namespace vsflash\Serialize\encoders;


interface EncodeInterface {

    /**
     * Encode data
     * @param array $data
     * @return mixed
     */
    public function encode(array $data);

}
