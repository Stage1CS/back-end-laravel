<?php

namespace App\Exports;

use App\Models\magasin;
use Maatwebsite\Excel\Concerns\FromCollection;

class magasinExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return magasin::all();
    }
}
