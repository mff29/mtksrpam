@extends('layouts.app')
@section('title','Edit pemakaian')
@section('content')
     <div class="content-wrapper">
          <section class="content">
               <div class="row">
               <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                              <h3 class="card-title">EDIT DATA PEMAKAIAN</h3>
                         </div>
                         <div class="card-body">
                              {!! Form::model($pemakaian,['route'=>['pemakaian.update',$pemakaian->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
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
 
         $('select[name="pelanggan_id"]').on('change', function() {
             var pelanggan_id = $(this).val();
             if (pelanggan_id) {
                 $.ajax({
                     url: '/get-meter-awal/' + pelanggan_id,
                     type: 'GET',
                     dataType: 'json',
                     success: function(data) {
                         $('input[name="meter_awal"]').val(data.meter_awal);
                     }
                 });
             } else {
                 $('input[name="meter_awal"]').val('');
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