<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{

	public function apartment()
    {
        return $this->BelongsTo('App\Apartment');
    }
}
