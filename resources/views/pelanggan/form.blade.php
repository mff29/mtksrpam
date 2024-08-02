<div class="form-group">
     <label class="col-sm-2 control-label">Kode Pelanggan</label>
     <div class="col-sm-4">
         {!! Form::text('kode', null, ['class'=>'form-control','Placeholder'=>'Kode Pelanggan']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Nama Lengkap</label>
     <div class="col-sm-4">
         {!! Form::text('nama', null, ['class'=>'form-control','Placeholder'=>'Nama Lengkap']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">No HP</label>
     <div class="col-sm-4">
         {!! Form::text('no_hp', null, ['class'=>'form-control','Placeholder'=>'08 / 62']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Desa</label>
     <div class="col-sm-4">
         {!! Form::text('desa', null, ['class'=>'form-control','Placeholder'=>'Desa']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">RT</label>
     <div class="col-sm-4">
         {!! Form::text('rt', null, ['class'=>'form-control','Placeholder'=>'RT']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">RW</label>
     <div class="col-sm-4">
         {!! Form::text('rw', null, ['class'=>'form-control','Placeholder'=>'RW']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Status</label>
     <div class="col-sm-4">
         {!! Form::select('status',['Aktif'=>'Aktif', 'Tidak Aktif'=>'Tidak Aktif'], null, ['class'=>'form-control']) !!}
     </div>
</div>
<div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/pelanggan" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
     </div>
</div>