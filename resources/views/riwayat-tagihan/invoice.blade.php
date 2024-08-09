<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Invoice</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
     <h1>INVOICE</h1>
     <span>tgl : {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y H:i:s') }}</span>
     <table>
          <tr>
               <td>Nama Pelanggan</td>
               <td>:</td>
               <td>{{ $invoice->pelanggan->nama }}</td>
               <td>Abonemen</td>
               <td>:</td>
               <td class="text-end">{{ $invoice->abonemen->level }}</td>
          </tr>
          <tr>
               <td>Kode Pelanggan</td>
               <td>:</td>
               <td>{{ $invoice->pelanggan->kode }}</td>
               <td>Harga per M3</td>
               <td>: Rp</td>
               <td class="text-end">{{ number_format($invoice->harga_per_meter, 0, ',', '.') }}</td>
          </tr>
          <tr>
               <td>Periode</td>
               <td>:</td>
               <td>{{ \Carbon\Carbon::parse($invoice->pemakaian->bulan)->translatedFormat('F Y') }}</td>
               <td>Biaya Administrasi</td>
               <td>: Rp</td>
               <td class="text-end">{{ number_format($invoice->administrasi, 0, ',', '.') }}</td>
          </tr>
          <tr>
               <td>Meter Lalu</td>
               <td>:</td>
               <td>{{ $invoice->pemakaian->meter_awal }}</td>
               <td>Keterlambatan</td>
               <td>:</td>
               <td class="text-end">{{ $invoice->telat }}</td>
          </tr>
          <tr>
               <td>Meter Kini</td>
               <td>:</td>
               <td>{{ $invoice->pemakaian->meter_akhir }}</td>
               <td>Denda Keterlambatan</td>
               <td>: Rp</td>
               <td class="text-end">{{ number_format($invoice->denda_keterlambatan, 0, ',', '.') }}</td>
          </tr>
          <tr>
               <td>Jumlah Pemakaian</td>
               <td>:</td>
               <td>{{ $invoice->jumlah_pakai }}</td>
               <td>Tagihan Air</td>
               <td>: Rp</td>
               <td class="text-end">{{ number_format($invoice->jumlah_pakai * $invoice->harga_per_meter, 0, ',', '.') }}</td>
          </tr>
          <tr style="background-color: lime;">
               <td colspan="4"><b>Total Tagihan</b></td>
               <td>: RP</td>
               <td class="text-end"><b>{{ number_format($invoice->tagihan, 0, ',', '.') }}</b></td>
          </tr>
     </table>


     <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>