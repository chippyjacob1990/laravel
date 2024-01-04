<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //If needed override the primary key name.
    //protected $primaryKey = "id";
    //In order to use Carbon package related function for a custom_date_field field, 
    // for ex: $user->custom_date_field->format('d M Y'), tell Laravel that it is a date field
    //protected $dates = ['custom_date_field'];
    // Override table ->Instead of user table, check customer table.
    //protected $table = ['customer'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'pincode'
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
    ];
    //https://laravel.com/docs/10.x/eloquent
    // Accessor method 
    // For getting email_verified_at field in a definite format.
    //After fetching the value, changing the value in the same colum.
    /*public function getEmailVerifiedAtAttribute($value) { 
        return date('d M Y', strtotime($value));
    }*/
    //If formating needs to be done in a new field, so the actual field doesnot get formatted always.
    //Appender function. 
    //This formatted data will be available in new column 'email_verified_at_format'
    // and no change for the actual column.
    public function getEmailVerifiedAtFormatAttribute() {  
        return date('d M Y', strtotime($this->email_verified_at));
    }
    // New column status_text with value either Active or Blocked
    //Accessor
    public function getStatusTextAttribute() {  
        if($this->status == 1)
        return "Active";
        else
        return "Blocked";
    }
    protected $appends = ['email_verified_at_format', 'status_text'];

    //Local scope
    public function scopeActive($query) {
        $query->where('status', '1');

    }
    //Relationship - One
    public function address() {
        return $this->hasOne(UserAddress::class, 'user_id', 'id');
    }
}
