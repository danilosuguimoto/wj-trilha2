<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

namespace Webjump\HelloWorld\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Webjump\HelloWorld\Api\Data\PetKindInterface;

/**
 * Interface for Pet Repository model.
 * @api
 */
interface PetKindRepositoryInterface
{
    /**
     * Create or update a pet.
     *
     * @param PetKindInterface $petKind
     * @return PetKindInterface
     */
    public function save(PetKindInterface $petKind): PetKindInterface;

    /**
     * Retrieve a pet.
     *
     * @param int $id
     * @return PetKindInterface
     */
    public function getById(int $id): PetKindInterface;

    /**
     * Retrieve all pets which match a specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
