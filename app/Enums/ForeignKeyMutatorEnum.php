<?php

namespace App\Enums;

use App\Traits\EnumOptions;

enum ForeignKeyMutatorEnum: string
{
    use EnumOptions;

    case ProcessPeople = 'process_person_id';

    /**
     * @throws \Exception
     */
    public static function findByCaseName ($className)
    {
        $exploded = explode("\\", $className);
        $countOfExplode = count($exploded);
        if ($countOfExplode == 0) {
            throw new \Exception('ClassName parameter invalid');
        }

        $className = $exploded[$countOfExplode - 1];

        $arrayOfCases = self::arrayOptions();
        if (!array_key_exists($className, $arrayOfCases)) {
            throw new \Exception('foreign key converter not registered. ');
        }

        return $arrayOfCases[$className];
    }
}
