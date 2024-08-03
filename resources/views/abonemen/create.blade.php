@extends('layouts.app')
@section('title','Tambah Abonemen')
@section('content')
     <div class="content-wrapper">
          <section class="content">
               <div class="row">
               <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                              <h3 class="card-title">TAMBAH DATA ABONEMEN</h3>
                         </div>
                         <div class="card-body">
                              {!! Form::open(['route'=>'abonemen.store','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                              @include('validation_error')
                              @include('abonemen.form')
                              {!! Form::close() !!}
                         </div>
                    </div>
               </div>
               </div>
          </section>
     </div>
@endsection