<?php

namespace App\Imports;

use App\Models\magasin;
use Maatwebsite\Excel\Concerns\ToModel;

class magasinImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new magasin([
            'id'         => $row['id'],    
            'name'       => $row['name'],
            'detail'     => $row['detail'],
            'geolocation'=> $row['geolocation'], 
            'Phone'      => $row['Phone'], 
            'email'      => $row['email'],
        ]);
    }
}
