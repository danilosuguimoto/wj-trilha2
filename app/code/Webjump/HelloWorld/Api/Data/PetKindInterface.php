<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Api\Data;

/**
 * Interface for PetKind model
 */
interface PetKindInterface
{
    const KIND_ID = 'kind_id';
    const KIND_NAME = 'name';
    const KIND_DESCRIPTION = 'description';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * @return int
     */
    public function getKindId(): int;

    /**
     * @param int $kindId
     * @return PetKindInterface
     */
    public function setKindId(int $kindId): PetKindInterface;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string $name
     * @return PetKindInterface
     */
    public function setName(string $name): PetKindInterface;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * @param string $description
     * @return PetKindInterface
     */
    public function setDescription(string $description): PetKindInterface;

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * @param string $createdAt
     * @return PetKindInterface
     */
    public function setCreatedAt(string $createdAt): PetKindInterface;

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * @param string $updatedAt
     * @return PetKindInterface
     */
    public function setUpdatedAt(string $updatedAt): PetKindInterface;
}
