<table>
     <tr>
         <th>Nomor</th>
         <th>Level</th>
         <th>Harga</th>
         <th>Administrasi</th>
         <th>Keterlambatan</th>
     </tr>
     @foreach($abonemen as $a)
         <tr>
             <td>{{$loop->iteration }}</td>
             <td>{{ $a->level}}</td>
             <td>{{ $a->harga}}</td>
             <td>{{ $a->administrasi}}</td>
             <td>{{ $a->keterlambatan}}</td>
         </tr>
     @endforeach
 </table>