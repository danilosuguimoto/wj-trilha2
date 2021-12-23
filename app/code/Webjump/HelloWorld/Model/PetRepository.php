<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Webjump\HelloWorld\Api\PetRepositoryInterface;
use Webjump\HelloWorld\Api\Data\PetInterface;
use Webjump\HelloWorld\Api\Data\PetInterfaceFactory as PetFactory;
use Webjump\HelloWorld\Api\Data\PetSearchResultsInterfaceFactory as PetSearchResultsFactory;
use Webjump\HelloWorld\Model\ResourceModel\Pet as ResourcePet;
use Webjump\HelloWorld\Model\ResourceModel\Pet\CollectionFactory as PetCollectionFactory;

/**
 * Repository Model for saving into Pet entity table
 */
class PetRepository implements PetRepositoryInterface
{
    /**
     * @var ResourcePet
     */
    protected $petResource;

    /**
     * @var PetFactory
     */
    protected $petFactory;

    /**
     * @var PetCollectionFactory
     */
    protected $petCollectionFactory;

    /**
     * @var PetSearchResultsFactory
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @param ResourcePet $petResource
     * @param PetFactory $petFactory
     * @param PetCollectionFactory $petCollectionFactory
     * @param PetSearchResultsFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourcePet $petResource,
        PetFactory $petFactory,
        PetCollectionFactory $petCollectionFactory,
        PetSearchResultsFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->petResource          = $petResource;
        $this->petFactory           = $petFactory;
        $this->petCollectionFactory = $petCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor  = $collectionProcessor;
    }

    /**
     * @inheritdoc
     * @throws CouldNotSaveException
     */
    public function save(PetInterface $pet): PetInterface
    {
        try {
            $this->petResource->save($pet);
            return $pet;
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
    }

    /**
     * @inheritdoc
     */
    public function getById($id): PetInterface
    {
        $pet = $this->petFactory->create();
        $this->petResource->load($pet, $id, 'pet_id');
        return $pet;
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->petCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $collection->load();
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }
}
