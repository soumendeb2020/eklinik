<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patientqueue extends Model {

    protected $fillable = [];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

}
