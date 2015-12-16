@extends('user')

@section('title', $news->name)

@section('content')

<?php //@section('menu', $news->news_category->name)?>

<style>
/*.carousel {
        background: #333333;
		overflow: hidden;
    }
.carousel:hover {
        background: #000000;
    }
.carousel-caption {
    position: relative;
    left: auto;
	right: auto;
	padding-bottom:0px;
}
.carousel-caption h1,.carousel-caption a{
	 font-size:30px;
	 color:#ffffff;
	 text-decoration:none;
	 line-height:24px;
}
.fixed-height img {
  width: auto;
  height: 500px;
  max-height: 500px;
}*/

/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  z-index: 10;
    background: rgba(0, 0, 0, 0.45);
}

.carousel-caption h1,.carousel-caption a{
	 font-size:30px;
	 color:#ffffff;
	 text-decoration:none;
	 line-height:26px;
}
</style>

 
			 <div class="news-detail">
				<div class="col-md-12 nopadding">
					
					<span class='st_facebook_large' displayText='Facebook'></span>
					<span class='st_twitter_large' displayText='Tweet'></span>
					<span class='st_linkedin_large' displayText='LinkedIn'></span>
					<span class='st_pinterest_large' displayText='Pinterest'></span>
					<span class='st_email_large' displayText='Email'></span>
					<span class='st_sharethis_large' displayText='ShareThis'></span>
					<button class="btn btn-success pull-right" id="btnPrint"><i class="glyphicon glyphicon-print"></i></button>
				</div>
				
				<div id="print-this">
				
					<h1>{!! $news->name !!}</h1>
					
					<div style="border:1px solid #efefef; padding:15px; margin-bottom:10px;">
					<strong>Posted in:</strong> 
					<?php 
						$total=count($news->categories); 
						$i=0;
					?>
					
					@foreach( $news->categories as $cat)
					 <?php $i++?>
					 <a href="{{ url( '/category/'.$cat->slug ) }}">{{ $cat->name }}</a> @if($i<$total),@endif
					
					@endforeach
					 
					</div>
					
					<div style="margin-bottom:15px;">
					<p>Posted : <strong>{!! $news->created_at->format('M jS Y g:ia') !!}</strong> by <strong>{!! $news->author_profile->name !!}</strong></p>
					<p><strong>News Serial Number : TOT{!!$news->id!!}</strong></p>
					</div>
					
					<div class="news-content">
					{!! Html::image('images/news/'.$news->front_img,$news->name,['class'=>'img-responsive']) !!}
					<br>
					{!! $news->content !!}
					</div>
					
				</div><!-- //print -->
				
						<script>
						/*$(function(){
							$('.news-content img').removeAttr('style');
							$('.news-content img').addClass('img-responsive');
						});*/
						</script>

			
				<hr>

				@if(count($related_news)>0)
					
				<div class="related-post">
			
			   <h2>Related Posts</h2>
	
			<div class="row">
	
				@foreach($related_news AS $r_news)
				
				<a href='{!! Url('article/'.$r_news->slug) !!}'>
					<div class="col-md-4 content-box">
					
					<div class="related-post-margin">
					@if($r_news->front_img){!! Html::image('images/news/thumb/'.$r_news->front_img,$r_news->name,['class'=>'img-responsive']) !!} @endif
						<h3>{{$r_news->name}}</h3>
					 </div>
					 
					</div>
				</a>
				@endforeach
				
				 <div class="clearfix"></div>
				 </div>
				</div><!-- //related-post -->
				
				@endif
			
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


@endsection