<?php

namespace App\Exports;

use App\Models\MedicalRecord;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class MedicalCheckupExport implements FromQuery, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function __construct(string $dateExport)
    {
        $this->dateExport = $dateExport;
    }

    public function headings(): array
    {
        return [
            '#',
            'Patient Name',
            'No',
            'Tanggal Rekam Medis',
            'Komplain',
            'Diagnosa',
            'Aksi',
            'Obat',
            'Darah Sys',
            'Darah Dia',
            'Terapis',
            'Tanggal Di Buat',
            'Tanggal Di Update',
            'Tanggal Di Delete',
            'Total Pembayaran',
            'Total Pembayaran Terapis',
            'Total Pembayaran Klinik',
            'Total Pembayaran Herbal',
            'Extra Komplain',
            'Warna Kencing',
            'Keseringan Kencing',
            'Detail BAB',
            'Frequensi BAB',
            'Suka Minuman',
            'Berat',
            'Tinggi',
        ];
    }

    public function query()
    {
        return MedicalRecord::query()->whereDate('created_at', Carbon::today());
    }

    public function prepareRows($rows)
    {
        return $rows->transform(function ($user) {
            $user->patient_id = $user->patient->name;

            return $user;
        });
    }
}
