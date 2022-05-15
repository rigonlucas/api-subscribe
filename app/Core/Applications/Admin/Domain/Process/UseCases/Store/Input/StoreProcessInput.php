<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Store\Input;


use App\Core\Applications\Admin\Infra\Exceptions\Process\FinishAtInvalidException;
use App\Core\Applications\Admin\Infra\Exceptions\Process\StartAtInvalidException;
use DateTime;

class StoreProcessInput
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly string $tambLink,
        public readonly bool $active,
        public readonly bool $public,
        public readonly string $processTypeId,
        private string|\DateTime $startAt,
        private string|\DateTime $finishAt,
    )
    {
        //verify if date can be mutable
        $this->checkStartDate($startAt);
        $this->checkFinishDate($finishAt);
    }

    private function checkStartDate($date)
    {
        $this->startAt = DateTime::createFromFormat('d/m/Y H:i:s', $date);
        if (!$this->startAt instanceof DateTime) {
            throw new StartAtInvalidException();
        }
    }

    private function checkFinishDate($date)
    {
        $this->finishAt = DateTime::createFromFormat('d/m/Y H:i:s', $date);

        if (!$this->finishAt instanceof DateTime) {
            throw new FinishAtInvalidException();
        }
    }

    /**
     * @return \DateTime|string
     */
    public function getFinishAt(): \DateTime|string
    {
        return $this->finishAt;
    }

    /**
     * @return \DateTime|string
     */
    public function getStartAt(): \DateTime|string
    {
        return $this->startAt;
    }
}
