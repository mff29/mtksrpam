<table>
     <tr>
         <th>Nomor</th>
         <th>Jenis Wallet</th>
         <th>Kode</th>
         <th>Nomor Rekening</th>
         <th>Nama Rekening</th>
     </tr>
     @foreach($wallet as $w)
         <tr>
             <td>{{$loop->iteration }}</td>
             <td>{{ $w->jenis}}</td>
             <td>{{ $w->kode}}</td>
             <td>{{ $w->nomor_rekening}}</td>
             <td>{{ $w->nama_rekening}}</td>
         </tr>
     @endforeach
 </table>