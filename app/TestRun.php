<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestRun extends Model
{
    public function passed() {
        #code_entries belongs to approved
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\User');
    }
}
