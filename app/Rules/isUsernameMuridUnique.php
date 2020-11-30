<?php

namespace App\Rules;

use App\Murid;
use Illuminate\Contracts\Validation\Rule;

class isUsernameMuridUnique implements Rule
{
    public $username;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($f)
    {
        $this->username = $f;
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
        if($value != $this->username){
            $murid = Murid::where("Murid_Username",$value);
            if($murid != null){
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Username sudah dipakai user lain';
    }
}
