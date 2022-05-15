<?php

namespace App\Traits;

trait RequestBoolStringValidation
{
    public function validationData(){
        foreach ($this->boleanInputs as $item) {
            $input = $this->input($item);
            if (!is_bool($input)) {
                $this[$item] = match ($input) {
                    'true' => true,
                    'false' => false,
                    default => null,
                };
            }
        }
        return $this->all();
    }
}
