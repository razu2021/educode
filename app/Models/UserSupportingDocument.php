<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserSupportingDocument extends Model
{
    use SoftDeletes;
    protected $primaryKey = "id";
    protected $guarded=[];

    

    public function userSocial()
    {
        return $this->hasOne(UserSocial::class, 'user_id', 'user_id');
    }

    public function creator() {
        return $this->belongsTo(Admin::class, 'creator_id', 'id');
    }
    
    public function editor() {
        return $this->belongsTo(Admin::class, 'editor_id', 'id');
    }
}
