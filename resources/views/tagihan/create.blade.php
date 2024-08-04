@extends('layouts.app')
@section('title','Tambah Tagihan')
@section('content')
     <div class="content-wrapper">
          <section class="content">
               <div class="row">
               <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                              <h3 class="card-title">TAMBAH DATA TAGIHAN</h3>
                         </div>
                         <div class="card-body">
                            <h2>Create Tagihan</h2>
                            @include('validation_error')
        {!! Form::open(['route' => 'tagihan.store']) !!}
        
        <div class="form-group">
            {!! Form::label('pelanggan_id', 'Pelanggan') !!}
            {!! Form::select('pelanggan_id', $pelanggans->pluck('nama', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Pelanggan', 'id' => 'pelanggan_id']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('pemakaian_id', 'Pemakaian') !!}
            {!! Form::select('pemakaian_id', [], null, ['class' => 'form-control', 'placeholder' => 'Select Pemakaian', 'id' => 'pemakaian_id']) !!}
                @error('pemakaian_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
        </div>
        
        <div class="form-group">
            {!! Form::label('abonemen_id', 'Abonemen') !!}
            {!! Form::select('abonemen_id', $abonemens->pluck('level', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Abonemen', 'id' => 'abonemen_id']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('harga_per_meter', 'Harga Per Meter') !!}
            {!! Form::number('harga_per_meter', null, ['class' => 'form-control', 'id' => 'harga_per_meter', 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('jumlah_pakai', 'Jumlah Pakai') !!}
            {!! Form::number('jumlah_pakai', null, ['class' => 'form-control', 'id' => 'jumlah_pakai', 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tagihan', 'Tagihan') !!}
            {!! Form::number('tagihan', null, ['class' => 'form-control', 'id' => 'tagihan', 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('jenis_bayar', 'Jenis Bayar') !!}
            {!! Form::text('jenis_bayar', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status') !!}
            {!! Form::text('status', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
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
                url: '/getHargaPerMeter/' + abonemen_id,
                type: 'GET',
                success: function(data) {
                    $('#harga_per_meter').val(data.harga_per_meter);
                    calculateTagihan();
                }
            });
        });

        function calculateTagihan() {
            var harga_per_meter = $('#harga_per_meter').val();
            var jumlah_pakai = $('#jumlah_pakai').val();
            if (harga_per_meter && jumlah_pakai) {
                $('#tagihan').val(harga_per_meter * jumlah_pakai);
            }
        }
    });
</script>
@endpush