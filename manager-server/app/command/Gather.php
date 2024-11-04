<?php
declare (strict_types = 1);

namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\facade\Log;

class Gather extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('test')
            ->setDescription('test');
    }

    protected function execute(Input $input, Output $output)
    {
        // 指令输出
        Log::info("start");
        $output->writeln('test');
        Log::info("end");
    }
}
