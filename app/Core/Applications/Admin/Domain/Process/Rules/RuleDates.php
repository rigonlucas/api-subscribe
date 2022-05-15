<?php

namespace App\Core\Applications\Admin\Domain\Process\Rules;

use JetBrains\PhpStorm\Pure;

trait RuleDates
{
    private array $validSceneries = [
        0 => [
            'start' => "object",
            'finish' => "NULL"
        ],
        2 => [
            'start' => "object",
            'finish' => "object"
        ],
    ];

    #[Pure] protected function applyDateRangeRule (): bool
    {
        foreach ($this->validSceneries as $validScenery) {
            if ($this->isDateStartValid($validScenery['start']) && $this->isDateFinishValid($validScenery['finish'])) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $start
     * @return bool
     */
    protected function isDateStartValid($start): bool
    {
        return gettype($this->startAt) == $start;
    }

    /**
     * @param $finish
     * @return bool
     */
    protected function isDateFinishValid($finish): bool
    {
        return gettype($this->finishAt) == $finish;
    }
}
