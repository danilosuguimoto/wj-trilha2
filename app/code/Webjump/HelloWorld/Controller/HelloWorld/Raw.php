<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Controller\HelloWorld;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Raw as ResultRaw;
use Magento\Framework\Controller\Result\RawFactory;

/**
 * class Raw
 */
class Raw implements HttpGetActionInterface
{
    /**
     * @var RawFactory
     */
    protected $rawFactory;

    /**
     * @param RawFactory $rawFactory
     */
    public function __construct(RawFactory $rawFactory)
    {
        $this->rawFactory = $rawFactory;
    }

    /**
     * @return ResultRaw
     */
    public function execute(): ResultRaw
    {
        return $this->rawFactory->create()->setContents(
            '<p>' . __("I'm a raw page!") . '</p>'
        );
    }
}
