<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\ResourceModel\PetKind;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Webjump\HelloWorld\Model\PetKind;
use Webjump\HelloWorld\Model\ResourceModel\PetKind as ResourcePetKind;

/**
 * Collection for Pet entity
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'kind_id';

    /**
     * Defines Collection
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            PetKind::class,
            ResourcePetKind::class
        );
    }
}
