<div class="form-group">
     <label class="col-sm-2 control-label">Level</label>
     <div class="col-sm-4">
         {!! Form::text('level', null, ['class'=>'form-control','Placeholder'=>'kategori / >=2000 M3', 'required']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Harga per Meter</label>
     <div class="col-sm-4">
         {!! Form::number('harga', null, ['class'=>'form-control','Placeholder'=>'Harga per Meter', 'required']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Biaya Administrasi</label>
     <div class="col-sm-4">
         {!! Form::number('administrasi', null, ['class'=>'form-control','Placeholder'=>'Biaya Administrasi']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Biaya Keterlambatan</label>
     <div class="col-sm-4">
         {!! Form::number('keterlambatan', null, ['class'=>'form-control','Placeholder'=>'Biaya Keterlambatan']) !!}
     </div>
</div>
<div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/abonemen" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
     </div>
</div>