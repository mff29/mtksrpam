<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Invoice</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
     <!-- IonIcons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
     {{-- DataTables --}}
     <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
     <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>

     <style>
          .bordered-table {
              width: 100%;
              border-collapse: collapse; /* Menghindari double border */
          }
          
          .bordered-table td, .bordered-table th {
              border: 1px solid black;
              padding: 8px;
              text-align: left;
          }
          .text-end {
            text-align: right;
        }
      </style>
</head>
<body>
     <h1>INVOICE</h1>
     <span>tgl : {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y H:i:s') }}</span>
     <table class="bordered-table">
          <tr>
               <td rowspan="2">Logo</td>
               <td>Judul</td>
               <td rowspan="2">Logo</td>
          </tr>
          <tr>
               <td>Alamat dan no hp</td>
          </tr>
     </table>

     <div class="hr">batas</div>

     <table width="100%">
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

     <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>