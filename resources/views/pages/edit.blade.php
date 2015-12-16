@extends('app')
@section('content')

<script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/js/chosen.jquery.js') }}"></script>

<div id="page-wrapper">
 <div class="container-fluid">

	<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Edit Pages
                        </h1>
                        <ol class="breadcrumb">
                           
                            <li class="active">
                                <i class="fa fa-file"></i> Pages
                            </li>
                        </ol>
                    </div>
                </div>
    <!-- /.row -->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Page Information
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
					
				
				  {!! Form::model($page, [ 'method' => 'patch','route' => ['pages.update', $page->id],'files' => true,'class' => 'form-horizontal'] ) !!}
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 
				  <div class="form-group">
					<label class="col-sm-2 control-label">Title</label>
					<div class="col-sm-6">
					{!! Form::text('name',null,array('class'=>'form-control')) !!}
					
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Content</label>
					<div class="col-sm-10">
					{!! Form::textarea('content',null,array('class'=>'ckeditor form-control')) !!}
					
					</div>
				</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-default">Update</button>
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
<script>
	
	var config = {	height: 400};	

	CKEDITOR.replace( 'content', config);
	
</script>

@endsection