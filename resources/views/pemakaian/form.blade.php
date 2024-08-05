<div class="form-group">
    <label class="col-sm-2 control-label">Nama Pelanggan</label>
    <div class="col-sm-4">
        {!! Form::select('pelanggan_id', $pelanggan, null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Bulan</label>
     <div class="col-sm-4">
         {!! Form::select('bulan',['Januari'=>'Januari','Februari'=>'Februari','Maret'=>'Maret','April'=>'April','Mei'=>'Mei','Juni'=>'Juni','Juli'=>'Juli','Agustus'=>'Agustus','September'=>'September','Oktober'=>'Oktober','November'=>'November','Desember'=>'Desember'], null, ['class'=>'form-control']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Tahun</label>
     <div class="col-sm-4">
         {!! Form::number('tahun', null, ['class'=>'form-control','Placeholder'=>'Tahun', 'required']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Meter Awal</label>
     <div class="col-sm-4">
         {!! Form::number('meter_awal', null, ['class'=>'awal form-control','Placeholder'=>'Meter Awal', 'readonly']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Meter Akhir</label>
     <div class="col-sm-4">
         {!! Form::number('meter_akhir', null, ['class'=>'akhir form-control','Placeholder'=>'Meter Akhir', 'required']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Jumlah Pakai</label>
     <div class="col-sm-4">
         {!! Form::number('pakai', null, ['class'=>'pakai form-control','Placeholder'=>'Jumlah Pakai']) !!}
     </div>
</div>
<div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/pemakaian" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
     </div>
</div>