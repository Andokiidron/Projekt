<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{

	public function apartments()
    {
        return $this->HasMany('App\Apartment');
    }

	public function users()
    {
        return $this->BelongsToMany('App\User');
    }
	
}
