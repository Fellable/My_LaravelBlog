<?php


namespace App\Logging;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class PostbackSaasLog
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array $config
     * @return Logger
     */
    public function __invoke(array $config)
    {

        $logPath = storage_path("logs/postback_saas/{$config['type']}-" . date('Y-m-d-H-i-s') . '.log');


        $handler = new StreamHandler($logPath);
        $handler->setFormatter(new LineFormatter(null, null, true, true));

        return new Logger('postback_saas_log', [$handler]);
    }
}
