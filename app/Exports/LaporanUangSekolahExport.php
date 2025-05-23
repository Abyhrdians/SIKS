<?php

namespace App\Exports;

use App\Models\Transaksi_UangSekolah;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    ShouldAutoSize,
    WithEvents,
};
use Maatwebsite\Excel\Events\AfterSheet;
class LaporanUangSekolahExport implements FromCollection,WithHeadings, WithEvents, ShouldAutoSize
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
        $data = Transaksi_UangSekolah::with('kategori','user','siswa')
            ->when($this->tglAwal && $this->tglAkhir, fn($q) =>
                $q->whereBetween('tanggal_bayar', [$this->tglAwal, $this->tglAkhir])
            )
            ->get()
            ->map(function($row, $i) {
                return [
                    $i + 1,
                    $row->kode_transaksi,
                    $row->tanggal_bayar ?? '-',
                    $row->kategori->nama_kategori,
                    $row->nama_pembayaran,
                    $row->jumlah_bayar,
                    $row->siswa->nama_siswa,
                    $row->siswa->kelas,
                    $row->siswa->orangtua->nama_ortu,
                    $row->siswa->orangtua->nomor_telp,
                    $row->keterangan,
                    $row->user->name ?? '-',
                ];
            });
        return $data;
    }

    public function headings(): array
    {
        return [
            ['Laporan Uang Sekolah'],
            ["Periode: {$this->tglAwal} - {$this->tglAkhir}"],
            ['No', 'Kode Transaksi', 'Tanggal', 'Kategori', 'Nama Transaksi', 'Jumlah', 'Nama Siswa', 'Kelas','Nama Orang Tua','No. Telp Orang Tua','Keterangan','Diinput Oleh']
        ];
    }

     public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                $sheet->mergeCells('A1:L1');
                $sheet->mergeCells('A2:L2');
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
                $sheet->getStyle('A3:L3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => 'FFD9D9D9'],
                    ],
                ]);
                foreach(range('A','L') as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }
                $lastRow = $sheet->getHighestRow();
                $sheet->getStyle('A3:L'.$lastRow)->applyFromArray([
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
