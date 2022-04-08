<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\ResourceModel\Pet;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Collection for Pet entity
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'pet_id';

    /**
     * Defines Collection
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Webjump\HelloWorld\Model\Pet\Pet::class,
            \Webjump\HelloWorld\Model\ResourceModel\Pet::class
        );
    }
}
