@extends('admin.index')
@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
   
     {!! $dataTable->table(['class'=>"table table-bordered table-hover"])!!}
   
  </div>
  <!-- /.box-body -->
</div>


@stop