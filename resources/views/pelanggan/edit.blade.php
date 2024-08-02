@extends('layouts.app')
@section('title','Edit Perusahaan')
@section('content')
     <div class="content-wrapper">
          <section class="content">
               <div class="row">
               <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                              <h3 class="card-title">EDIT DATA PERUSAHAAN</h3>
                         </div>
                         <div class="card-body">
                              {!! Form::model($perusahaan,['route'=>['perusahaan.update',$perusahaan->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                              @include('validation_error')
                              @include('perusahaan.form')
                              {!! Form::close() !!}
                         </div>
                    </div>
               </div>
               </div>
          </section>
     </div>
@endsection