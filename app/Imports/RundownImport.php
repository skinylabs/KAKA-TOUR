<?php

namespace App\Imports;

use App\Models\Rundown;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class RundownImport implements ToModel
{
    protected $tourId;

    public function __construct($tourId)
    {
        $this->tourId = $tourId;
    }

    public function model(array $row)
    {
        return new Rundown([
            'tour_id' => $this->tourId,
            // Konversi serial date ke format Y-m-d
            'activity_date' => Date::excelToDateTimeObject($row[0])->format('Y-m-d'),
            // Konversi serial time ke format H:i:s
            'activity_time' => Date::excelToDateTimeObject($row[1])->format('H:i:s'),
            'location' => $row[2],
            'activity' => $row[3],
        ]);
    }
}
