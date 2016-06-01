<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{

	public function house()
    {
        return $this->BelongsTo('App\House');
    }

	public function readings()
    {
        return $this->HasMany('App\Reading');
    }
}
