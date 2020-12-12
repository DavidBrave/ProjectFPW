<?php

namespace App\Rules;

use App\Admin;
use App\Guru;
use App\Murid;
use App\Pelajaran;
use Illuminate\Contracts\Validation\Rule;

class cekNamaPelajaran implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
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
        $list_nama_pelajaran = Pelajaran::where("Pelajaran_Nama", $value)->where("Pelajaran_Nama", "<>", $this->nama)->get();
        if(count($list_nama_pelajaran) > 0){
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
        return 'Pelajaran Telah Termasuk Dalam Database';
    }
}
