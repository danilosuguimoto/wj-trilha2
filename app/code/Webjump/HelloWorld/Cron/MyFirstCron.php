<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Cron;

use Magento\Framework\Logger\Monolog as Logger;

class MyFirstCron
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function logActivity(): void
    {
        $this->logger->info('Cron is running successfully!');
    }
}
