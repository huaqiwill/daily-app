<?php

namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;

use think\Db;
use think\Log;


class timedTask extends Command
{
    protected function configure()
    {
        $this->setName("SendMessage")
            ->setDescription("计划任务 SendMessage");
    }

    protected function execute(Input $input, Output $output)
    {
        $output->writeln("Date Crontab job start");

        $this->test();

        $output->writeln("Data Crontab job end");
    }

    public function test()
    {
        Db::name('log')->insert([
            "content" => "定时发起",
            "add_time" => time(),
            "uid" => 1,
            "code" => "1000",
            "title" => "定时任务"
        ]);
//        实现逻辑
    }
}
