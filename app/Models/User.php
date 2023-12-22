<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\EncryptionService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'city',
        'province',
        'region',
        'crm_status',
        'crm_id',
        'crm_sync_errors',
        'cmr_synced_at',
        'password',
        'referrer_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referees()
    {
        return $this->hasMany(User::class, 'referrer_id');
    }

    public function getReferralLinkAttribute()
    {
        $es = new EncryptionService();
        $encryptedId = $es->encrypt($this->id);
        $url = env('APP_URL').'/referee/register/'.$encryptedId;

        return $url;
    }
}
