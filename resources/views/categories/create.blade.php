@extends('admin')
@section('content')
<link href="{{ asset('/css/bootstrap-chosen.css') }}" rel="stylesheet">
<script src="{{ asset('/js/chosen.jquery.js') }}"></script>
<script>
  $(function() {
	$('.chosen-select').chosen();
  });
</script>
<div id="page-wrapper">
 <div class="container-fluid">

	<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories 
                        </h1>
                        <ol class="breadcrumb">
                           
                            <li class="active">
                                <i class="fa fa-file"></i> Category
                            </li>
                        </ol>
                    </div>
                </div>
    <!-- /.row -->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Category Information
				</div>


                <div class="panel-body">
        
					  @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
				
				 <form role="form" method="POST" action="{{ url('/categories/store') }}" class="form-horizontal" enctype="multipart/form-data">
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">

				
				<div class="form-group">
					<label class="col-sm-2 control-label">Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Parent</label>
					<div class="col-sm-5">
				 
						<select class='form-control' name="parent_id">
							<option value='0'>--Top Menu--</option>
							{!!$category_opts!!} 
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Hub</label>
					<div class="col-sm-10">	 
						{!! Form::select('hub_id[]',$hubs , Input::old('hub_id[]'), ['multiple'=>'multiple','data-placeholder'=>'Please Select Hub','class'=>'chosen-select form-control']) !!}
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Country</label>
					<div class="col-sm-10">	 
						{!! Form::select('country_id[]',$countries , Input::old('country_id[]'), ['multiple'=>'multiple','data-placeholder'=>'Please Select Category','class'=>'chosen-select form-control']) !!}
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Type</label>
					<div class="col-sm-4">
					{!! Form::select('cat_type', $cat_types , null, ['class'=>'form-control']) !!}
					</div>
					

                  </div>
				  
				  <div class="form-group">
					
					<div class="col-sm-offset-2 col-sm-10">
					
					<label class="checkbox-inline">
						{!! Form::hidden('in_main_menu', 0) !!}
						<input type="checkbox" value="1" name="in_main_menu" checked>In Main Manu
					  </label>
					<label class="checkbox-inline">
					{!! Form::hidden('in_front', 0) !!}
						<input type="checkbox" value="1" name="main_menu">Display in Front
					</label>
					</div>
                  </div>
				

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-default">Add</button>
				</div>
			  </div>

			</form>
         
		 
				</div>
			</div>
		 </div>
     </div>

	 <!-- /.row -->
	
  </div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->	

@endsection