<?php

namespace App\Traits;

trait RequestBoolStringValidation
{
    private array $acceptedBool = [
        0,
        1,
        true,
        false
    ];

    private array $boleanInputs;

    public function validationData(): array
    {
        foreach ($this->rules() as $inputName => $rules) {
            if (in_array('boolean', $rules)) {
                $this->boleanInputs[] = $inputName;
            }
        }

        foreach ($this->boleanInputs as $inputName) {
            $inputValue = $this->input($inputName);
            if (!in_array($inputValue, $this->acceptedBool, true)) {
                $this[$inputName] = match ($inputValue) {
                    'true', '1' => true,
                    'false', '0' => false,
                    default => null,
                };
            }
        }

        return $this->all();
    }
}
