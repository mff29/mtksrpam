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
                            {!! Form::open(['route' => 'tagihan.store', 'class'=>'form-horizontal']) !!}
                            @include('validation_error')
                            @include('tagihan.form')
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