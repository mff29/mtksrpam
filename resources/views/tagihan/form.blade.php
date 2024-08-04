<div class="form-group">
    <label class="col-sm-2 control-label">Nama Pelanggan</label>
    <div class="col-sm-4">
        {!! Form::select('pelanggan_id', $pelanggan, null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Pemakaian</label>
    <div class="col-sm-4">
        {!! Form::select('pemakaian_id', $pemakaian, null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Tarif per Meter</label>
    <div class="col-sm-4">
         {!! Form::select('abonemen_id', $abonemen, null, ['class'=>'form-control','Placeholder'=>'Tarif per Meter']) !!}
    </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Tagihan</label>
    <div class="col-sm-4">
         {!! Form::number('tagihan', null, ['class'=>'awal form-control','Placeholder'=>'Tagihan']) !!}
     </div>
    </div>
<div class="form-group">
    <label class="col-sm-2 control-label">Jenis Bayar</label>
    <div class="col-sm-4">
         {!! Form::select('jenis_bayar',['Cash'=>'Cash','Transfer'=>'Transfer','Lainnya'=>'Lainnya'], null, ['class'=>'akhir form-control']) !!}
    </div>
</div>
    <div class="form-group">
         <label class="col-sm-2 control-label">Bulan</label>
         <div class="col-sm-4">
             {!! Form::select('status',['Belum Lunas'=>'Belum Lunas','Lunas'=>'Lunas'], null, ['class'=>'form-control']) !!}
         </div>
    </div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/tagihan" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
    </div>
</div>