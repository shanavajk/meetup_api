<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    public $table = "participants";
    public $primaryKey = "participant_id";
    public $timestamps = false;
}
