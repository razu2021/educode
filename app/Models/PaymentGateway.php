<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EncryptableTrait;
class PaymentGateway extends Model
{
    use SoftDeletes;
    use EncryptableTrait;


    protected $EncryptableTrait = [
        'api_key',
        'api_secret',
        'client_id',
        'client_secret',
        'webhook_secret',     /**=======   this information is enrypted   ========= */
        'merchant_id',
        'username',
        'password',
        'store_id',
        'store_password',
        'access_token',
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
