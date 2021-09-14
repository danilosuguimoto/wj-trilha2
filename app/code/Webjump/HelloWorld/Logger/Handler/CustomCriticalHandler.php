<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Logger\Handler;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

/**
 * Class CustomCriticalHandler
 */
class CustomCriticalHandler extends Base
{
    /**
     * Logging level
     *
     * @var int
     */
    protected $loggerType = Logger::CRITICAL;

    /**
     * File name
     *
     * @var string
     */
    protected $fileName = '/var/log/custom-critical.log';
}
