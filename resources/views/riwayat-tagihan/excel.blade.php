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
        @foreach($riwayatTagihan as $tl)
        <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{ $tl->pelanggan->nama}}</td>
                <td>{{ $tl->pelanggan->kode}}</td>
                <td>{{ $tl->pemakaian->bulan}}</td>
                <td>{{ $tl->abonemen->level}}</td>
                <td>{{ $tl->harga_per_meter}}</td>
                <td>{{ $tl->pemakaian->meter_awal}}</td>
                <td>{{ $tl->pemakaian->meter_akhir}}</td>
                <td>{{ $tl->jumlah_pakai}}</td>
                <td>{{ $tl->administrasi}}</td>
                <td>{{ $tl->telat}}</td>
                <td>{{ $tl->denda_keterlambatan}}</td>
                <td>{{ $tl->tagihan}}</td>
                <td>{{ $tl->jenis_bayar}}</td>
                <td>{{ $tl->status}}</td>
                
            </tr>
        @endforeach
    </table>