<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\Pet;

use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;
use Webjump\HelloWorld\Api\Data\PetInterface;
use Webjump\HelloWorld\Model\ResourceModel\Pet as ResourcePet;

/**
 * class Pet
 */
class Pet extends AbstractModel implements PetInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'pet_table';

    /**
     * Model construct that is used for object initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourcePet::class);
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
    public function getPetId(): int
    {
        return (int) $this->getData(self::PET_ID);
    }

    /**
     * @inheritDoc
     */
    public function setPetId(int $petId): PetInterface
    {
        $this->setData(self::PET_ID, $petId);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOwnerId(): int
    {
        return (int) $this->getData(self::OWNER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setOwnerId(int $ownerId): PetInterface
    {
        $this->setData(self::OWNER_ID, $ownerId);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPetName(): ?string
    {
        return $this->getData(self::PET_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setPetName(string $petName): PetInterface
    {
        $this->setData(self::PET_NAME, $petName);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPetOwner(): ?string
    {
        return $this->getData(self::PET_OWNER);
    }

    /**
     * @inheritDoc
     */
    public function setPetOwner(string $petOwner): PetInterface
    {
        $this->setData(self::PET_OWNER, $petOwner);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOwnerPhone(): ?string
    {
        return $this->getData(self::OWNER_PHONE);
    }

    /**
     * @inheritDoc
     */
    public function setOwnerPhone(string $ownerPhone): PetInterface
    {
        $this->setData(self::OWNER_PHONE, $ownerPhone);
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
    public function setCreatedAt(string $createdAt): PetInterface
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
    public function setUpdatedAt(string $updatedAt): PetInterface
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
        return $this;
    }
}
