<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Api\Data;

/**
 * Interface for Pet model
 */
interface PetInterface
{
    const PET_ID = 'pet_id';
    const OWNER_ID = 'owner_id';
    const PET_NAME = 'pet_name';
    const PET_OWNER = 'pet_owner';
    const OWNER_PHONE = 'owner_phone';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * @return int
     */
    public function getPetId(): int;

    /**
     * @param int $petId
     * @return PetInterface
     */
    public function setPetId(int $petId): PetInterface;

    /**
     * @return int
     */
    public function getOwnerId(): int;

    /**
     * @param int $ownerId
     * @return PetInterface
     */
    public function setOwnerId(int $ownerId): PetInterface;

    /**
     * @return string|null
     */
    public function getPetName(): ?string;

    /**
     * @param string $petName
     * @return PetInterface
     */
    public function setPetName(string $petName): PetInterface;

    /**
     * @return string|null
     */
    public function getPetOwner(): ?string;

    /**
     * @param string $petOwner
     * @return PetInterface
     */
    public function setPetOwner(string $petOwner): PetInterface;

    /**
     * @return string|null
     */
    public function getOwnerPhone(): ?string;

    /**
     * @param string $ownerPhone
     * @return PetInterface
     */
    public function setOwnerPhone(string $ownerPhone): PetInterface;

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * @param string $createdAt
     * @return PetInterface
     */
    public function setCreatedAt(string $createdAt): PetInterface;

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * @param string $updatedAt
     * @return PetInterface
     */
    public function setUpdatedAt(string $updatedAt): PetInterface;
}
