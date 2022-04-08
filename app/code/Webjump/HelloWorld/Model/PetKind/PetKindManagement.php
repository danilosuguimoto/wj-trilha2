<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\PetKind;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Webjump\HelloWorld\Api\Data\PetKindInterface;
use Webjump\HelloWorld\Api\PetKindManagementInterface;
use Webjump\HelloWorld\Api\PetKindRepositoryInterface;

/**
 * class Pet
 */
class PetKindManagement implements PetKindManagementInterface
{
    /**
     * @var PetKindRepositoryInterface
     */
    private $petKindRepository;

    /**
     * Constructor method
     *
     * @param PetKindRepositoryInterface $petKindRepository
     */
    public function __construct(
        PetKindRepositoryInterface $petKindRepository
    ) {
        $this->petKindRepository = $petKindRepository;
    }

    /**
     * @inheritDoc
     */
    public function savePetKind(PetKindInterface $petKind): PetKindInterface
    {
        if (!$petKind->getName() || !$petKind->getDescription()) {
            throw new LocalizedException(__('Name and description are required attributes.'));
        }

        try {
            return $this->petKindRepository->save($petKind);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('There has been a problem while saving the Pet Kind.'));
        }
    }

    /**
     * @inheritDoc
     */
    public function deletePetKind(int $petKindId): bool
    {
        $petKind = $this->petKindRepository->getById($petKindId);
        try {
            $this->petKindRepository->delete($petKind);
            return true;
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__('There has been a problem while deleting the Pet Kind.'));
        }
    }
}
