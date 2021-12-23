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
interface PetKindSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get customers list.
     *
     * @return PetKindInterface[]
     */
    public function getItems(): array;

    /**
     * Set customers list.
     *
     * @param PetKindInterface[] $items
     * @return PetKindInterface
     */
    public function setItems(array $items): PetKindInterface;
}
