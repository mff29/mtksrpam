@extends('layouts.app')
@section('title','Pembayaran')
@section('content')
     <div class="content-wrapper">
          <section class="content">
               <div class="row">
               <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                              <h3 class="card-title">PEMBAYARAN</h3>
                         </div>
                         <div class="card-body">
                              {!! Form::model($tagihan,['route'=>['tagihan.update',$tagihan->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                              @include('validation_error')
                              <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Pelanggan</label>
                                        <div class="col-sm-8">
                                            {!! Form::select('pelanggan_id', $pelanggans->pluck('nama', 'id'), null, ['class' => 'form-control select2', 'placeholder' => 'Select Pelanggan', 'id' => 'pelanggan_id', 'disabled']) !!}
                                            {!! Form::hidden('pelanggan_id', $tagihan->pelanggan_id) !!}
                                        </div>
                                        @error('pelanggan_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('pemakaian_id', 'Pemakaian', ['class'=>'col-sm-4 control-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::select('pemakaian_id', $pemakaians->pluck('bulan', 'id'), old('pemakaian_id', $tagihan->pemakaian_id ?? ''), ['class' => 'form-control select2' . ($errors->has('pemakaian_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Pemakaian', 'disabled']) !!}
                                            {!! Form::hidden('pemakaian_id', $tagihan->pemakaian_id) !!}
                                            @error('pemakaian_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        {!! Form::label('harga_per_meter', 'Harga per Meter', ['class'=>'col-sm-4 control-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::number('harga_per_meter', old('harga_per_meter', $tagihan->harga_per_meter ?? ''), ['class' => 'form-control' . ($errors->has('harga_per_meter') ? ' is-invalid' : ''), 'readonly']) !!}
                                            @error('harga_per_meter')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('jumlah_pakai', 'Jumlah Pakai', ['class'=>'col-sm-4 control-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::number('jumlah_pakai', old('jumlah_pakai', $tagihan->jumlah_pakai ?? ''), ['class' => 'form-control' . ($errors->has('jumlah_pakai') ? ' is-invalid' : ''), 'readonly']) !!}
                                            @error('jumlah_pakai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('tagihan', 'Tagihan', ['class'=>'col-sm-4 control-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::number('tagihan', old('tagihan', $tagihan->tagihan ?? ''), ['class' => 'form-control' . ($errors->has('tagihan') ? ' is-invalid' : ''), 'readonly']) !!}
                                            @error('tagihan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('status', 'Status', ['class'=>'col-sm-4 control-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::select('status', ['PENDING' => 'PENDING', 'LUNAS' => 'LUNAS'], old('status', $tagihan->status ?? ''), ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : '')]) !!}
                                            @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('abonemen_id', 'Abonemen', ['class'=>'col-sm-4 control-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::select('abonemen_id', $abonemens->pluck('level', 'id'), old('abonemen_id', $tagihan->abonemen_id ?? ''), ['class' => 'form-control select2' . ($errors->has('abonemen_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Abonemen']) !!}
                                            @error('abonemen_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="telat" class="col-sm-4 control-label">Keterlambatan</label>
                                        <div class="col-sm-8">
                                            {!! Form::select('telat', ['TIDAK' => 'TIDAK', 'TELAT' => 'TELAT'], null, ['class' => 'form-control', 'id' => 'keterlambatan','placeholder'=>'Select keterlambatan']) !!}
                                            @error('telat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('administrasi', 'Administrasi', ['class'=>'col-sm-4 control-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::number('administrasi', old('administrasi', $tagihan->administrasi ?? ''), ['class' => 'form-control' . ($errors->has('administrasi') ? ' is-invalid' : ''), 'readonly']) !!}
                                            @error('administrasi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group" id="denda-group">
                                        <label for="denda_keterlambatan" class="col-sm-4 control-label">Denda</label>
                                        <div class="col-sm-8">
                                            {!! Form::number('denda_keterlambatan', null, ['class' => 'form-control', 'id' => 'denda_keterlambatan', 'readonly']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('jenis_bayar', 'Jenis Bayar', ['class'=>'col-sm-4 control-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::select('jenis_bayar', ['Default' => 'Default', 'Lunas' => 'Lunas', 'Cicilan' => 'Cicilan'], old('jenis_bayar', $tagihan->jenis_bayar ?? ''), ['class' => 'form-control' . ($errors->has('jenis_bayar') ? ' is-invalid' : '')]) !!}
                                            @error('jenis_bayar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                              </div>

                              <hr>

                              <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                      <button type="submit" class="btn btn-success btn btn-sm"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
                                      <a href="/tagihan" class="btn btn-danger btn btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Kembali</a>
                                  </div>
                              </div>

                              {!! Form::close() !!}
                         </div>
                    </div>
               </div>
               </div>
          </section>
     </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();

        $('#pelanggan_id').change(function() {
            var pelanggan_id = $(this).val();
            $.ajax({
                url: '/getPemakaianByPelanggan/' + pelanggan_id,
                type: 'GET',
                success: function(data) {
                    $('#pemakaian_id').empty();
                    $('#pemakaian_id').append('<option value="">Select Pemakaian</option>');
                    $.each(data, function(key, value) {
                        $('#pemakaian_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        $('#pemakaian_id').change(function() {
            var pemakaian_id = $(this).val();
            $.ajax({
                url: '/getJumlahPakai/' + pemakaian_id,
                type: 'GET',
                success: function(data) {
                    $('#jumlah_pakai').val(data.jumlah_pakai);
                    calculateTagihan();
                }
            });
        });

        $('#abonemen_id').change(function() {
            var abonemen_id = $(this).val();
            $.ajax({
                url: '/getAbonemenDetails/' + abonemen_id,
                type: 'GET',
                success: function(data) {
                    $('#harga_per_meter').val(data.harga);
                    $('#administrasi').val(data.administrasi);
                    if ($('#keterlambatan').val() == 'TELAT') {
                        $('#denda_keterlambatan').val(data.denda_keterlambatan).parent().parent().removeClass('d-none');
                    }
                    calculateTagihan();
                }
            });
        });

        $('#keterlambatan').change(function() {
            var keterlambatan = $(this).val();
            if (keterlambatan == 'TELAT') {
                var abonemen_id = $('#abonemen_id').val();
                $.ajax({
                    url: '/getAbonemenDetails/' + abonemen_id,
                    type: 'GET',
                    success: function(data) {
                        $('#denda_keterlambatan').val(data.denda_keterlambatan).parent().parent();
                        calculateTagihan();
                    }
                });
            } else {
                $('#denda_keterlambatan').val(0).parent().parent();
                calculateTagihan();
            }
        });

        function calculateTagihan() {
            var harga_per_meter = parseFloat($('#harga_per_meter').val()) || 0;
            var jumlah_pakai = parseFloat($('#jumlah_pakai').val()) || 0;
            var administrasi = parseFloat($('#administrasi').val()) || 0;
            var denda_keterlambatan = parseFloat($('#denda_keterlambatan').val()) || 0;

            var tagihan = (harga_per_meter * jumlah_pakai) + administrasi + denda_keterlambatan;
            $('#tagihan').val(tagihan);
        }
    });
</script>
@endpush