<div class="form-group">
     <label class="col-sm-2 control-label">Nama Perusahaan</label>
     <div class="col-sm-4">
         {!! Form::text('nama', null, ['class'=>'form-control','Placeholder'=>'Nama Perusahaan']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Email Perusahaan</label>
     <div class="col-sm-4">
         {!! Form::text('email', null, ['class'=>'form-control','Placeholder'=>'email@example.com']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Website</label>
     <div class="col-sm-4">
         {!! Form::text('website', null, ['class'=>'form-control','Placeholder'=>'example.com']) !!}
     </div>
</div>
{{-- <div class="form-group">
     <label class="col-sm-2 control-label">Logo</label>
     <div class="col-sm-4">
         {!! Form::file('logo', null, ['class'=>'form-control']) !!}
     </div>
</div> --}}
<div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/perusahaan" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
     </div>
</div>