<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessPayment extends Model
{
    use HasFactory;
    use Uuids;

    public $timestamps = false;
}
