@extends('admin')
@section('content')
<link href="{{ asset('/css/bootstrap-chosen.css') }}" rel="stylesheet">
<script src="{{ asset('/js/chosen.jquery.js') }}"></script>
<script>
  $(function() {
	$('.chosen-select').chosen();
  });
</script>
<script>
    
    $(function() {

	 
  $('#in_main_menu_modal').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var countryHubId = $(e.relatedTarget).data('country_hub_id');
	var categoryId = $(e.relatedTarget).data('category_id');
	var inMainMenu = $(e.relatedTarget).data('in_main_menu');
    var inFront = $(e.relatedTarget).data('in_front');
    //populate the textbox
	$(e.currentTarget).find('input[name="category_id"]').val(categoryId);
    $(e.currentTarget).find('input[name="country_hub_id"]').val(countryHubId);
	(inMainMenu==1)?$("#in_main_menu_checked").prop("checked", true):$("#in_main_menu_checked").prop("checked", false);
	(inFront==1)?$("#in_front_checked").prop("checked", true):$("#in_front_checked").prop("checked", false);
	

  });

  
  $('#confirmMenu').on('click', function(e){
	  
        e.preventDefault();

        $.ajax({
            url: '{{ url("countries/cnt_category_in_main_menu")}}', //this is the submit URL
            type: 'put', 
            data: $('#in_main_menu_form').serialize(),
            success: function(data){
                 $("#in_main_menu_modal").modal('hide'); 
				 window.location.href = '{{ url("hubs/menu")}}';
            },
			error: function(){
				alert($('#in_main_menu_form').serialize());
			}
        });
    });

});
	

  </script>
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
					
					@if (session('message'))
							<div class="alert alert-success">
								{{ session('message') }}
							</div>
						@endif
				
				  {!! Form::model($country_hub, [ 'method' => 'patch','route' => ['hub_country_category_update', $country_hub->id],'class' => 'form-horizontal'] ) !!}
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 
				<div class="form-group">
					<label class="col-sm-2 control-label">Hub</label>
					<div class="col-sm-8">
						{!! Form::text('hub',$hub->name,array('class'=>'form-control','disabled')) !!}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Country</label>
					<div class="col-sm-8">
						{!! Form::text('country',$country->name,array('class'=>'form-control','disabled')) !!}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Categories</label>
					<div class="col-sm-10">
					
						@foreach($categories_selected as $category)
							<a href="#"	
							data-category_id="{{$category->id}}" 
							data-country_hub_id="{{$category->pivot->country_hub_id}}"  
							data-in_main_menu="{{ $category->pivot->cnt_cat_in_main_menu }}" 
							data-in_front="{{ $category->pivot->cnt_cat_in_front }}" 
							data-toggle="modal" 
							data-target="#in_main_menu_modal" 
							class="btn btn-xs btn-{{($category->pivot->cnt_cat_in_main_menu)?'primary':'info'}}" style="margin-bottom:5px">
								<i class="fa fa-gear"></i> {{ $category->name }}
							</a>
						@endforeach
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Add Category</label>
					<div class="col-sm-10">
						{!! Form::select('category_id[]',$categories , $categories_selected_ids, ['multiple'=>'multiple','class'=>'chosen-select form-control']) !!}
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


<div class="modal fade" role="dialog" aria-labelledby="inMainMenu" aria-hidden="true" id="in_main_menu_modal">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Category</h4>
      </div>
      <div class="modal-body">
 {!! Form::model('',['method' => 'put','route' => ['cnt_category_in_main_menu'],'id'=>'in_main_menu_form','class' => 'form-horizontal'] ) !!}

		 <input type="hidden" name="country_hub_id"/>
		<input type="hidden" name="category_id"/>
		
		 <div class="form-group">
					
			<div class="col-sm-10">
			
				<label class="checkbox-inline">
					{!! Form::hidden('cnt_cat_in_main_menu', 0) !!}
					{!! Form::checkbox('cnt_cat_in_main_menu',1,null,array('id'=>'in_main_menu_checked')) !!} In Main Manu
				  </label>
				<label class="checkbox-inline">
					{!! Form::hidden('cnt_cat_in_front', 0) !!}
					{!! Form::checkbox('cnt_cat_in_front',1,null,array('id'=>'in_front_checked')) !!}Display in Front
					
				</label>
			</div>
          </div>
				  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-danger" id="confirmMenu">Update</button>
      </div>
	  
	  </form>
	  
    </div>

  </div>
</div>

@endsection