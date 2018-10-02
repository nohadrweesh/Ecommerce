@extends('admin.index')
@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  	{!! Form::open(['id'=>'form_data','url'=>admin_url('admin/destroy/all'),'method'=>'Delete'])!!}
   
    {!! $dataTable->table(['class'=>"dataTable table table-striped  table-bordered table-hover"],true)!!}

    {!!Form::close()!!}
   
  </div>
  <!-- /.box-body -->
</div>

<div id="del_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Warning </h4>
      </div>
      <div class="modal-body">
      	<div class="alert alert-danger  not_empty_record hidden">
      		<p>Are you sure you want to delete <span id="records_count">5</span> records ?</p>
      	</div>
      	<div class="alert alert-danger empty_record hidden">
      		<p>Please choose some records to delete .</p>
      	</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger not_empty_record hidden del_all"  data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default not_empty_record hidden"  data-dismiss="modal" >No</button>
        <button type="button" class="btn btn-default  empty_record hidden" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@push('js')
<script>
	delete_all();
</script>
 {!! $dataTable->scripts()!!}
 @endpush



@stop