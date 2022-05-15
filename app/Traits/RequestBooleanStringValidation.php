<?php

namespace App\Traits;

trait RequestBooleanStringValidation
{
    public function validationData(){
        foreach ($this->inputsTovalidate as $item) {
            $input = $this->input($item);
            $this[$item] = match ($input) {
                'true' => true,
                'false' => false,
                default => null,
            };
        }
        return $this->all();
    }
}
