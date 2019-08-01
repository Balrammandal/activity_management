<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerProfileModel extends Model
{
    protected $table='customer_profile';
    protected $visible = array('customer_id','user_id','name', 'email','phone','address','status');
    protected $fillable = array('customer_id','user_id', 'name', 'email','phone','address','status');
}
