<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class YourExcelImport implements ToCollection
{
    protected $data;

    public function collection(Collection $rows)
    {
        $this->data = $rows->toArray();
    }

    public function getData()
    {
        return $this->data;
    }
}
