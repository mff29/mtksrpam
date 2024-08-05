<div class="form-group">
     <label class="col-sm-2 control-label">Jenis Wallet</label>
     <div class="col-sm-4">
         {!! Form::text('jenis', null, ['class'=>'form-control','Placeholder'=>'BCA, BNI, BRI, Mandiri, Dana, dll.', 'required']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Kode</label>
     <div class="col-sm-4">
         {!! Form::number('kode', null, ['class'=>'form-control','Placeholder'=>'002, 003, 004, dll.']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Nomor Rekening</label>
     <div class="col-sm-4">
         {!! Form::number('nomor_rekening', null, ['class'=>'form-control','Placeholder'=>'Nomor Rekening', 'required']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Nama Rekening</label>
     <div class="col-sm-4">
         {!! Form::text('nama_rekening', null, ['class'=>'form-control','Placeholder'=>'Nama Rekening', 'required']) !!}
     </div>
</div>
<div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/wallet" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
     </div>
</div>