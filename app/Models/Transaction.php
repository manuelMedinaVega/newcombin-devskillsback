<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $primaryKey = 'tax_bar_code';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;
}
