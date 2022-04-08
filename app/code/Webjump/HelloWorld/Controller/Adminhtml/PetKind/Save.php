<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

namespace Webjump\HelloWorld\Controller\Adminhtml\PetKind;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Webjump\HelloWorld\Api\PetKindManagementInterface;
use Webjump\HelloWorld\Model\PetKind\PetKindFactory;

/**
 * Class Save
 */
class Save extends Action implements HttpPostActionInterface
{
    /**
     * @var RedirectFactory
     */
    protected $redirectFactory;

    /**
     * @var PetKindFactory
     */
    private $petKindFactory;

    /**
     * @var PetKindManagementInterface
     */
    private $petKindManagement;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * Constructor method
     *
     * @param Context $context
     * @param RedirectFactory $redirectFactory
     * @param PetKindFactory $petKindFactory
     * @param PetKindManagementInterface $petKindManagement
     * @param RequestInterface $request
     */
    public function __construct(
        Context $context,
        RedirectFactory $redirectFactory,
        PetKindFactory $petKindFactory,
        PetKindManagementInterface $petKindManagement,
        RequestInterface $request
    ) {
        parent::__construct($context);
        $this->redirectFactory = $redirectFactory;
        $this->petKindFactory = $petKindFactory;
        $this->petKindManagement = $petKindManagement;
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function execute(): Redirect
    {
        $resultRedirect = $this->redirectFactory->create();
        $petKind = $this->petKindFactory->create()
            ->setName($this->request->getParam('pet_kinds')['name'])
            ->setDescription($this->request->getParam('pet_kinds')['description']);

        try {
            $this->petKindManagement->savePetKind($petKind);
            $this->messageManager->addSuccessMessage(__('Pet Kind successfully saved.'));
            return $resultRedirect->setPath('pets/petkind/index');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
            return $resultRedirect->setPath('pets/petkind/index');
        }
    }
}
