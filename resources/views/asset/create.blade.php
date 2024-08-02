@extends('layouts.app')
@section('title','Tambah Asset')
@section('content')
     <div class="content-wrapper">
          <section class="content">
               <div class="row">
               <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                              <h3 class="card-title">TAMBAH DATA ASSET</h3>
                         </div>
                         <div class="card-body">
                              {!! Form::open(['route'=>'asset.store','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                              @include('validation_error')
                              @include('asset.form')
                              {!! Form::close() !!}
                         </div>
                    </div>
               </div>
               </div>
          </section>
     </div>
@endsection
@push('scripts')
<script type="text/javascript">
     $(document).ready(function() {
         $('.harga, .qty').on('input', function() {
             var harga = $('.harga').val();
             var qty = $('.qty').val();
             var jumlah = harga * qty;
             $('.jumlah').val(jumlah);
         });
     });
 </script>
@endpush