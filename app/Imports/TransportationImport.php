<?php

namespace App\Imports;

use App\Models\Transportation;
use Maatwebsite\Excel\Concerns\ToModel;

class TransportationImport implements ToModel
{
    protected $tourId;

    public function __construct($tourId)
    {
        $this->tourId = $tourId;
    }

    public function model(array $row)
    {
        return new Transportation([
            'tour_id' => $this->tourId,
            'vehicle' => $row[0], // pastikan indeks sesuai dengan kolom di file Excel
            'name' => $row[1],
            'group' => $row[2],
            'room_number' => $row[3],
        ]);
    }
}
