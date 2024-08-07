<div class="form-group">
    <label class="col-sm-2 control-label">Nama Pelanggan</label>
    <div class="col-sm-4">
        {!! Form::select('pelanggan_id', $pelanggans->pluck('nama', 'id'), null, ['class' => 'form-control select2', 'placeholder' => 'Select Pelanggan', 'id' => 'pelanggan_id']) !!}
    </div>
    @error('pelanggan_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('pemakaian_id', 'Pemakaian',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::select('pemakaian_id', $pemakaians->pluck('bulan', 'id'), old('pemakaian_id', $tagihan->pemakaian_id ?? ''), ['class' => 'form-control select2' . ($errors->has('pemakaian_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Pemakaian']) !!}
        @error('pemakaian_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('abonemen_id', 'Abonemen', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::select('abonemen_id', $abonemens->pluck('level', 'id'), old('abonemen_id', $tagihan->abonemen_id ?? ''), ['class' => 'form-control select2' . ($errors->has('abonemen_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Abonemen']) !!}
        @error('abonemen_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('harga_per_meter', 'Harga per Meter', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::number('harga_per_meter', old('harga_per_meter', $tagihan->harga_per_meter ?? ''), ['class' => 'form-control' . ($errors->has('harga_per_meter') ? ' is-invalid' : ''), 'readonly']) !!}
        @error('harga_per_meter')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('jumlah_pakai', 'Jumlah Pakai', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::number('jumlah_pakai', old('jumlah_pakai', $tagihan->jumlah_pakai ?? ''), ['class' => 'form-control' . ($errors->has('jumlah_pakai') ? ' is-invalid' : ''), 'readonly']) !!}
        @error('jumlah_pakai')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('administrasi', 'Administrasi', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::number('administrasi', old('administrasi', $tagihan->administrasi ?? ''), ['class' => 'form-control' . ($errors->has('administrasi') ? ' is-invalid' : ''), 'readonly']) !!}
        @error('administrasi')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="telat" class="col-sm-2 control-label">Keterlambatan</label>
    <div class="col-sm-4">
        {!! Form::select('telat', ['TIDAK' => 'TIDAK', 'TELAT' => 'TELAT'], null, ['class' => 'form-control', 'id' => 'keterlambatan','placeholder'=>'Select keterlambatan']) !!}
    </div>
    @error('telat')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group d-none" id="denda-group">
    <label for="denda_keterlambatan" class="col-sm-2 control-label">Denda</label>
    <div class="col-sm-4">
        {!! Form::number('denda_keterlambatan', null, ['class' => 'form-control', 'id' => 'denda_keterlambatan', 'readonly']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tagihan', 'Tagihan', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::number('tagihan', old('tagihan', $tagihan->tagihan ?? ''), ['class' => 'form-control' . ($errors->has('tagihan') ? ' is-invalid' : ''), 'readonly']) !!}
        @error('tagihan')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('jenis_bayar', 'Jenis Bayar', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::select('jenis_bayar', ['Default' => 'Default', 'Lunas' => 'Lunas', 'Cicilan' => 'Cicilan'], old('jenis_bayar', $tagihan->jenis_bayar ?? ''), ['class' => 'form-control' . ($errors->has('jenis_bayar') ? ' is-invalid' : '')]) !!}
        @error('jenis_bayar')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::select('status', ['PENDING' => 'PENDING', 'LUNAS' => 'LUNAS'], old('status', $tagihan->status ?? ''), ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : '')]) !!}
        @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
        <a href="/tagihan" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
    </div>
</div>
