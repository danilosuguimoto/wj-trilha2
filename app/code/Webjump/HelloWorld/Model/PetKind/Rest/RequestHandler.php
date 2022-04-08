<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\PetKind\Rest;

use Webjump\HelloWorld\Api\Data\PetKindInterface;
use Webjump\HelloWorld\Api\PetKindRepositoryInterface;
use Webjump\HelloWorld\Api\PetKindManagementInterface;
use Webjump\HelloWorld\Model\PetKind\PetKindFactory;
use Webjump\HelloWorld\Model\ResourceModel\PetKind\CollectionFactory as PetKindCollectionFactory;

/**
 * class ParamManager
 */
class RequestHandler
{
    /**
     * @var PetKindManagementInterface
     */
    private $petKindManagement;

    /**
     * @var PetKindFactory
     */
    private $petKindFactory;

    /**
     * @var PetKindRepositoryInterface
     */
    private $petKindRepository;

    /**
     * @var PetKindCollectionFactory
     */
    private $petKindCollectionFactory;

    /**
     * @param PetKindManagementInterface $petKindManagement
     * @param PetKindFactory $petKindFactory
     * @param PetKindRepositoryInterface $petKindRepository
     * @param PetKindCollectionFactory $petKindCollectionFactory
     */
    public function __construct(
        PetKindManagementInterface $petKindManagement,
        PetKindFactory $petKindFactory,
        PetKindRepositoryInterface $petKindRepository,
        PetKindCollectionFactory $petKindCollectionFactory
    ) {
        $this->petKindManagement = $petKindManagement;
        $this->petKindFactory = $petKindFactory;
        $this->petKindRepository = $petKindRepository;
        $this->petKindCollectionFactory = $petKindCollectionFactory;
    }

    /**
     * Saves a Pet Kind instance
     *
     * @param string $name
     * @param string $description
     * @param int|null $id
     * @return array
     */
    public function savePetKind(
        string $name,
        string $description,
        int $id = null
    ): array {
        $message = 'Pet Kind successfully saved';
        $id ? $petKind = $this->petKindRepository->getById($id) : $petKind = $this->petKindFactory->create();
        $petKind
            ->setName($name)
            ->setDescription($description);

        try {
            $this->petKindManagement->savePetKind($petKind);
        } catch (\Exception $e) {
            $message = 'There has been an error while saving the Pet Kind';
        }

        return [[
            'message' => $message,
            'petkind_info' => [
                'id' => $petKind->getKindId(),
                'name' => $petKind->getName(),
                'description' => $petKind->getDescription()
            ]
        ]];
    }

    /**
     * Deletes a Pet Kind instance
     *
     * @param int $id
     * @return array
     */
    public function deletePetKind(int $id): array
    {
        $message = 'Pet Kind successfully deleted';
        try {
            $this->petKindManagement->deletePetKind($id);
        } catch (\Exception $e) {
            $message = 'There has been an error while deleting the Pet Kind';
        }

        return [[
            'message' => $message,
            'deleted_id' => $id
        ]];
    }

    /**
     * Lists all Pet Kinds saved in the database
     *
     * @return array
     */
    public function getAllPetKinds(): array
    {
        $petKinds = $this->petKindCollectionFactory->create()->getItems();
        $petKindsList = [];
        /** @var PetKindInterface $petKind */
        foreach ($petKinds as $petKind) {
            $petKindsList[] = [
                'id' => $petKind->getKindId(),
                'name' => $petKind->getName(),
                'description' => $petKind->getDescription()
            ];
        }

        return [[
            'pet_kinds_list' => $petKindsList
        ]];
    }
}
