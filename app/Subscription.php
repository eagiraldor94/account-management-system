<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
	protected $table = 'subscriptions';
    public function service(){
    	return $this->belongsTo(Service::class);
    }
    public function client(){
    	return $this->belongsTo(Client::class);
    }
}
