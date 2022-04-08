<?php
/**
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2021 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\Config\Source;

use Webjump\HelloWorld\Api\Data\PetKindInterface;
use Webjump\HelloWorld\Model\ResourceModel\PetKind\CollectionFactory as PetKindCollectionFactory;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class PetKindOptions extends AbstractSource
{
    /**
     * @var PetKindCollectionFactory
     */
    private $petKindCollectionFactory;

    /**
     * GaldermaTerritories constructor
     *
     * @param PetKindCollectionFactory $petKindCollectionFactory
     */
    public function __construct(
        PetKindCollectionFactory $petKindCollectionFactory
    ) {
        $this->petKindCollectionFactory = $petKindCollectionFactory;
    }

    /**
     * Retrieve All options
     *
     * @return array
     */
    public function getAllOptions(): array
    {
        $petKinds = $this->petKindCollectionFactory->create()->getItems();

        /** @var PetKindInterface $petKind */
        foreach ($petKinds as $petKind) {
            $this->_options[] = [
                'label' => $petKind->getName(),
                'value' => (int) $petKind->getKindId()
            ];
        }

        return $this->_options;
    }
}
