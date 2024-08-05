<div class="form-group">
     <label class="col-sm-2 control-label">Nama Asset</label>
     <div class="col-sm-4">
         {!! Form::text('nama', null, ['class'=>'form-control','Placeholder'=>'Nama Asset', 'required']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Kategori</label>
     <div class="col-sm-4">
         {!! Form::select('kategori',['Perpipaan'=>'Perpipaan','Non Perpipaan'=>'Non Perpipaan'], null, ['class'=>'form-control']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Harga</label>
     <div class="col-sm-4">
         {!! Form::number('harga', null, ['class'=>'harga form-control','Placeholder'=>'harga', 'required']) !!}
     </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Satuan</label>
    <div class="col-sm-4">
        {!! Form::select('satuan',['box'=>'box','Paket'=>'Paket','Liter'=>'Liter','Unit'=>'Unit','Meter'=>'Meter'], null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Quantity</label>
     <div class="col-sm-4">
         {!! Form::number('qty', null, ['class'=>'qty form-control','Placeholder'=>'Quantity', 'required']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Jumlah</label>
     <div class="col-sm-4">
         {!! Form::text('jumlah', null, ['class'=>'jumlah form-control','Placeholder'=>'Harga Total', 'readonly']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Tanggal</label>
     <div class="col-sm-4">
         {!! Form::date('tgl_beli', null, ['class'=>'form-control']) !!}
     </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Keterangan</label>
     <div class="col-sm-4">
         {!! Form::text('keterangan', null, ['class'=>'form-control','Placeholder'=>'Keterangan']) !!}
     </div>
</div>
<div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/asset" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
     </div>
</div>