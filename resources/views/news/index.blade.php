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
                                <i class="fa fa-table"></i> news
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
										<th>News</th>
										<th>Hub</th>
										<th>Category</th>
										<th>Country</th>
										<th>News Type</th>
										<th>Author</th>
										<th>Action</th>
								</tr>
								</thead>
								
								<tbody>
										
								@foreach( $news as $news_content )
								
								<tr>
									<td>{{ $news_content->name }}&nbsp;</td>
									<td>
									@foreach( $news_content->hubs as $hub )
									
										<span class="btn btn-xs btn-default" style="margin-bottom:5px">{{$hub->name}}</span>
										
									@endforeach
									</td>
										
									<td>
									@foreach( $news_content->categories as $category )
									
										<span class="btn btn-xs btn-default" style="margin-bottom:5px">{{$category->name}}</span>
										
									@endforeach
									</td>
									
									<td>
										
									</td>
									
									<td>
									@foreach($news_content->types as $type) 
										{{ $type->name }}
									@endforeach	
									</td>
									
									<td>
									
										{{ $news_content->author_profile->name }}

									</td>
										
									<td>
									
									
									{!! link_to('news/' . $news_content->id .'/edit', 'Edit', ['class' => 'btn btn-success btn-xs']) !!}
						
									{!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy', $news_content->id]]) !!}
									{!! Form::hidden('id', $news_content->id) !!}
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
@endsection