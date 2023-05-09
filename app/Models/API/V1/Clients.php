<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    public $table = "clients";
    protected $primaryKey = 'CLIENTE';
    public $timestamps = false;
}
