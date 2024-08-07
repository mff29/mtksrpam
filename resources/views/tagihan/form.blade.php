        {{-- <div class="form-group">
            <label class="col-sm-2 control-label">Nama Pelanggan</label>
            <div class="col-sm-4">
                {!! Form::select('pelanggan_id', $pelanggans->pluck('nama', 'id'), null, ['class' => 'form-control select2', 'placeholder' => 'Select Pelanggan', 'id' => 'pelanggan_id']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Bulan Pemakaian</label>
            <div class="col-sm-4">
                {!! Form::select('pemakaian_id', $pemakaians, null, ['class' => 'form-control', 'placeholder' => 'Select Pemakaian', 'id' => 'pemakaian_id']) !!}
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Abonemen</label>
            <div class="col-sm-4">
                {!! Form::select('abonemen_id', $abonemens->pluck('level', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Abonemen', 'id' => 'abonemen_id']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Harga per M3</label>
            <div class="col-sm-4">
                {!! Form::number('harga_per_meter', null, ['class' => 'form-control', 'id' => 'harga_per_meter', 'readonly']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Jumlah Pakai</label>
            <div class="col-sm-4">
                {!! Form::number('jumlah_pakai', null, ['class' => 'form-control', 'id' => 'jumlah_pakai', 'readonly']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Biaya Administrasi</label>
            <div class="col-sm-4">
                {!! Form::number('administrasi', null, ['class' => 'form-control', 'id' => 'administrasi', 'readonly']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="keterlambatan" class="col-sm-2 control-label">Keterlambatan</label>
            <div class="col-sm-4">
                {!! Form::select('telat', ['Tidak' => 'Tidak', 'Ya' => 'Ya'], null, ['class' => 'form-control', 'id' => 'keterlambatan','placeholder'=>'Select keterlambatan']) !!}
            </div>
        </div>

        <div class="form-group d-none" id="denda-group">
            <label for="denda_keterlambatan" class="col-sm-2 control-label">Denda</label>
            <div class="col-sm-4">
                {!! Form::number('denda_keterlambatan', null, ['class' => 'form-control', 'id' => 'denda_keterlambatan', 'readonly']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Total Tagihan</label>
            <div class="col-sm-4">
                {!! Form::number('tagihan', null, ['class' => 'form-control', 'id' => 'tagihan', 'readonly']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Jenis Bayar</label>
            <div class="col-sm-4">
                {!! Form::select('jenis_bayar',['Cash'=>'Cash','Transfer'=>'Transfer','QRIS'=>'QRIS','Lainnya'=>'Lainnya'], null, ['class' => 'form-control', 'placeholder'=>'Pilih Pembayaran']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-4">
                {!! Form::select('status',['PENDING'=>'PENDING', 'LUNAS'=>'LUNAS'], null, ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
                <a href="/tagihan" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
            </div>
        </div> --}}

        @csrf
<div class="form-group">
    {!! Form::label('pelanggan_id', 'Pelanggan') !!}
    {!! Form::select('pelanggan_id', $pelanggans->pluck('nama', 'id'), old('pelanggan_id', $tagihan->pelanggan_id ?? ''), ['class' => 'form-control' . ($errors->has('pelanggan_id') ? ' is-invalid' : '')]) !!}
    @error('pelanggan_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('pemakaian_id', 'Pemakaian') !!}
    {!! Form::select('pemakaian_id', $pemakaians->pluck('bulan', 'id'), old('pemakaian_id', $tagihan->pemakaian_id ?? ''), ['class' => 'form-control' . ($errors->has('pemakaian_id') ? ' is-invalid' : '')]) !!}
    @error('pemakaian_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('abonemen_id', 'Abonemen') !!}
    {!! Form::select('abonemen_id', $abonemens->pluck('level', 'id'), old('abonemen_id', $tagihan->abonemen_id ?? ''), ['class' => 'form-control' . ($errors->has('abonemen_id') ? ' is-invalid' : '')]) !!}
    @error('abonemen_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('harga_per_meter', 'Harga per Meter') !!}
    {!! Form::number('harga_per_meter', old('harga_per_meter', $tagihan->harga_per_meter ?? ''), ['class' => 'form-control' . ($errors->has('harga_per_meter') ? ' is-invalid' : ''), 'readonly']) !!}
    @error('harga_per_meter')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('jumlah_pakai', 'Jumlah Pakai') !!}
    {!! Form::number('jumlah_pakai', old('jumlah_pakai', $tagihan->jumlah_pakai ?? ''), ['class' => 'form-control' . ($errors->has('jumlah_pakai') ? ' is-invalid' : ''), 'readonly']) !!}
    @error('jumlah_pakai')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('administrasi', 'Administrasi') !!}
    {!! Form::number('administrasi', old('administrasi', $tagihan->administrasi ?? ''), ['class' => 'form-control' . ($errors->has('administrasi') ? ' is-invalid' : ''), 'readonly']) !!}
    @error('administrasi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="keterlambatan" class="col-sm-2 control-label">Keterlambatan</label>
    <div class="col-sm-4">
        {!! Form::select('telat', ['TIDAK' => 'TIDAK', 'TELAT' => 'TELAT'], null, ['class' => 'form-control', 'id' => 'keterlambatan','placeholder'=>'Select keterlambatan']) !!}
    </div>
</div>

<div class="form-group d-none" id="denda-group">
    <label for="denda_keterlambatan" class="col-sm-2 control-label">Denda</label>
    <div class="col-sm-4">
        {!! Form::number('denda_keterlambatan', null, ['class' => 'form-control', 'id' => 'denda_keterlambatan', 'readonly']) !!}
    </div>
</div>

{{-- <div class="form-group">
    {!! Form::label('denda_keterlambatan', 'Denda Keterlambatan') !!}
    {!! Form::number('denda_keterlambatan', old('denda_keterlambatan', $tagihan->denda_keterlambatan ?? ''), ['class' => 'form-control' . ($errors->has('denda_keterlambatan') ? ' is-invalid' : ''), 'readonly']) !!}
    @error('denda_keterlambatan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> --}}

<div class="form-group">
    {!! Form::label('tagihan', 'Tagihan') !!}
    {!! Form::number('tagihan', old('tagihan', $tagihan->tagihan ?? ''), ['class' => 'form-control' . ($errors->has('tagihan') ? ' is-invalid' : ''), 'readonly']) !!}
    @error('tagihan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('jenis_bayar', 'Jenis Bayar') !!}
    {!! Form::select('jenis_bayar', ['Default' => 'Default', 'Lunas' => 'Lunas', 'Cicilan' => 'Cicilan'], old('jenis_bayar', $tagihan->jenis_bayar ?? ''), ['class' => 'form-control' . ($errors->has('jenis_bayar') ? ' is-invalid' : '')]) !!}
    @error('jenis_bayar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', ['PENDING' => 'PENDING', 'LUNAS' => 'LUNAS'], old('status', $tagihan->status ?? ''), ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : '')]) !!}
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
