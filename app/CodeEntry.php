<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeEntry extends Model
{
    public function last_sha() {
        #code_entries belongs to approved
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\User');
    }

}
