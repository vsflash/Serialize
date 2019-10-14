<?php


namespace vsflash\Serialize\encoders;


use Exception;

class JsonEncoder implements EncodeInterface
{
    /**
     * Encode data to JSON
     * @param array $data
     * @return false|mixed|string
     * @throws Exception
     */
    public function encode(array $data)
    {
        $result = \json_encode($data);
        if (!$result) {
            throw new Exception('Could not encode data.');
        }
        return $result;
    }
}
