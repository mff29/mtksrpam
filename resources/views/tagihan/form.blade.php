<div class="form-group">
    {!! Form::label('pelanggan_id', 'Pelanggan') !!}
    <div class="col-sm-4">
        {!! Form::select('pelanggan_id', $pelanggans->pluck('nama', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Pelanggan', 'id' => 'pelanggan_id']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('pemakaian_id', 'Pemakaian') !!}
    <div class="col-sm-4">
        {!! Form::select('pemakaian_id', [], null, ['class' => 'form-control', 'placeholder' => 'Select Pemakaian', 'id' => 'pemakaian_id']) !!}
        @error('pemakaian_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('abonemen_id', 'Abonemen') !!}
    <div class="col-sm-4">
        {!! Form::select('abonemen_id', $abonemens->pluck('level', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Abonemen', 'id' => 'abonemen_id']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('harga_per_meter', 'Harga Per Meter') !!}
    <div class="col-sm-4">
        {!! Form::number('harga_per_meter', null, ['class' => 'form-control', 'id' => 'harga_per_meter', 'readonly']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('jumlah_pakai', 'Jumlah Pakai') !!}
    <div class="col-sm-4">
        {!! Form::number('jumlah_pakai', null, ['class' => 'form-control', 'id' => 'jumlah_pakai', 'readonly']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tagihan', 'Tagihan') !!}
    <div class="col-sm-4">
        {!! Form::number('tagihan', null, ['class' => 'form-control', 'id' => 'tagihan', 'readonly']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('jenis_bayar', 'Jenis Bayar') !!}
    <div class="col-sm-4">
        {!! Form::select('jenis_bayar',['Cash'=>'Cash','Transfer'=>'Transfer','QRIS'=>'QRIS','Lainnya'=>'Lainnya'], null, ['class' => 'form-control', 'placeholder'=>'Pilih Pembayaran']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status') !!}
    <div class="col-sm-4">
        {!! Form::select('status', ['Belum Lunas'=>'Belum Lunas','Lunas'=>'Lunas'], null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/tagihan" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
    </div>
</div>