<?php

namespace App\Rules;

use App\Admin;
use App\Guru;
use App\Murid;
use Illuminate\Contracts\Validation\Rule;

class UsernameAda implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $dataAdmin = Admin::select('*')->where("Admin_Username", $value)->get();
        $dataGuru = Guru::select('*')->where("Guru_Username", $value)->get();
        $dataMurid = Murid::select('*')->where("Murid_Username", $value)->get();
        if(count($dataAdmin)>0 || count($dataGuru)>0 || count($dataMurid) >0){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Username sudah dipakai';
    }
}
