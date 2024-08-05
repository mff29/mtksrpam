<div class="form-group">
     <label class="col-sm-2 control-label">Tipe</label>
     <div class="col-sm-4">
         {{-- {!! Form::select('tipe',['Pendapatan'=>'Pendapatan','Pengeluaran'=>'Pengeluaran'], null, ['class'=>'form-control','Placeholder'=>'Select Tipe']) !!} --}}
         <select name="tipe" id="tipe" class="form-control">
            <option value="" disabled selected>Select Tipe....</option>
            <option value="pendapatan">Pendapatan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select>
        </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Deskripsi</label>
    <div class="col-sm-4">
        {!! Form::text('deskripsi', null, ['class'=>'form-control','Placeholder'=>'Deskripsi']) !!}
    </div>
</div>
<div class="form-group">
     <label class="col-sm-2 control-label">Nominal</label>
     <div class="col-sm-4">
         {!! Form::number('nominal', null, ['class'=>'form-control','Placeholder'=>'Jumlah Nominal', 'required']) !!}
     </div>
</div>

<div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
         <a href="/kas" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
     </div>
</div>