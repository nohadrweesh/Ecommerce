@extends('admin.index')
@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{$title}}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  	{!! Form::open(['id'=>'form_data','url'=>admin_url('countries'),'method'=>'Post','files'=>true])!!}
        <div class="form-group">
             {!!  Form::label('country_name_ar','Arabic Country Name')!!}
             {!! Form::text('country_name_ar',old('country_name_ar'),['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
              {!!  Form::label('country_name_en','English Country Name')!!}
             {!! Form::text('country_name_en',old('country_name_en'),['class'=>'form-control'])!!}
        </div>
        <div class="form-group">

              {!!  Form::label('code','Code')!!}
             {!! Form::text('code',old('code'),['class'=>'form-control'])!!}
        </div>


        <div class="form-group">

              {!!  Form::label('mob','Mob')!!}
             {!! Form::text('mob',old('mob'),['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
          {!! Form::label('logo','Logo') !!}
          {!! Form::file('logo',['class'=>'form-control']) !!}
        </div> 
     {!! Form::submit('Create Country',['class'=>'btn btn-primary'])!!}




  
    {!!Form::close()!!}
     
   
  </div>
  <!-- /.box-body -->
</div>




@stop