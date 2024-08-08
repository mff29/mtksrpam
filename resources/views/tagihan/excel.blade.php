<table>
    <tr>
        <th>Nomor</th>
        <th>Nama Pelanggan</th>
        <th>Kode</th>
        <th>Bulan Pemakaian</th>
        <th>Abonemen</th>
        <th>Harga per M3</th>
        <th>Meter Awal</th>
        <th>Meter Akhir</th>
        <th>Jumlah Pakai</th>
        <th>Administrasi</th>
        <th>isTelat</th>
        <th>Denda Keterlambatan</th>
        <th>Total Tagihan</th>
        <th>Payment</th>
        <th>Status</th>
    </tr>
    @foreach($tagihan as $t)
    <tr>
            <td>{{$loop->iteration }}</td>
            <td>{{ $t->pelanggan->nama}}</td>
            <td>{{ $t->pelanggan->kode}}</td>
            <td>{{ $t->pemakaian->bulan}}</td>
            <td>{{ $t->abonemen->level}}</td>
            <td>{{ $t->harga_per_meter}}</td>
            <td>{{ $t->pemakaian->meter_awal}}</td>
            <td>{{ $t->pemakaian->meter_akhir}}</td>
            <td>{{ $t->jumlah_pakai}}</td>
            <td>{{ $t->administrasi}}</td>
            <td>{{ $t->telat}}</td>
            <td>{{ $t->denda_keterlambatan}}</td>
            <td>{{ $t->tagihan}}</td>
            <td>{{ $t->jenis_bayar}}</td>
            <td>{{ $t->status}}</td>
            
        </tr>
    @endforeach
</table>