<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;

    protected $table = 'tipo_acto';
    protected $primaryKey = 'Id_tipo_acto';
    public $timestamps = false;
}
