@extends('admin')
@section('content')

<div id="page-wrapper">
 <div class="container-fluid">

	<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Country 
                        </h1>
                        <ol class="breadcrumb">
                           
                            <li class="active">
                                <i class="fa fa-file"></i> country
                            </li>
                        </ol>
                    </div>
                </div>
    <!-- /.row -->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Country Information
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
				
				 <form role="form" method="POST" action="{{ url('/countries/store') }}" class="form-horizontal" enctype="multipart/form-data">
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 
				 <div class="form-group">
					<label class="col-sm-2 control-label">Continent</label>
					<div class="col-sm-8">
						{!! Form::select('continent_id',$continents , Input::old('continent_id'), ['class'=>'form-control']) !!}
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Country</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
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