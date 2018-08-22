<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function reviews()
	{
		return $this->hasMany('App\Reviews');
	}
	
	public function bankacc()
	{
		return $this->hasMany('App\Bankacc');
	}
	
	public function documents()
	{
		return $this->hasMany('App\Documents');
	}
	
	public function property()
	{
		return $this->hasMany('App\Property');
	}
	
	
	
}
