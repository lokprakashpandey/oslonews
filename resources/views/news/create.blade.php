@extends('admin')
@section('content')
<link href="{{ asset('/css/bootstrap-chosen.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fileinput.css') }}" rel="stylesheet">
<link href="{{ asset('/css/selectize.bootstrap3.css') }}" rel="stylesheet">

<script src="{{ asset('/js/chosen.jquery.js') }}"></script>
<script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/js/chosen.jquery.js') }}"></script>
<script src="{{ asset('/js/fileinput.js') }}"></script>
<script src="{{ asset('/js/selectize.js') }}"></script>
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
                            News 
                        </h1>
                        <ol class="breadcrumb">
                           
                            <li class="active">
                                <i class="fa fa-file"></i> News
                            </li>
                        </ol>
                    </div>
                </div>
    <!-- /.row -->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					News Detail
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
				
				 <form role="form" method="POST" action="{{ url('/news/store') }}" class="form-horizontal" enctype="multipart/form-data">
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">	 
						<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">News Type</label>
					<div class="col-sm-8">	 
						{!! Form::select('type_id[]',$news_types , Input::old('type_id[]'), ['multiple'=>'multiple','data-placeholder'=>'Please Select News Types','class'=>'chosen-select form-control']) !!}
					</div>
				</div>
				<?php
				/*
				<div class="form-group">
					<label class="col-sm-2 control-label">Hub</label>
					<div class="col-sm-10">	 
						 {!! Form::select('hub_id[]',$category_array , Input::old('hub_id[]'), ['multiple'=>'multiple','data-placeholder'=>'Please Select Hub','class'=>'chosen-select form-control']) !!}
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Country</label>
					<div class="col-sm-10">	 
						{!! Form::select('country_id[]',$countries , Input::old('country_id[]'), ['multiple'=>'multiple','data-placeholder'=>'Please Select Category','class'=>'chosen-select form-control']) !!}
					</div>
				</div>
				*/
				?>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">News Category</label>
					<div class="col-sm-10">	 
						{!! Form::select('category_country_hub_id[]',$category_array , Input::old('category_country_hub_id[]'), ['multiple'=>'multiple','data-placeholder'=>'Please Select Category','class'=>'chosen-select form-control']) !!}
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Content</label>
					<div class="col-sm-10">
					<textarea class="ckeditor form-control" name="content" id="content" value="{{ old('content') }}"></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Image in front</label>
					<div class="col-sm-4">
						{!! Form::file('front_img', ['id'=>'front_img','class'=>'form-control file']) !!}
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Author</label>
					<div class="col-sm-4">
						{!! Form::select('author_profile_id',$authors , Input::old('author_profile_id'), ['class'=>'form-control']) !!}
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Tags</label>
					<div class="col-sm-10">	 
						<input type="text" class="form-control" name="tags" id="tags" value="{{ old('tags') }}">
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

<script>
	
	var config = {	height: 400};	

	//CKEDITOR.replace( 'content', config);

	  $("#front_img").fileinput({
        allowedFileExtensions : ['jpg', 'png','gif'],
        //uploadUrl: '#',
        showUpload:false,
        overwriteInitial: false,
        maxFileSize: 1000,
    
	});
	
</script>

<script>

var tags = [
    @foreach ($tags as $tag)
    {tag: "{{$tag}}" },
    @endforeach
];
$('#tags').selectize({
    valueField: 'tag',
    labelField: 'tag',
    searchField: 'tag',
	options: tags,
    create: true
});
</script>

@endsection