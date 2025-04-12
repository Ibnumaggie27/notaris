<?php

namespace App\Exports;

use App\Models\PengajuanAjb;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Events\AfterSheet;

class PengajuanAjbExport implements FromCollection, WithHeadings, WithEvents, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PengajuanAjb::with(['user', 'objekTanah', 'penjual', 'pembeli', 'saksi'])
    ->get()
    ->map(function ($item, $key) {
        return [
            'No' => $key + 1, // Nomor urut dimulai dari 1

            'Nama Pengaju' => $item->user->nama ?? '-',

            // Detail dari Penjual
            'Nama Penjual' => $item->penjual->nama_penjual ?? '-',
            'Nik Penjual' => $item->penjual->nik_penjual ?? '-',
            'Tanggal Lahir Penjual' => $item->penjual->tgl_lahir_penjual ?? '-',
            'Tempat Lahir Penjual' => $item->penjual->tempat_lahir_penjual ?? '-',
            'Nama Istri Penjual' => $item->penjual->nama_istri_penjual ?? '-',
            'Nik Istri Penjual' => $item->penjual->nik_istri_penjual ?? '-',
            'Tanggal Lahir Istri Penjual' => $item->penjual->tgl_lahir_istri_penjual ?? '-',
            'Tempat Lahir Istri Penjual' => $item->penjual->tempat_lahir_istri_penjual ?? '-',
            'Alamat Penjual' => $item->penjual->alamat_penjual ?? '-',

            // Data dari Pembeli
            'Nama Pembeli' => $item->pembeli->nama_pembeli ?? '-',
            'Nik Pembeli' => $item->pembeli->nik_pembeli ?? '-',
            'Tanggal Lahir Pembeli' => $item->pembeli->tgl_lahir_pembeli ?? '-',
            'Tempat Lahir Pembeli' => $item->pembeli->tempat_lahir_pembeli ?? '-',
            'Alamat Pembeli' => $item->pembeli->alamat_pembeli ?? '-',

            // Data Objek Tanah
            'Nomor Hak Bangun' => $item->objekTanah->nomor_hak_bangun ?? '-',
            'Nomor Surat Ukur' => $item->objekTanah->nomor_surat_ukur ?? '-',
            'Nomor NIB' => $item->objekTanah->nomor_nib ?? '-',
            'Pengesahan NIB' => $item->objekTanah->pengesahan_nib ?? '-',
            'Nomor SPP' => $item->objekTanah->nomor_spp ?? '-',
            'Harga Transaksi' => $item->harga_transaksi_tanah ?? '-',
            'Tanggal Pengajuan' => $item->tanggal_pengajuan ?? '-',
            'Provinsi' => $item->objekTanah->provinsi ?? '-',
            'Kota' => $item->objekTanah->kota ?? '-',
            'Kecamatan' => $item->objekTanah->kecamatan ?? '-',
            'Kelurahan' => $item->objekTanah->kelurahan ?? '-',
            'Jalan' => $item->objekTanah->jalan ?? '-',
            'Alamat Lengkap' => $item->objekTanah->alamat_lengkap ?? '-',

            // Data Saksi
            'Nama Saksi' => $item->saksi->nama_saksi ?? '-',
            'Nik Saksi' => $item->saksi->nik_saksi ?? '-',
            'Tanggal Lahir Saksi' => $item->saksi->tgl_lahir_saksi ?? '-',
            'Tempat Lahir Saksi' => $item->saksi->tempat_lahir_saksi ?? '-',
            'Alamat Saksi' => $item->saksi->alamat_saksi ?? '-',
        ];
    });

    }

    
    public function headings(): array
{
    return [
        'No',
        'Nama Pengaju',

        // Penjual
        'Nama Penjual',
        'Nik Penjual',
        'Tanggal Lahir Penjual',
        'Tempat Lahir Penjual',
        'Nama Istri Penjual',
        'Nik Istri Penjual',
        'Tanggal Lahir Istri Penjual',
        'Tempat Lahir Istri Penjual',
        'Alamat Penjual',

        // Pembeli
        'Nama Pembeli',
        'Nik Pembeli',
        'Tanggal Lahir Pembeli',
        'Tempat Lahir Pembeli',
        'Alamat Pembeli',

        // Objek Tanah
        'Nomor Hak Bangun',
        'Nomor Surat Ukur',
        'Nomor NIB',
        'Pengesahan NIB',
        'Nomor SPP',
        'Harga Transaksi',
        'Tanggal Pengajuan',
        'Provinsi',
        'Kota',
        'Kecamatan',
        'Kelurahan',
        'Jalan',
        'Alamat Lengkap',

        // Saksi
        'Nama Saksi',
        'Nik Saksi',
        'Tanggal Lahir Saksi',
        'Tempat Lahir Saksi',
        'Alamat Saksi',
    ];
}

public function styles(Worksheet $sheet)
    {
        return [
            1 => [ // Judul "LAPORAN"
                'font' => ['bold' => true, 'size' => 14],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFFFFF00'], // Kuning terang
                ],
            ],
            2 => [ // Header kedua
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFFFFF00'], // Kuning terang
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Merge judul "LAPORAN" dari kolom A sampai kolom AI
                $lastColumn = 'AI'; // Sesuaikan dengan jumlah kolom
                $sheet->mergeCells("A1:{$lastColumn}1");

                // Auto size kolom
                foreach (range('A', $lastColumn) as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }

                // Border semua data (termasuk header)
                $lastRow = $sheet->getHighestRow();
                $sheet->getStyle("A2:{$lastColumn}{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                    ],
                ]);
            },
        ];
    }
}
