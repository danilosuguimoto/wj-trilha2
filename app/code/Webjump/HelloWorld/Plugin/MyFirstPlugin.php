<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Plugin;

use Monolog\Logger;
use Magento\Framework\App\Action\Action;

/**
 * Plugin for multiple purposes
 */
class MyFirstPlugin
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(
        Logger $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * @param Action $subject
     * @return null
     */
    public function beforeDispatch(Action $subject)
    {
        $this->logger->debug('I was called before dispatch!');
        return null;
    }

    /**
     * @param Action $subject
     * @param callable $proceed
     * @param ...$args
     * @return mixed
     */
    public function aroundDispatch(Action $subject, callable $proceed, ...$args)
    {
        $this->logger->info('I was called around dispatch!');
        return $proceed(...$args);
    }

    /**
     * @param Action $subject
     * @param $result
     * @return mixed
     */
    public function afterDispatch(Action $subject, $result)
    {
        $this->logger->critical('I was called after dispatch!');
        return $result;
    }
}
