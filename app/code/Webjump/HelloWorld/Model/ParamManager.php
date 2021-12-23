<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model;

use Magento\Framework\App\RequestInterface;
use Webjump\HelloWorld\Api\MessageManagerInterface;
use Webjump\HelloWorld\Api\ParamManagerInterface;

/**
 * class ParamManager
 */
class ParamManager implements ParamManagerInterface
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var MessageManagerInterface
     */
    protected $messageManager;

    /**
     * @param RequestInterface $request
     * @param MessageManagerInterface $messageManager
     */
    public function __construct(
        RequestInterface $request,
        MessageManagerInterface $messageManager
    ) {
        $this->request = $request;
        $this->messageManager = $messageManager;
    }

    /**
     * @inheritDoc
     */
    public function processRequest(string $message): MessageManagerInterface
    {
        return $this->messageManager->setMessage(
            'Success Webapi: ' . $message
        );
    }
}
