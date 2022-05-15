<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Store\Input;

use App\Core\Applications\Admin\Infra\Exceptions\Process\FinishAtInvalidException;
use App\Core\Applications\Admin\Infra\Exceptions\Process\StartAtInvalidException;
use App\Core\Support\Conversions\DateTime\DateTimeConversion;
use DateTime;
use Exception;

class StoreProcessInput extends DateTimeConversion
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
        private mixed $startAt,
        private mixed $finishAt,
    )
    {
        $this->startAt = $this->convertStringToDateTime($startAt);
        if ($this->startAt instanceof Exception) {
            throw new StartAtInvalidException();
        }

        $this->finishAt = $this->convertStringToDateTime($finishAt);
        if ($this->finishAt instanceof Exception) {
            throw new FinishAtInvalidException();
        }
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
