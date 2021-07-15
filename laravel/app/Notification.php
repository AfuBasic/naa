<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = ['updated_at'];

    public static function count($user_id = 0)
    {
    	return Notification::whereIn('user_id', [$user_id, 0])->where(['status' => 'unread'])->count();
    }
}
