<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\PetKind\GraphQl\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Webjump\HelloWorld\Api\Data\PetKindInterface;
use Webjump\HelloWorld\Model\ResourceModel\PetKind\CollectionFactory as PetKindCollectionFactory;

class PetKindList implements ResolverInterface
{
    /**
     * @var PetKindCollectionFactory
     */
    private $petKindCollectionFactory;

    /**
     * @param PetKindCollectionFactory $petKindCollectionFactory
     */
    public function __construct(
        PetKindCollectionFactory $petKindCollectionFactory
    ) {
        $this->petKindCollectionFactory = $petKindCollectionFactory;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $petKindsList = [];
        $success = true;

        try {
            $petKinds = $this->petKindCollectionFactory->create()->getItems();
            /** @var PetKindInterface $petKind */
            foreach ($petKinds as $petKind) {
                $petKindsList[] = [
                    'id' => $petKind->getKindId(),
                    'name' => $petKind->getName(),
                    'description' => $petKind->getDescription()
                ];
            }
        } catch (\Exception $e) {
            $success = false;
        }

        return [
            'success' => $success,
            'petKindList' => $petKindsList
        ];
    }
}
