<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Controller\HelloWorld;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Forward as ResultForward;
use Magento\Framework\Controller\Result\ForwardFactory;

/**
 * class Forward
 */
class Forward implements HttpGetActionInterface
{
    /**
     * @var ForwardFactory
     */
    protected $forwardFactory;

    /**
     * @param ForwardFactory $forwardFactory
     */
    public function __construct(ForwardFactory $forwardFactory) {
        $this->forwardFactory = $forwardFactory;
    }

    /**
     * @return ResultForward
     */
    public function execute(): ResultForward
    {
        return $this->forwardFactory->create()->forward('page');
    }
}
