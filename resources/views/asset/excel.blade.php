<table>
     <tr>
         <th>Nomor</th>
         <th>Nama</th>
         <th>Kategori</th>
         <th>Harga</th>
         <th>Satuan</th>
         <th>Qty</th>
         <th>Jumlah</th>
         <th>Tgl_Beli</th>
         <th>Keterangan</th>
     </tr>
     @foreach($asset as $a)
         <tr>
             <td>{{$loop->iteration }}</td>
             <td>{{ $a->nama}}</td>
             <td>{{ $a->kategori}}</td>
             <td>{{ $a->harga}}</td>
             <td>{{ $a->satuan}}</td>
             <td>{{ $a->qty}}</td>
             <td>{{ $a->jumlah}}</td>
             <td>{{ $a->tgl_beli}}</td>
             <td>{{ $a->keterangan}}</td>
         </tr>
     @endforeach
 </table>