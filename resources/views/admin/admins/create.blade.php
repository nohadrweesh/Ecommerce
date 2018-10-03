@extends('admin.index')
@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{$title}}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  	{!! Form::open(['id'=>'form_data','url'=>admin_url('admin'),'method'=>'Post'])!!}
        <div class="form-group">
             {!!  Form::label('name','Name')!!}
             {!! Form::text('name',old('name'),['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
              {!!  Form::label('email','Email')!!}
             {!! Form::email('email',old('email'),['class'=>'form-control'])!!}
        </div>
        <div class="form-group">

              {!!  Form::label('password','Password')!!}
             {!! Form::password('password',old('password'),['class'=>'form-control'])!!}
        </div>



     {!! Form::submit('Create Admin',['class'=>'btn btn-primary'])!!}




  
    {!!Form::close()!!}
     
   
  </div>
  <!-- /.box-body -->
</div>




@stop