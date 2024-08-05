<table>
     <tr>
         <th>Nomor</th>
         <th>Jenis Bank</th>
         <th>Kode Bank</th>
         <th>Nomor Rekening</th>
         <th>Nama Rekening</th>
     </tr>
     @foreach($bank as $b)
         <tr>
             <td>{{$loop->iteration }}</td>
             <td>{{ $b->jenis_bank}}</td>
             <td>{{ $b->kode_bank}}</td>
             <td>{{ $b->nomor_rekening}}</td>
             <td>{{ $b->nama_rekening}}</td>
         </tr>
     @endforeach
 </table>