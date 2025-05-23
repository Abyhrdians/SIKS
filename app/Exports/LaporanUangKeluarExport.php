<?php

namespace App\Exports;

use App\Models\Transaksi_uang;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    ShouldAutoSize,
    WithEvents,
};
use Maatwebsite\Excel\Events\AfterSheet;

class LaporanUangKeluarExport implements FromCollection,WithHeadings, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $tglAwal;
    protected $tglAkhir;

    public function __construct(string $tglAwal, string $tglAkhir)
    {
        $this->tglAwal = $tglAwal;
        $this->tglAkhir = $tglAkhir;
    }

    public function collection()
    {
        $data = Transaksi_uang::with('kategori','user')
            ->where('jenis', 0)
            ->when($this->tglAwal && $this->tglAkhir, fn($q) =>
                $q->whereBetween('tanggal', [$this->tglAwal, $this->tglAkhir])
            )
            ->get()
            ->map(function($row, $i) {
                return [
                    $i + 1,
                    $row->kode_transaksi,
                    $row->kategori->nama_kategori ?? '-',
                    $row->nama_transaksi,
                    $row->jumlah,
                    $row->tanggal,
                    $row->keterangan,
                    $row->user->name ?? '-',
                ];
            });
        return $data;
    }

    public function headings(): array
    {
        return [
            ['Laporan Uang Keluar'],
            ["Periode: {$this->tglAwal} - {$this->tglAkhir}"],
            ['No', 'Kode Transaksi', 'Kategori', 'Nama Transaksi', 'Jumlah', 'Tanggal', 'Keterangan', 'Diinput Oleh']
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                $sheet->mergeCells('A1:H1');
                $sheet->mergeCells('A2:H2');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                    ],
                ]);
                $sheet->getStyle('A2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                    ],
                ]);
                $sheet->getStyle('A3:H3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => 'FFD9D9D9'],
                    ],
                ]);
                foreach(range('A','H') as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }
                $lastRow = $sheet->getHighestRow();
                $sheet->getStyle('A3:H'.$lastRow)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
