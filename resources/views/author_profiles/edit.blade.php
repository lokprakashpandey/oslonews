@extends('admin')
@section('content')
<script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>
<div id="page-wrapper">
 <div class="container-fluid">

	<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Author
                        </h1>
                        <ol class="breadcrumb">
                           
                            <li class="active">
                                <i class="fa fa-file"></i> Author
                            </li>
                        </ol>
                    </div>
                </div>
    <!-- /.row -->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Author Information
				</div>


                <div class="panel-body">
        
					
				
				 {!! Form::model($author, [ 'method' => 'patch','route' => ['author_profiles.update', $author->id],'files' => true,'class' => 'form-horizontal'] ) !!}
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="form-group">
					<label class="col-sm-2 control-label">Name</label>
					<div class="col-sm-5">
					{!! Form::text('name',null,array('required','class'=>'form-control')) !!}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Address</label>
					<div class="col-sm-5">
					{!! Form::text('address',null,array('class'=>'form-control')) !!}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-5">
					{!! Form::text('email',null,array('class'=>'form-control')) !!}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Phone</label>
					<div class="col-sm-5">
					{!! Form::text('phone',null,array('class'=>'form-control')) !!}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Twitter</label>
					<div class="col-sm-5">
					<div class="input-group">
					  <div class="input-group-addon">@</div>
						{!! Form::text('twitter',null,array('class'=>'form-control')) !!}
					  </div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Image</label>
					<div class="col-sm-4">
						{!! Form::file('img_new', null,['class'=>'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Author Description</label>
					<div class="col-sm-10">
					
					{!! Form::textarea('description',null,array('id'=>'description','class'=>'ckeditor form-control')) !!}
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

function sansAccent(str){
    var accent = [
        /[\300-\306]/g, /[\340-\346]/g, // A, a
        /[\310-\313]/g, /[\350-\353]/g, // E, e
        /[\314-\317]/g, /[\354-\357]/g, // I, i
        /[\322-\330]/g, /[\362-\370]/g, // O, o
        /[\331-\334]/g, /[\371-\374]/g, // U, u
        /[\321]/g, /[\361]/g, // N, n
        /[\307]/g, /[\347]/g // C, c
    ];
    var noaccent = ['A','a','E','e','I','i','O','o','U','u','N','n','C','c'];
    for(var i = 0; i < accent.length; i++){
        str = str.replace(accent[i], noaccent[i]);
    }
    return str;
}
$("#name").keyup(function(){
	var str = sansAccent($(this).val());
	str = str.replace(/[^a-zA-Z0-9\s]/g,"");
	str = str.toLowerCase();
	str = str.replace(/\s/g,'-');
	$("#slug").val(str);
});
</script>

@endsection