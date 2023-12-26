<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserProfile extends Model
{
    use HasFactory;
   
    protected $table = 'user_profile';
    protected $fillable = [
        
        'user_id',
        'mobile',
        'door_no',
        'street',
        'pincode',
        'area',
        'city',
        'state',
        'country',
        'GST',
        
        
    ];

    public function user(){

        return $this->hasMany(User::class);
    }


}
