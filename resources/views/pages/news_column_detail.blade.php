@extends('user')

@section('title', $news->name)

@section('content')

<?php //@section('menu', $news->news_category->name)?>

<style>
.panel {
	position:relative;
}
#comment>.panel>.panel-heading:after,#comment>.panel>.panel-heading:before{
	position:absolute;
	top:11px;left:-16px;
	right:100%;
	width:0;
	height:0;
	display:block;
	content:" ";
	border-color:transparent;
	border-style:solid solid outset;
	pointer-events:none;
}
#comment>.panel>.panel-heading:after{
	border-width:7px;
	border-right-color:#f7f7f7;
	margin-top:1px;
	margin-left:2px;
}
#comment>.panel>.panel-heading:before{
	border-right-color:#ddd;
	border-width:8px;
}
#comment p{font-size:18px;}
</style>


			 <div class="news-detail">
			 
				<h1>{!! $news->name !!}</h1>
				<p>
				{!! $news->created_at->format('M jS Y g:ia') !!}
				</p>
				<div class="news-content">
				{!! Html::image('images/news/'.$news->front_img,$news->name,['class'=>'img-responsive']) !!}
				<br>
					{!! $news->content !!}
				</div>
				
						<script>
						/*
						$(function(){
							$('.news-content img').removeAttr('style');
							$('.news-content img').addClass('img-responsive');
						});*/
						</script>

			
				<hr>
			
				
			
			</div><!-- //news-detail -->
						
			
			<div id="comment">
				<h2>Comments</h2>
				@if(!Auth::check())
					<p><a href="{{url('signin')}}">Sign in</a> or <a href="{{url('register')}}">create your account</a> to join the discussion.</p>
				@endif
				@foreach($news->comments as $comment)
				<div class="panel panel-warning">
					<div class="panel-heading"><b><i class="fa fa-user"></i> {{$comment->user->name}}</b> 
					<span class="pull-right"><i class="fa fa-clock-o"></i> {{$comment->created_at->format('M jS Y g:ia')}}</span></div>
					<div class="panel-body">
					{{$comment->comment}}
					</div>
				</div>
				
				@endforeach
			
			</div><!-- //comment -->
			
		@if(Auth::check())	
			
			<div class="comment-form">
			
				
				<form method="POST" action="{{ url('comments/store') }}">
					{!! csrf_field() !!}
					
					
					<div class="form-group">
					
					<label>Comment</label>
						<textarea class="form-control" rows="8" name="comment"></textarea>
					
				  </div>
				  
				<input type="hidden" value="{{$news->id}}" name="news_id">
				<input type="hidden" value="{{$news->slug}}" name="slug">
			   <div class="form-group">
				
				  <button type="submit" class="btn btn-default">Submit</button>
				
			  </div>
			  
			</form>
			</div>
			
			@endif
						
<?php
			 
/* 
 <div class="col-md-3">
	
		<div class="latest-news">
				
				<h1>All Stories</h1>
				
				 @foreach($user_columns AS $user_column)
				<?php 
					$first_img = '';
					$output = preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/', $user_column->content, $matches);
					$first_img = @$matches[1][0];
				?>
				<a href='{!! Url('column/'.$user_column->news_category->slug.'/'.$user_column->slug) !!}'>
				
					<div class="latest-news-content">
						@if($first_img ){!! Html::image($first_img,$user_column->name,['class'=>'img-responsive']) !!} @endif
						
						<h2>{{$user_column->name}}</h2>
						
						<hr>
					</div>
				 
				 </a>
				@endforeach
		</div>
			   
	</div><!-- //col -->
	*/
?>
@endsection