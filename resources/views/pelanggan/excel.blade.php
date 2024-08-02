<table>
     <tr>
         <th>Nomor</th>
         <th>Kode</th>
         <th>Nama</th>
         <th>No HP</th>
         <th>Desa</th>
         <th>RT</th>
         <th>RW</th>
         <th>Status</th>
     </tr>
     @foreach($pelanggan as $p)
         <tr>
             <td>{{$loop->iteration }}</td>
             <td>{{ $p->kode}}</td>
             <td>{{ $p->nama}}</td>
             <td>{{ $p->no_hp}}</td>
             <td>{{ $p->desa}}</td>
             <td>{{ $p->rt}}</td>
             <td>{{ $p->rw }}</td>
             <td>{{ $p->status}}</td>
         </tr>
     @endforeach
 </table>