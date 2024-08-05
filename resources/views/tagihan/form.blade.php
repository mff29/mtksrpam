        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Pelanggan</label>
            <div class="col-sm-4">
                {!! Form::select('pelanggan_id', $pelanggans->pluck('nama', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Pelanggan', 'id' => 'pelanggan_id']) !!}
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Bulan Pemakaian</label>
            <div class="col-sm-4">
                {!! Form::select('pemakaian_id', [], null, ['class' => 'form-control', 'placeholder' => 'Select Pemakaian', 'id' => 'pemakaian_id']) !!}
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
            {!! Form::label('keterlambatan', 'Keterlambatan') !!}
            {!! Form::select('keterlambatan', [0 => 'Tidak', 1 => 'Ya'], null, ['class' => 'form-control col-sm-4', 'id' => 'keterlambatan','placeholder'=>'Select keterlambatan']) !!}
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
        {!! Form::select('status',['Belum Lunas'=>'Belum Lunas', 'Lunas'=>'Lunas'], null, ['class'=>'form-control', 'placeholder'=>'Pilih Status']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/tagihan" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
    </div>
</div>