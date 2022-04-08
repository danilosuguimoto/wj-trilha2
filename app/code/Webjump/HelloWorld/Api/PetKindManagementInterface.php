<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Api;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Webjump\HelloWorld\Api\Data\PetKindInterface;

/**
 * Interface for PetKind Management model
 */
interface PetKindManagementInterface
{
    /**
     * Saves an existing Pet Kind / Creates a new Pet Kind
     *
     * @param PetKindInterface $petKind
     * @return PetKindInterface
     * @throws LocalizedException
     * @throws CouldNotSaveException
     */
    public function savePetKind(PetKindInterface $petKind): PetKindInterface;

    /**
     * Delete Pet Kind from database
     *
     * @param int $petKindId
     * @return bool True on success
     * @throws CouldNotDeleteException
     */
    public function deletePetKind(int $petKindId): bool;
}
