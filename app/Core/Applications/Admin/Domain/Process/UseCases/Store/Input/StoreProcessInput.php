<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Store\Input;

use App\Core\Applications\Admin\Domain\Process\Validations\ProcessStringDateValidation;
use App\Core\Applications\Admin\Infra\Exceptions\Process\FinishAtInvalidException;
use App\Core\Applications\Admin\Infra\Exceptions\Process\StartAtInvalidException;
use DateTime;
use Exception;

class StoreProcessInput extends ProcessStringDateValidation
{

    /**
     * @throws StartAtInvalidException
     * @throws FinishAtInvalidException
     */
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly string $tambLink,
        public readonly bool $active,
        public readonly bool $public,
        public readonly string $processTypeId,
        protected mixed $startAt,
        protected mixed $finishAt,
    )
    {
        $this->validateProcessDate();
    }


    /**
     * @return DateTime|null
     */
    public function getFinishAt(): ?DateTime
    {
        return $this->finishAt;
    }

    /**
     * @return DateTime|null
     */
    public function getStartAt(): ?DateTime
    {
        return $this->startAt;
    }
}
