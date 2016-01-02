@extends('admin')
@section('content')
<style>
form{display: inline;}
</style>

<script>
    
    $(function() {

  $('#in_main_menu_modal').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element

    var countryId = $(e.relatedTarget).data('country_id');
	var hubId = $(e.relatedTarget).data('hub_id');
	var inMainMenu = $(e.relatedTarget).data('in_main_menu');
    var inFront = $(e.relatedTarget).data('in_front');
    //populate the textbox
    $(e.currentTarget).find('input[name="country_id"]').val(countryId);
	$(e.currentTarget).find('input[name="hub_id"]').val(hubId);
	(inMainMenu==1)?$("#in_main_menu_checked").prop("checked", true):$("#in_main_menu_checked").prop("checked", false);
	(inFront==1)?$("#in_front_checked").prop("checked", true):$("#in_front_checked").prop("checked", false);
	

  });
  
  $('#confirmMenu').on('click', function(e){
	  
        e.preventDefault();

        $.ajax({
            url: '{{ url("countries/country_in_main_menu")}}', //this is the submit URL
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
	
	$('#category_in_main_menu_modal').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element

    var categoryId = $(e.relatedTarget).data('category_id');
	var hubId = $(e.relatedTarget).data('hub_id');
	var inMainMenu = $(e.relatedTarget).data('in_main_menu');
    var inFront = $(e.relatedTarget).data('in_front');
    //populate the textbox
    $(e.currentTarget).find('input[name="category_id"]').val(categoryId);
	$(e.currentTarget).find('input[name="hub_id"]').val(hubId);
	(inMainMenu==1)?$("#category_in_main_menu_checked").prop("checked", true):$("#category_in_main_menu_checked").prop("checked", false);
	(inFront==1)?$("#category_in_front_checked").prop("checked", true):$("#category_in_front_checked").prop("checked", false);
	

  });
  
  $('#categoryConfirmMenu').on('click', function(e){
	  
        e.preventDefault();

        $.ajax({
            url: '{{ url("categories/in_main_menu")}}', //this is the submit URL
            type: 'put', 
            data: $('#category_in_main_menu_form').serialize(),
            success: function(data){
                 $("#category_in_main_menu_modal").modal('hide'); 
				 window.location.href = '{{ url("hubs/menu")}}';
            },
			error: function(){
				alert($('#category_in_main_menu_form').serialize());
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
                            Menu 
                        </h1>
                        <ol class="breadcrumb">
                             <li class="active">
                                <i class="fa fa-table"></i> menu
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
							<!--<div class="panel-heading">
								
							</div>-->


						<div class="panel-body">
					
					
						@if (session('message'))
							<div class="alert alert-success">
								{{ session('message') }}
							</div>
						@endif
						
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>

								<tr>
										<th>Hub</th>
										<th class="col-lg-5">Country</th>
										<th>Categories</th>
										
								</tr>
								</thead>
								
								<tbody>
										
								@foreach( $hubs as $hub )
								
								<tr>
									<td>{{ $hub->name }}&nbsp;</td>
									
									<td>
									@foreach($hub->countries as $country)
									<div class="btn-group" style="margin-bottom:5px">
										<button type="button" class="btn btn-{{($country->pivot->cnt_in_main_menu)?'primary':'info'}} btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
											<i class="fa fa-gear"></i> {{ $country->name }} <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li>
											<a href="#"
											data-country_id="{{$country->id}}" 
											data-hub_id="{{$hub->id}}" 
											data-in_main_menu="{{ $country->pivot->cnt_in_main_menu }}" 
											data-in_front="{{ $country->pivot->cnt_in_front }}" 
											data-toggle="modal" 
											data-target="#in_main_menu_modal">Set Menu</a>
											</li>
											<li><a href="{{url('countries/hub_country_category/'.$hub->id.'/'.$country->id)}}">Add Categories</a>
											</li>
											
									
										</ul>
                                      </div>
									
									@endforeach
									</td>
									
									<td>
									@foreach($hub->categories as $category)
						
										<a href="#" 
										data-category_id="{{$category->id}}" 
										data-hub_id="{{$hub->id}}" 
										data-in_main_menu="{{ $category->pivot->in_main_menu }}" 
										data-in_front="{{ $category->pivot->in_front }}" 
										data-toggle="modal" 
										data-target="#category_in_main_menu_modal" 
										class="btn btn-xs btn-{{($category->pivot->in_main_menu)?'primary':'info'}}" style="margin-bottom:5px">
										<i class="fa fa-gear"></i> {{ $category->name }}
										</a>
									@endforeach
									</td>
									
								</tr>
								
							@endforeach
							
							</tbody>
						</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" role="dialog" aria-labelledby="inMainMenu" aria-hidden="true" id="in_main_menu_modal">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Country</h4>
      </div>
      <div class="modal-body">
 
 {!! Form::model('',['method' => 'put','route' => ['country_in_main_menu'],'id'=>'in_main_menu_form','class' => 'form-horizontal'] ) !!}

		 <input type="hidden" name="country_id"/>
		 <input type="hidden" name="hub_id"/>
	
		
		 <div class="form-group">
					
			<div class="col-sm-10">
			
				<label class="checkbox-inline">
					{!! Form::hidden('cnt_in_main_menu', 0) !!}
					{!! Form::checkbox('cnt_in_main_menu',1,null,array('id'=>'in_main_menu_checked')) !!} In Main Manu
				  </label>
				<label class="checkbox-inline">
					{!! Form::hidden('cnt_in_front', 0) !!}
					{!! Form::checkbox('cnt_in_front',1,null,array('id'=>'in_front_checked')) !!}Display in Front
					
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


<div class="modal fade" role="dialog" aria-labelledby="categoryMainMenu" aria-hidden="true" id="category_in_main_menu_modal">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Category</h4>
      </div>
      <div class="modal-body">
 {!! Form::model('',['method' => 'put','route' => ['in_main_menu'],'id'=>'category_in_main_menu_form','class' => 'form-horizontal'] ) !!}

		 <input type="hidden" name="category_id"/>
		 <input type="hidden" name="hub_id"/>
	
		
		 <div class="form-group">
					
			<div class="col-sm-10">
			
				<label class="checkbox-inline">
					{!! Form::hidden('in_main_menu', 0) !!}
					{!! Form::checkbox('in_main_menu',1,null,array('id'=>'category_in_main_menu_checked')) !!} In Main Manu
				  </label>
				<label class="checkbox-inline">
					{!! Form::hidden('in_front', 0) !!}
					{!! Form::checkbox('in_front',1,null,array('id'=>'category_in_front_checked')) !!}Display in Front
					
				</label>
			</div>
          </div>
				  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-danger" id="categoryConfirmMenu">Update</button>
      </div>
	  
	  </form>
	  
    </div>

  </div>
</div>
@endsection