<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model;

use Webjump\HelloWorld\Api\MessageManagerInterface;

/**
 * class ParamManager
 */
class MessageManager implements MessageManagerInterface
{
    /**
     * @var string
     */
    protected $message;

    /**
     * Getter method for message property
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Setter method for message property
     *
     * @param string $message
     * @return MessageManagerInterface
     */
    public function setMessage(string $message): MessageManagerInterface
    {
        $this->message = $message;
        return $this;
    }
}
