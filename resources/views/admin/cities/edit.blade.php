@extends('admin.index')
@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{$title}}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  	{!! Form::model($country,['id'=>'form_data','url'=>admin_url('countries/'.$country->id),'method'=>'Put','files'=>true])!!}
    <div class="form-group">
             {!!  Form::label('country_name_ar','Arabic Country Name')!!}
             {!! Form::text('country_name_ar',$country->country_name_ar,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
              {!!  Form::label('country_name_en','English Country Name')!!}
             {!! Form::text('country_name_en',$country->country_name_en,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">

              {!!  Form::label('code','Code')!!}
             {!! Form::text('code',$country->code,['class'=>'form-control'])!!}
        </div>


        <div class="form-group">

              {!!  Form::label('mob','Mob')!!}
             {!! Form::text('mob',$country->mob,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
          {!! Form::label('logo','Logo') !!}
          {!! Form::file('logo',['class'=>'form-control']) !!}
        </div> 

          <img src="{{Storage::url($country->logo)}}" width="50px" />
          <br/>
         
         
        
     {!! Form::submit('Edit',['class'=>'btn btn-primary'])!!}




  
    {!!Form::close()!!}
     
   
  </div>
  <!-- /.box-body -->
</div>




@stop