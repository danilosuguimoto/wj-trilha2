<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\PetKind;

use Webjump\HelloWorld\Model\ResourceModel\PetKind\CollectionFactory as PetKindCollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\ModifierPoolDataProvider;

/**
 * DataProvider for UI Component form
 */
class DataProvider extends ModifierPoolDataProvider
{
    /**
     * @var array
     */
    private $loadedData = [];

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @param PetKindCollectionFactory $petKindCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        PetKindCollectionFactory $petKindCollectionFactory,
        DataPersistorInterface $dataPersistor,
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data
        );
        $this->collection = $petKindCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData(): array
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        /** @var PetKind $petKind */
        foreach ($items as $petKind) {
            $result['petKind'] = $petKind->getData();
            $result['kind_id'] = $petKind->getId();
            $this->loadedData[$petKind->getId()] = $result;
        }

        $data = $this->dataPersistor->get('pet_kinds');
        if (!empty($data)) {
            $petKind = $this->collection->getNewEmptyItem();
            $petKind->setData($data);
            $this->loadedData[$petKind->getId()] = $petKind->getData();
            $this->dataPersistor->clear('pet_kinds');
        }

        return $this->loadedData;
    }
}
