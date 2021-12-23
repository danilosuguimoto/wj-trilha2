<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto.
 */

namespace Webjump\HelloWorld\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Webjump\HelloWorld\Api\Data\PetInterfaceFactory;
use Webjump\HelloWorld\Api\PetRepositoryInterface;

class MyFirstDataPatch implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var PetInterfaceFactory
     */
    private $petFactory;

    /**
     * @var PetRepositoryInterface
     */
    private $petRepository;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param PetInterfaceFactory $petFactory
     * @param PetRepositoryInterface $petRepository
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        PetInterfaceFactory $petFactory,
        PetRepositoryInterface $petRepository
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->petFactory      = $petFactory;
        $this->petRepository   = $petRepository;
    }


    /**
     * @inheritdoc
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getAliases(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        try {
            $this->savePetsData($this->getPetsData());
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        $this->moduleDataSetup->getConnection()->endSetup();

        return $this;
    }

    /**
     * Will set and save Pet entity data
     *
     * @param array $petsData
     */
    public function savePetsData(array $petsData): void
    {
        foreach ($petsData as $petData) {
            $pet = $this->petFactory->create()
                ->setOwnerId($petData['owner_id'])
                ->setPetName($petData['pet_name'])
                ->setPetOwner($petData['pet_owner'])
                ->setOwnerPhone($petData['owner_phone']);

            $this->petRepository->save($pet);
        }
    }

    /**
     * Returns the specified Pet data to be saved
     *
     * @return array
     */
    public function getPetsData(): array
    {
        return [
            [
                'owner_id' => 1,
                'pet_name' => 'Bob',
                'pet_owner' => 'Danilo',
                'owner_phone' => '(11) 93932-0773'
            ],
            [
                'owner_id' => 2,
                'pet_name' => 'Alvin',
                'pet_owner' => 'Renan',
                'owner_phone' => '(11) 91234-0884'
            ],
            [
                'owner_id' => 3,
                'pet_name' => 'Maggie',
                'pet_owner' => 'Janes',
                'owner_phone' => '(11) 98888-1223'
            ],
            [
                'owner_id' => 4,
                'pet_name' => 'Shiro',
                'pet_owner' => 'Plínio',
                'owner_phone' => '(11) 94321-9882'
            ]
        ];
    }
}
