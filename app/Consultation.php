<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Authorizable;

class Consultation extends Model {

    protected $fillable = [];

    public function Patientqueue() {
        return $this->belongsTo(Patientqueue::class);
    }

}
