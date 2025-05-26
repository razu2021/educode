<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;

trait EncryptableTrait
{
    /***  --------  get attribute ------ */

    public function getAttribute($key){

        $value = parent::getAttribute($key);

        if(in_array($key,$this->EncryptableTrait) && !is_null($value)){
           
            try{
                return Crypt::decryptString($value);
            }catch(\Exception $e){
                return $value ;
            }
           
        }

        return $value ;
    }




    /***  --------  get attribute ------ */

    public function setAttribute($key,$value){

        if (in_array($key, $this->EncryptableTrait) && !is_null($value)) {
            $value = Crypt::encryptString($value);
        }
        return parent::setAttribute($key, $value);

    }




}
