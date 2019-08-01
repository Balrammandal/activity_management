<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ActivityModel extends Model
{
    protected $table='activity';
    protected $visible = array('activity_id', 'user_id', 'customer_id','activity_type','time','description','next_act_desc','next_act_time');
    protected $fillable = array('activity_id', 'user_id', 'customer_id','activity_type','time','description','next_act_desc','next_act_time');
}
