<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */
declare(strict_types=1);

namespace Webjump\HelloWorld\Test\Unit\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Webjump\HelloWorld\Api\Data\PetKindInterface;
use Webjump\HelloWorld\Api\Data\PetKindInterfaceFactory;
use Webjump\HelloWorld\Api\Data\PetKindSearchResultsInterfaceFactory as PetKindSearchResultsFactory;
use Webjump\HelloWorld\Api\PetKindRepositoryInterface;
use Webjump\HelloWorld\Model\ResourceModel\PetKind as ResourcePetKind;
use Webjump\HelloWorld\Model\ResourceModel\PetKind\Collection as PetKindCollectionFactory;

class PetKindRepositoryTest extends TestCase
{
    /**
     * @var PetKindRepositoryInterface
     */
    private $model;

    /**
     * @var ResourcePetKind|MockObject
     */
    private $kindResourceMock;

    /**
     * @var PetKindInterfaceFactory|MockObject
     */
    private $kindFactoryMock;

    /**
     * @var PetKindCollectionFactory|MockObject
     */
    private $kindCollectionMock;

    /**
     * @var PetKindSearchResultsFactory|MockObject
     */
    private $searchResultsFactoryMock;

    /**
     * @var CollectionProcessorInterface|MockObject
     */
    private $collectionProcessorMock;

    /**
     * @var PetKindInterface|MockObject
     */
    private $petKindMock;

    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->kindResourceMock         = $this->createMock(ResourcePetKind::class);
        $this->kindFactoryMock          = $this->createMock(PetKindInterfaceFactory::class);
        $this->kindCollectionMock       = $this->createMock(PetKindCollectionFactory::class);
        $this->searchResultsFactoryMock = $this->createMock(PetKindSearchResultsFactory::class);
        $this->collectionProcessorMock  = $this->createMock(CollectionProcessorInterface::class);
        $this->petKindMock              = $this->createMock(PetKindInterface::class);

        $objectManager = new ObjectManager($this);
        $this->model = $objectManager->getObject(
            PetKindRepositoryInterface::class,
            [
                'petKindResource'          => $this->kindResourceMock,
                'petKindFactory'           => $this->kindFactoryMock,
                'petKindCollectionFactory' => $this->kindCollectionMock,
                'searchResultsFactory'     => $this->searchResultsFactoryMock,
                'collectionProcessor'      => $this->collectionProcessorMock
            ]
        );
    }

    /**
     * @test
     */
    public function testSave(): void
    {
        $this->kindResourceMock
            ->method('save')
            ->with($this->petKindMock)
            ->willReturn($this->petKindMock);

        $result = $this->model->save($this->petKindMock);
        $this->assertEquals($this->petKindMock, $result);
    }
}
