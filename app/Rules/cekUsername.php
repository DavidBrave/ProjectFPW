<?php

namespace App\Rules;

use App\Admin;
use App\Guru;
use App\Murid;
use Illuminate\Contracts\Validation\Rule;

class cekUsername implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $username;

    public function __construct($username)
    {
        $this->username = $username;
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
        $dataAdmin = Admin::where("Admin_Username", $value)->where("Admin_Username", "<>", $this->username)->get();
        $dataGuru = Guru::where("Guru_Username", $value)->where("Guru_Username", "<>", $this->username)->get();
        $dataMurid = Murid::where("Murid_Username", $value)->where("Murid_Username", "<>", $this->username)->get();
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
