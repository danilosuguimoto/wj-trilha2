<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

namespace Webjump\HelloWorld\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Pre Order search results interface.
 * @api
 */
interface PetSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get customers list.
     *
     * @return PetInterface[]
     */
    public function getItems(): array;

    /**
     * Set customers list.
     *
     * @param PetInterface[] $items
     * @return PetInterface
     */
    public function setItems(array $items): PetInterface;
}
