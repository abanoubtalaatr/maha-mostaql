<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function getStatusClassAttribute()
    {
        return $this->is_active == 1 ? 'green' : 'yellow';
    }

    public function getStatusAttribute()
    {
        return $this->is_active == 1 ? 'active' : 'inactive';
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar == 'default_user_avatar.png' ? asset('frontAssets/assets_' . app()->getLocale() . '/imgs/home/logo.svg')
            :
            url('uploads/pics/' . $this->avatar);
    }

    //JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function favoritable()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function isOnline()
    {
        return $this->last_active_at && Carbon::parse($this->last_active_at)->diffInMinutes() < 5;
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    public function requestWithdraws()
    {
        return $this->hasMany(RequestWithdraw::class);
    }
}
