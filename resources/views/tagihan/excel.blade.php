<table>
     <tr>
         <th>Nomor</th>
         <th>Nama Pelanggan</th>
         <th>Bulan</th>
         <th>Tahun</th>
         <th>Meter Awal</th>
         <th>Meter Akhir</th>
         <th>Jumlah Pakai</th>
     </tr>
     @foreach($tagihan as $t)
         <tr>
             <td>{{$loop->iteration }}</td>
             <td>{{ $t->pelanggan->nama}}</td>
             <td>{{ $t->bulan}}</td>
             <td>{{ $t->tahun}}</td>
             <td>{{ $t->meter_awal}}</td>
             <td>{{ $t->meter_akhir}}</td>
             <td>{{ $t->pakai}}</td>
         </tr>
     @endforeach
 </table>