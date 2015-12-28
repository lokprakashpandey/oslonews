@extends('admin')
@section('content')
<style>
form{display: inline;}
</style>

<script>
    
    $(function() {

	<!-- Dialog show event handler -->
  $('#confirmDelete').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });

  <!-- Form confirm (yes/ok) handler, submits form -->
  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });
  
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
            url: 'country_in_main_menu', //this is the submit URL
            type: 'put', 
            data: $('#in_main_menu_form').serialize(),
            success: function(data){
                 $("#in_main_menu_modal").modal('hide'); 
				 window.location.href = "index";
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
                                <i class="fa fa-table"></i> country
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
										<th>Country</th>
										<th>Continent</th>
										<th>Hubs</th>
										<th>Action</th>
								</tr>
								</thead>
								
								<tbody>
										
								@foreach( $countries as $country )
								
								<tr>
									<td>{{ $country->name }}&nbsp;</td>
									<td>{{ $country->continent->name }}&nbsp;</td>
									<td>
									@foreach($country->hubs as $hub)
									
										<a href="#" 
										data-country_id="{{$country->id}}" 
										data-hub_id="{{$hub->id}}" 
										data-in_main_menu="{{ $hub->pivot->cnt_in_main_menu }}" 
										data-in_front="{{ $hub->pivot->cnt_in_front }}" 
										data-toggle="modal" 
										data-target="#in_main_menu_modal" 
										class="btn btn-xs btn-info">
										{{ $hub->name }}
										</a>
										
										<a href="{{url('countries/hub_country_category/'.$hub->id.'/'.$country->id)}}" class="btn btn-xs btn-info">
										>
										</a>
									@endforeach
									</td>
									<td>
									
									
									{!! link_to('countries/' . $country->id .'/edit', 'Edit', ['class' => 'btn btn-success btn-xs']) !!}
						
									{!! Form::open(['method' => 'DELETE', 'route' => ['countries.destroy', $country->id]]) !!}
									{!! Form::hidden('id', $country->id) !!}
									 <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete News" data-message="Are you sure you want to delete this news ?">Delete
									
									{!! Form::close() !!}
																
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

<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Parmanently</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure about this ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm">Delete</button>
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
@endsection