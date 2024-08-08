<?php

namespace App\Exports;

use App\Models\Tagihan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class RiwayatTagihanExport implements FromView, ShouldAutoSize, WithEvents
{
    public function view(): View
    {
        return view('riwayat-tagihan.excel', [
            'riwayatTagihan' => Tagihan::with('pelanggan','pemakaian','abonemen')->where('status','LUNAS')->orderBy('updated_at', 'desc')->get()
        ]);
    }

    public function registerEvents(): array
    {
        $jmlData = Tagihan::with('pelanggan','pemakaian','abonemen')->where('status','LUNAS')->orderBy('updated_at', 'desc')->count() + 1;
        return [
            AfterSheet::class    => function (AfterSheet $event) use ($jmlData) {
                $cellRange = 'A1:O1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(10)->setBold(true);

                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->setStartColor(new \PhpOffice\PhpSpreadsheet\Style\Color('ADFF2F'));

                $event->sheet->getStyle('A1:O' . $jmlData)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
