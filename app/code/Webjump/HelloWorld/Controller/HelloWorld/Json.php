<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Controller\HelloWorld;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\Json as ResultJson;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\NotFoundException;
use Webjump\HelloWorld\Api\PetRepositoryInterface;

/**
 * class Json
 */
class Json implements HttpGetActionInterface
{
    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var PetRepositoryInterface
     */
    protected $petRepository;

    /**
     * @param JsonFactory $jsonFactory
     * @param RequestInterface $request
     * @param PetRepositoryInterface $petRepository
     */
    public function __construct(
        JsonFactory $jsonFactory,
        RequestInterface $request,
        PetRepositoryInterface $petRepository
    ) {
        $this->jsonFactory   = $jsonFactory;
        $this->request       = $request;
        $this->petRepository = $petRepository;
    }

    /**
     * @return ResultJson
     * @throws NotFoundException
     */
    public function execute(): ResultJson
    {
        $petId = (int) $this->request->getParam('petid');
        try {
            if (!$this->isPetIdValid($petId)) {
                throw new NotFoundException(__('Provided ID is invalid'));
            }

            $pet = $this->petRepository->getById($petId);
            $data = [
                'pet_data' => [
                    'pet_id'      => $pet->getPetId(),
                    'owner_id'    => $pet->getOwnerId(),
                    'pet_name'    => $pet->getPetName(),
                    'pet_owner'   => $pet->getPetOwner(),
                    'owner_phone' => $pet->getOwnerPhone()
                ]
            ];
        } catch (NotFoundException $e) {
            $data = [
                'exception_message' => $e->getMessage()
            ];
        }

        return $this->jsonFactory->create()->setData($data);
    }

    /**
     * Checks wether the given ID is not null and exists in the database
     *
     * @param int $petId
     * @return bool
     */
    public function isPetIdValid(int $petId): bool
    {
        if (!$petId || $petId <= 0 ||
            !$this->petRepository->getById($petId)->getPetId()
        ) {
            return false;
        }
        return true;
    }
}
