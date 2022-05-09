<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentValue extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'value'
    ];
}
