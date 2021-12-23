<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Api;

/**
 * interface ParamManagerInterface
 */
interface ParamManagerInterface
{
    /**
     * @param string $message
     * @return MessageManagerInterface
     */
    public function processRequest(string $message): MessageManagerInterface;
}
