<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //mutator Password
    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }

    //One to Many Relation
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function scopeAllowed($query){
        //if(auth()->user()->hasRole('Admin')){
        if(auth()->user()->can('view', $this)){
            return $query;
        }

        return $query->where('id', auth()->user()->id);
    }

    public function getRoleDisplayNames(){
        return $this->roles->pluck('display_name')->implode(', ');
    }
}
