<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

namespace Webjump\HelloWorld\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Webjump\HelloWorld\Api\Data\PetInterface;
use Webjump\HelloWorld\Api\Data\PetSearchResultsInterface;

/**
 * Interface for Pet Repository model.
 * @api
 */
interface PetRepositoryInterface
{
    /**
     * Create or update a pet.
     *
     * @param PetInterface $pet
     * @return PetInterface
     */
    public function save(PetInterface $pet): PetInterface;

    /**
     * Retrieve a pet.
     *
     * @param int $id
     * @return PetInterface
     */
    public function getById(int $id): PetInterface;

    /**
     * Retrieve all pets which match a specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
