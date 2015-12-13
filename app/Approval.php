<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    public function approved() {
      # Define a one-to-many relationship.
      return $this->hasMany('\App\CodeEntry');
  }
}
