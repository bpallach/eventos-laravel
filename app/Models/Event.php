<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'actos';
    protected $primaryKey = 'Id_acto';
    public $timestamps = false;

    public function getJsonEvents()
    {
        $events = Event::all();

        // return json_encode($events, 200);

        return response()->json($events, 200, [], JSON_NUMERIC_CHECK);
    }

}


