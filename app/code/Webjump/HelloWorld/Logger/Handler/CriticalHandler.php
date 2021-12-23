<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

namespace Webjump\HelloWorld\Logger\Handler;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

/**
 * Class CriticalHandler
 */
class CriticalHandler extends Base
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
