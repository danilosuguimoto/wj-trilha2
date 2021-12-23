<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Controller\HelloWorld;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Redirect as ResultRedirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface as MessageManager;

/**
 * class Redirect
 */
class Redirect implements HttpGetActionInterface
{
    /**
     * @var RedirectFactory
     */
    protected $redirectFactory;

    /**
     * @var MessageManager
     */
    protected $messageManager;

    /**
     * @param RedirectFactory $redirectFactory
     * @param MessageManager $messageManager
     */
    public function __construct(
        RedirectFactory $redirectFactory,
        MessageManager $messageManager
    ) {
        $this->redirectFactory = $redirectFactory;
        $this->messageManager  = $messageManager;
    }

    /**
     * @return ResultRedirect
     */
    public function execute(): ResultRedirect
    {
        $this->messageManager->addSuccessMessage(__('You have been successfully redirected!'));
        return $this->redirectFactory->create()->setUrl('/helloworld/helloworld/page');
    }
}
