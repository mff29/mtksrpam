@extends('layouts.app')
@section('title','Tambah Pemakaian')
@section('content')
     <div class="content-wrapper">
          <section class="content">
               <div class="row">
               <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                              <h3 class="card-title">TAMBAH DATA PEMAKAIAN</h3>
                         </div>
                         <div class="card-body">
                              {!! Form::open(['route'=>'pemakaian.store','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                              @include('validation_error')
                              @include('pemakaian.form')
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

            function updateMeterAwal() {
                var pelanggan_id = $('select[name="pelanggan_id"]').val();
                var bulan = $('input[name="bulan"]').val();

                if (pelanggan_id && bulan) {
                    $.ajax({
                        url: '/get-meter-awal',
                        type: 'POST',
                        data: {
                            pelanggan_id: pelanggan_id,
                            bulan: bulan,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('input[name="meter_awal"]').val(data.meter_awal);
                        }
                    });
                }
            }

            function validateMeterAkhir() {
                var meterAwal = parseFloat($('input[name="meter_awal"]').val()) || 0;
                var meterAkhir = parseFloat($('input[name="meter_akhir"]').val()) || 0;

                if (meterAkhir < meterAwal) {
                    $('#meter_akhir_error').text('Tidak boleh lebih rendah dari Meter Awal.');
                } else {
                    $('#meter_akhir_error').text('');
                }
            }

            $('select[name="pelanggan_id"], input[name="bulan"]').on('change', function() {
                updateMeterAwal();
                validateMeterAkhir(); // Check validation on change
            });

            $('input[name="meter_akhir"]').on('input', function() {
                validateMeterAkhir();
            });
    });
</script>

<script type="text/javascript">
        $(document).ready(function() {
            $('.awal, .akhir').on('input', function() {
                var awal = $('.awal').val();
                var akhir = $('.akhir').val();
                var jumlah = akhir - awal;
                $('.pakai').val(jumlah);
            });
        });
</script>
@endpush
@push('css')
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
@endpush