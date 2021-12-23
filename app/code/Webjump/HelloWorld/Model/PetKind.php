<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model;

use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;
use Webjump\HelloWorld\Api\Data\PetKindInterface;
use Webjump\HelloWorld\Model\ResourceModel\PetKind as ResourcePetKind;

/**
 * class Pet
 */
class PetKind extends AbstractModel implements PetKindInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'pet_kind';

    /**
     * Model construct that is used for object initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourcePetKind::class);
    }

    /**
     * @param Context $context
     * @param Registry $registry
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array|null $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection,
            $data
        );
    }

    /**
     * @inheritDoc
     */
    public function getKindId(): int
    {
        return (int) $this->getData(self::KIND_ID);
    }

    /**
     * @inheritDoc
     */
    public function setKindId(int $kindId): PetKindInterface
    {
        $this->setData(self::KIND_ID, $kindId);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getName(): ?string
    {
        return $this->getData(self::KIND_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): PetKindInterface
    {
        $this->setData(self::KIND_NAME, $name);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return $this->getData(self::KIND_DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription(string $description): PetKindInterface
    {
        $this->setData(self::KIND_DESCRIPTION, $description);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt(string $createdAt): PetKindInterface
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt(string $updatedAt): PetKindInterface
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
        return $this;
    }
}
