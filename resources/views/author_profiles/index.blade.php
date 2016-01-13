@extends('admin')
@section('content')
<style>
form{display: inline;}
</style>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Author Profiles 
                        </h1>
                        <ol class="breadcrumb">
                             <li class="active">
                                <i class="fa fa-table"></i> Author
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
							<div class="panel-heading">
							All Authors
							</div>


						<div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>

								<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
									    <th>Address</th>
										<th>Action</th>
								</tr>
								</thead>
								
								<tbody>
								
										
								@foreach( $authors as $author )
								
								<tr>
									<td>{{ $author->name }}&nbsp;</td>
									<td>{{ $author->email }}&nbsp;</td>
									<td>{{ $author->phone }}</td>
									<td>{{ $author->address }}</td>
									<td>
									{!! link_to('author_profiles/' . $author->id .'/edit', 'Edit', ['class' => 'btn btn-success btn-xs']) !!}
						
									
									{!! Form::open([
												'method' => 'DELETE',
												'route' => ['author_profiles.destroy', $author->id]
												]) !!}
									<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-trash-o"></i> Delete</button>
										
									
									{!! Form::close() !!}
									
									</td>
								</tr>
						
							@endforeach
							
							</tbody>
						</table>
			
						{!! $authors->setPath('index' )->appends(['sort' => 'name'])->render() !!}
						{{-- $news_contents->fragment('foo')->render() --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection