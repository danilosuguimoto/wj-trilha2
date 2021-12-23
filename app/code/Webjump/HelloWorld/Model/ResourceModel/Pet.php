<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Resource Model for Pet entity
 */
class Pet extends AbstractDb
{
    /**
     * Defines ResourceModel
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('pet_table', 'pet_id');
    }
}
