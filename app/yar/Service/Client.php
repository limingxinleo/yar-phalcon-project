<?php
// +----------------------------------------------------------------------
// | Client.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Yar\Service;

use Yar_Client;

class Client
{
    protected $config = [];
    protected $clients = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    private function client($name)
    {
        if (isset($this->clients[$name]) && $this->clients[$name] instanceof Yar_Client) {
            return $this->clients[$name];
        }

        $this->clients[$name] = new Yar_Client($this->config[$name]);
        $this->clients[$name]->SetOpt(YAR_OPT_CONNECT_TIMEOUT, 1000);

        return $this->clients[$name];
    }

    public function __get($name)
    {
        if (isset($this->config[$name])) {
            return $this->client($name);
        }
        throw new ClientException();
    }
}