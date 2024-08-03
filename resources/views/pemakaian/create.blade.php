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
        document.addEventListener('DOMContentLoaded', function () {
            const pelangganSelect = document.querySelector('select[name="pelanggan_id"]');
            pelangganSelect.addEventListener('change', function () {
                const pelangganId = this.value;
                if (pelangganId) {
                    fetch(`/getLastMeterAkhir/${pelangganId}`)
                        .then(response => response.json())
                        .then(data => {
                            document.querySelector('input[name="meter_awal"]').value = data.meter_akhir !== null ? data.meter_akhir : 0;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                } else {
                    document.querySelector('input[name="meter_awal"]').value = 0;
                }
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