<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EncryptableTrait;
class AuthCredentials extends Model
{
    use SoftDeletes;
    use EncryptableTrait;


    protected $EncryptableTrait = [
        'client_id',
        'client_secret',
        'redirect_url',
    ];


    protected $primaryKey = "id";
    protected $guarded=[];


    public function creator() {
        return $this->belongsTo(Admin::class, 'creator_id', 'id');
    }
    
    public function editor() {
        return $this->belongsTo(Admin::class, 'editor_id', 'id');
    }
}
