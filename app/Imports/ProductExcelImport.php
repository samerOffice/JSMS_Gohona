<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Product;

class ProductExcelImport implements ToCollection
{
   
    public function collection(Collection $rows)
    {
        // $this->data = $rows->toArray();
        return $rows;
    }


    // public function model(array $row)
    // {

    //     $column1Value = $row[0];
    //     $column2Value = $row[1];
     
    //     return new Product([
    //         'product_nr' => $column1Value,
    //         'product_details' => $column2Value     
    //     ]);
    // }

    

    
    public function getData()
    {
        return $this->data;
    }
}
