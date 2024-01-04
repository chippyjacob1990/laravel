<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class UserAddress extends Model
{
    use HasFactory;
    use Cachable;

    protected $fillable = [
        'city',
        'street_address',
        'country',
        'country_code',
        'pincode'
    ];
    public $timestamps = false;

    protected $primaryKey = "address_id";
    protected $foreignKey = "user_id";
    protected $table = "user_address";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
