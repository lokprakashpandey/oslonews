@extends('app')
@section('content')

<div id="page-wrapper">
 <div class="container-fluid">

	<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            News Category
                        </h1>
                        <ol class="breadcrumb">
                           
                            <li class="active">
                                <i class="fa fa-file"></i> News Category
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
        
		
				{!! Form::model($category, [ 'method' => 'patch','route' => ['categories.update', $category->id],'class' => 'form-horizontal'] ) !!}
				 
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="form-group">
					<label class="col-sm-2 control-label">Name</label>
					<div class="col-sm-5">
					
					{!! Form::text('name',null,array('required','class'=>'form-control')) !!}
					
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Parent</label>
					<div class="col-sm-5">
							
							 {{-- Form::select('parent_id', $categories , Input::old('parent_id'), ['class'=>'form-control']) --}}
							 
						<select class='form-control' name="parent_id">
							<option value='0'>--Top Menu--</option>
							{!!$category_opts!!} 
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Type</label>
					<div class="col-sm-4">
					{!! Form::select('cat_type', $cat_types , Input::old('cat_type'), ['class'=>'form-control']) !!}
					</div>
					
                 </div>
				 
				 <div class="form-group">
					
					<div class="col-sm-offset-2 col-sm-10">
					
					<label class="checkbox-inline">
						{!! Form::hidden('in_main_menu', 0) !!}
						{!! Form::checkbox('in_main_menu', '1', false) !!} In Main Manu
					  </label>
					<label class="checkbox-inline">
					{!! Form::hidden('in_front', 0) !!}
						{!! Form::checkbox('in_front', '1', false) !!}Display in Front
					</label>
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

@endsection