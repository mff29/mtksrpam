<table>
     <tr>
         <th>Nomor</th>
         <th>Nama Pelanggan</th>
         <th>Bulan</th>
         <th>Meter Awal</th>
         <th>Meter Akhir</th>
         <th>Jumlah Pakai</th>
         <th>Status Pembayaran</th>
     </tr>
     @foreach($pemakaian->sortBy('bulan') as $p)
         <tr>
             <td>{{$loop->iteration }}</td>
             <td>{{ $p->pelanggan->nama}}</td>
             <td>{{ $p->bulan}}</td>
             <td>{{ $p->meter_awal}}</td>
             <td>{{ $p->meter_akhir}}</td>
             <td>{{ $p->pakai}}</td>
             <td>{{ $p->status}}</td>
         </tr>
     @endforeach
 </table>