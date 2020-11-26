<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $table = 'clients';
    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
