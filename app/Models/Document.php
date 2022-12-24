<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documentacion';
    protected $primaryKey = 'Id_presentacion';
    public $timestamps = false;
}
