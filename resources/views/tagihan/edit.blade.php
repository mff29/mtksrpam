@extends('layouts.app')
@section('title','Edit Tagihan')
@section('content')
     <div class="content-wrapper">
          <section class="content">
               <div class="row">
               <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                              <h3 class="card-title">EDIT DATA TAGIHAN</h3>
                         </div>
                         <div class="card-body">
                              {!! Form::model($tagihan,['route'=>['tagihan.update',$tagihan->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
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
                        $('#denda_keterlambatan').val(data.denda_keterlambatan).parent().parent().removeClass('d-none');
                        calculateTagihan();
                    }
                });
            } else {
                $('#denda_keterlambatan').val(0).parent().parent().addClass('d-none');
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