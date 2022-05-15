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
    public function validationData(){
        foreach ($this->boleanInputs as $item) {
            $input = $this->input($item);
            if (!in_array($input, $this->acceptedBool, true)) {
                $this[$item] = match ($input) {
                    'true', '1' => true,
                    'false', '0' => false,
                    default => null,
                };
            }
        }
        return $this->all();
    }
}
