<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Api;

/**
 * interface MessageManagerInterface
 */
interface MessageManagerInterface
{
    /**
     * @return string
     */
    public function getMessage(): string;

    /**
     * @param string $message
     * @return MessageManagerInterface
     */
    public function setMessage(string $message): MessageManagerInterface;
}
