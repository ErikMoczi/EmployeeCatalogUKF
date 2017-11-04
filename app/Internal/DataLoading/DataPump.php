<?php

namespace App\Internal\DataLoading;

/**
 * Class DataPump
 * @package App\Internal\DataLoading
 */
class DataPump
{
    /**
     * @var ApiCommunication
     */
    private $apiCommunication;

    /**
     * DataPump constructor.
     * @param ApiCommunication $apiCommunication
     */
    public function __construct(ApiCommunication $apiCommunication)
    {
        $this->apiCommunication = $apiCommunication;
    }

    /**
     *
     */
    public function delete()
    {

    }

    /**
     *
     */
    public function create()
    {

    }

    /**
     *
     */
    public function update()
    {

    }
}