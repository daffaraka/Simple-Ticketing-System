<?php

namespace App\Exports;

use App\Models\Pemesanan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

// use Maatwebsite\Excel\Concerns\FromQuery;

class PemesananExport implements WithMapping, WithHeadings,FromCollection

{
    use Exportable;
    private $pemesanan;

    public function __construct(Pemesanan $pemesanan)
    {
        $this->Pemesanan = $pemesanan;
    }

    

    public function collection()
    {
       return Pemesanan::all();
    }

    public function map($pemesanan): array
    {
        $i = 1;
        return [
          $i++,
          $pemesanan->nama_pengunjung,
          $pemesanan->email_pengunjung,
          $pemesanan->nomor_pengunjung,
          $pemesanan->jumlah_ticket,
          'Rp.'.number_format($pemesanan->total),
          $pemesanan->Ticket->ticket_name,
          $pemesanan->TicketCategory->ticket_category,
          $pemesanan->User->name,
          $pemesanan->status,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Pengunjung',
            'Email Pengunjung',
            'Nomor Hp Pengunjung',
            'Jumlah Tiket',
            'Total',
            'Ticket Name',
            'Ticket Category',
            'User',
            'Status',
        ];
    }
}
