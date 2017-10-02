<?php
// +----------------------------------------------------------------------
// | YarClient.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Core\Services;

use App\Yar\Service\Client;
use Phalcon\Config;
use Phalcon\DI\FactoryDefault;

class YarClient implements ServiceProviderInterface
{
    public function register(FactoryDefault $di, Config $config)
    {
        $app = $di->getShared('app');
        $di->setShared('client', function () use ($config, $app) {
            $server = $app->server->toArray();
            return new Client($server);
        });
    }

}