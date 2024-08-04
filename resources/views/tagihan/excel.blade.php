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
     @foreach($pemakaian as $p)
         <tr>
             <td>{{$loop->iteration }}</td>
             <td>{{ $p->pelanggan->nama}}</td>
             <td>{{ $p->bulan}}</td>
             <td>{{ $p->tahun}}</td>
             <td>{{ $p->meter_awal}}</td>
             <td>{{ $p->meter_akhir}}</td>
             <td>{{ $p->pakai}}</td>
         </tr>
     @endforeach
 </table>