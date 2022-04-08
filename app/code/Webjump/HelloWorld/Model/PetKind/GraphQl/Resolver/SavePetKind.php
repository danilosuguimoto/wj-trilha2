<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\PetKind\GraphQl\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Webjump\HelloWorld\Api\PetKindRepositoryInterface;
use Webjump\HelloWorld\Model\PetKind\PetKindFactory;
use Webjump\HelloWorld\Api\PetKindManagementInterface;

class SavePetKind implements ResolverInterface
{
    /**
     * @var PetKindFactory
     */
    private $petKindFactory;

    /**
     * @var PetKindManagementInterface
     */
    private $petKindManagement;

    /**
     * @var PetKindRepositoryInterface
     */
    private $petKindRepository;

    /**
     * @param PetKindFactory $petKindFactory
     * @param PetKindManagementInterface $petKindManagement
     * @param PetKindRepositoryInterface $petKindRepository
     */
    public function __construct(
        PetKindFactory $petKindFactory,
        PetKindManagementInterface $petKindManagement,
        PetKindRepositoryInterface $petKindRepository
    ) {
        $this->petKindFactory = $petKindFactory;
        $this->petKindManagement = $petKindManagement;
        $this->petKindRepository = $petKindRepository;
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
        $input = $args['input'];
        array_key_exists('id', $input)
            ? $petKind = $this->petKindRepository->getById($input['id'])
            : $petKind = $this->petKindFactory->create();

        $petKind
            ->setName($input['name'])
            ->setDescription($input['description']);

        try {
            $this->petKindManagement->savePetKind($petKind);
        } catch (\Exception $e) {
            $success = false;
        }

        return [
            'success' => $success,
            'id' => $petKind->getKindId(),
            'name' => $petKind->getName(),
            'description' => $petKind->getDescription()
        ];
    }
}
