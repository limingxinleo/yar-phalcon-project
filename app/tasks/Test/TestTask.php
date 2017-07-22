<?php

namespace App\Tasks\Test;

class TestTask extends \Phalcon\Cli\Task
{

    public function mainAction()
    {
        $res = di('client')->index->version();
        print_r($res);
        $res = di('client')->index->say();
        print_r($res);
    }

}

