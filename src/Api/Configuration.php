<?php

namespace Aa\AkeneoDataLoader\Api;

class Configuration
{

    /**
     * @var string
     */
    private $uploadDir;

    /**
     * @var int
     */
    private $upsertBatchSize;

    private function __construct(string $uploadDir, int $upsertBatchSize)
    {
        $this->uploadDir = $uploadDir;
        $this->upsertBatchSize = $upsertBatchSize;
    }

    public static function create(string $uploadDir, int $upsertBatchSize)
    {
        return new static($uploadDir, $upsertBatchSize);
    }

    public function getUploadDir(): string
    {
        return $this->uploadDir;
    }

    public function getUpsertBatchSize(): int
    {
        return $this->upsertBatchSize;
    }
}
