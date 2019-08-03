<?php

namespace App\Exports;

use App\FormDetails;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormDetails::all();
    }
}
