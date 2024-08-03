<div class="form-group">
     <label class="col-sm-2 control-label">Jenis Bank</label>
     <div class="col-sm-4">
         {!! Form::text('jenis_bank', null, ['class'=>'form-control','Placeholder'=>'BCA, BNI, BRI, Mandiri, Dana, dll.']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Kode Bank</label>
     <div class="col-sm-4">
         {!! Form::number('kode_bank', null, ['class'=>'form-control','Placeholder'=>'002, 003, 004, dll.']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Nomor Rekening</label>
     <div class="col-sm-4">
         {!! Form::number('nomor_rekening', null, ['class'=>'form-control','Placeholder'=>'Nomor Rekening']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Nama Rekening</label>
     <div class="col-sm-4">
         {!! Form::text('nama_rekening', null, ['class'=>'form-control','Placeholder'=>'Nama Rekening']) !!}
     </div>
</div>
<div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/bank" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
     </div>
</div>