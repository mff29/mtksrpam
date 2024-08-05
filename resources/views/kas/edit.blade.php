@extends('layouts.app')
@section('title','Edit Bank')
@section('content')
     <div class="content-wrapper">
          <section class="content">
               <div class="row">
               <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                              <h3 class="card-title">EDIT DATA BANK</h3>
                         </div>
                         <div class="card-body">
                              {!! Form::model($bank,['route'=>['bank.update',$bank->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                              @include('validation_error')
                              @include('bank.form')
                              {!! Form::close() !!}
                         </div>
                    </div>
               </div>
               </div>
          </section>
     </div>
@endsection