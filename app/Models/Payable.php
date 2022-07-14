<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payable extends Model
{
    use HasFactory;

    protected $table = 'payable';

    protected $primaryKey = 'bar_code';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;
}
