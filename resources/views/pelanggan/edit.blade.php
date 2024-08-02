@extends('layouts.app')
@section('title','Edit Pelanggan')
@section('content')
     <div class="content-wrapper">
          <section class="content">
               <div class="row">
               <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                              <h3 class="card-title">EDIT DATA PELANGGAN</h3>
                         </div>
                         <div class="card-body">
                              {!! Form::model($pelanggan,['route'=>['pelanggan.update',$pelanggan->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                              @include('validation_error')
                              @include('pelanggan.form')
                              {!! Form::close() !!}
                         </div>
                    </div>
               </div>
               </div>
          </section>
     </div>
@endsection