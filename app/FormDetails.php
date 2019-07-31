<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class FormDetails extends Model
{
    protected $guarded = [];


    public function formBooleans()
    {
        return $this->hasOne('App\FormBoolean', 'form_details_id');
    }
}