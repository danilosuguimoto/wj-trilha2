<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\PetKind;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Webjump\HelloWorld\Api\Data\PetKindInterface;
use Webjump\HelloWorld\Api\Data\PetKindInterfaceFactory as PetKindFactory;
use Webjump\HelloWorld\Api\Data\PetKindSearchResultsInterfaceFactory as PetKindSearchResultsFactory;
use Webjump\HelloWorld\Api\PetKindRepositoryInterface;
use Webjump\HelloWorld\Model\ResourceModel\PetKind as ResourcePetKind;
use Webjump\HelloWorld\Model\ResourceModel\PetKind\CollectionFactory as PetKindCollectionFactory;

/**
 * Repository Model for saving into Pet entity table
 */
class PetKindRepository implements PetKindRepositoryInterface
{
    /**
     * @var ResourcePetKind
     */
    protected $petKindResource;

    /**
     * @var PetKindFactory
     */
    protected $petKindFactory;

    /**
     * @var PetKindCollectionFactory
     */
    protected $petKindCollectionFactory;

    /**
     * @var PetKindSearchResultsFactory
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @param ResourcePetKind $petKindResource
     * @param PetKindFactory $petKindFactory
     * @param PetKindCollectionFactory $petKindCollectionFactory
     * @param PetKindSearchResultsFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourcePetKind $petKindResource,
        PetKindFactory $petKindFactory,
        PetKindCollectionFactory $petKindCollectionFactory,
        PetKindSearchResultsFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->petKindResource          = $petKindResource;
        $this->petKindFactory           = $petKindFactory;
        $this->petKindCollectionFactory = $petKindCollectionFactory;
        $this->searchResultsFactory     = $searchResultsFactory;
        $this->collectionProcessor      = $collectionProcessor;
    }

    /**
     * @inheritdoc
     */
    public function save(PetKindInterface $petKind): PetKindInterface
    {
        try {
            $this->petKindResource->save($petKind);
            return $petKind;
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
    }

    /**
     * @inheritdoc
     */
    public function delete(PetKindInterface $petKind): bool
    {
        try {
            $this->petKindResource->delete($petKind);
            return true;
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }
    }

    /**
     * @inheritdoc
     */
    public function getById(int $id): PetKindInterface
    {
        $petKind = $this->petKindFactory->create();
        $this->petKindResource->load($petKind, $id, 'kind_id');
        return $petKind;
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->petKindCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $collection->load();
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }
}
