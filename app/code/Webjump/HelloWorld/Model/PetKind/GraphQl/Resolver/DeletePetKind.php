<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\PetKind\GraphQl\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Webjump\HelloWorld\Api\PetKindManagementInterface;

class DeletePetKind implements ResolverInterface
{
    /**
     * @var PetKindManagementInterface
     */
    private $petKindManagement;

    /**
     * @param PetKindManagementInterface $petKindManagement
     */
    public function __construct(
        PetKindManagementInterface $petKindManagement
    ) {
        $this->petKindManagement = $petKindManagement;
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
        $success = true;

        try {
            $this->petKindManagement->deletePetKind($args['id']);
        } catch (\Exception $e) {
            $success = false;
        }

        return [
            'success' => $success,
            'id' => $args['id']
        ];
    }
}
