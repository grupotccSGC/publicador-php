<?php

namespace App\Exports;

use App\Models\Midia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class MidiaBOExport implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Midia::all();
    }

    public function headings(): array
    {
        return [
            'ID' ,
            'NOME',
            'TAMANHO',
            'URL',
            'DATA DE ENVIO',
            'EXTENSÃO',   
            'DIMENSÃO',    
            'AUTOR',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'B' => 37,
            'E' => 20,
            'G' => 20,
            'D' => 30,
        ];
    }

}
