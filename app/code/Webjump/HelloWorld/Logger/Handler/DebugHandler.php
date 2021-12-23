<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

namespace Webjump\HelloWorld\Logger\Handler;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

/**
 * Class DebugHandler
 */
class DebugHandler extends Base
{
    /**
     * Logging level
     *
     * @var int
     */
    protected $loggerType = Logger::DEBUG;

    /**
     * File name
     *
     * @var string
     */
    protected $fileName = '/var/log/custom-debug.log';
}
