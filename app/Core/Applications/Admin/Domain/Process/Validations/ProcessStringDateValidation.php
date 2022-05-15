<?php

namespace App\Core\Applications\Admin\Domain\Process\Validations;

use App\Core\Applications\Admin\Infra\Exceptions\Process\FinishAtInvalidException;
use App\Core\Applications\Admin\Infra\Exceptions\Process\StartAtInvalidException;
use App\Core\Support\Conversions\DateTime\DateTimeStringConversion;
use Exception;

class ProcessStringDateValidation extends DateTimeStringConversion
{
    /**
     * @throws StartAtInvalidException
     * @throws FinishAtInvalidException
     */
    public function validateProcessDate()
    {
        $this->startAt = $this->convertStringToDateTime($this->startAt);
        if ($this->startAt instanceof Exception) {
            throw new StartAtInvalidException();
        }

        $this->finishAt = $this->convertStringToDateTime($this->finishAt);
        if ($this->finishAt instanceof Exception) {
            throw new FinishAtInvalidException();
        }
    }
}

