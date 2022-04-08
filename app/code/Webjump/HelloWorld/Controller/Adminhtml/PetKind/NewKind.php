<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

namespace Webjump\HelloWorld\Controller\Adminhtml\PetKind;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class NewKind
 */
class NewKind extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Webjump::petkind_create';

    const MENU_ID = 'Webjump_HelloWorld::pet_kinds';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor method
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Load the page defined in view/adminhtml/layout/pets_petkind_newkind.xml
     *
     * @return Page
     */
    public function execute(): Page
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(static::MENU_ID);
        $resultPage->getConfig()->getTitle()->prepend(__('New Pet Kind'));

        return $resultPage;
    }
}
