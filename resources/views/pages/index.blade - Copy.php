@extends('user')
@section('title', 'The Oslo Times')
@section('content')


			 
			 <div class="col-md-7" style="padding:0px;">
			 
			 @if($main_headline) 
				 
<a href='{!! Url('article/'.$main_headline->news_category->slug.'/'.$main_headline->slug) !!}'>
				<div class="main-headline">

				 <div class="col-md-12" style="padding:0px;">
				
				 <?php 
					$first_img = '';
					$output = preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/', $main_headline->content, $matches);
					$first_img = @$matches[1][0];
				?>
					@if($first_img)
					{!! Html::image($first_img,$main_headline->name,['class'=>'img-responsive']) !!}
					@endif
					<h1>{{$main_headline->name}}</h1>
					<p>{!! $main_headline->summary !!}</p>
				
				 </div>
				 
				 <div class="clearfix"></div>
				 
				</div>
</a>				
			@endif				
			
				<div class="sub-headline">
				<?php $i=0; ?>
				@foreach($headlines AS $headline)
				
				<?php $i++; ?>
				<a href='{!! Url('article/'.$headline->news_category->slug.'/'.$headline->slug) !!}'>
					<div class="col-md-4 news-box" @if(count($headlines)!=$i) style="margin-right:10px;" @endif>
						<h2>{{$headline->name}}</h2>
						<p>{!! $headline->summary !!}</p>
					</div>
				</a>
				@endforeach
				
				 <div class="clearfix"></div>
				</div>
				
				<div class="archive-headline">
				<?php $j=0; ?>
				@foreach($old_headlines AS $old_headline)
				<?php $j++; ?>
				<a href='{!! Url('article/'.$old_headline->news_category->slug.'/'.$old_headline->slug) !!}'>
					<div class="col-md-4 news-box" @if(count($old_headlines)!=$j) style="margin-right:10px;" @endif>
					  
					  <h2>{{$old_headline->name}}</h2>
					 
					</div>
				</a>
				 @endforeach
				 
				</div>
				
			 </div><!-- //col -->
			 
			  <div class="col-md-3">
			  
			   <div class="latest-news">
				
				<h1>latest news</h1>
				
				@foreach($latest_newses AS $latest_news)
				<?php 
					$first_img = '';
					$output = preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/', $latest_news->content, $matches);
					$first_img = @$matches[1][0];
				?>
				<a href='{!! Url('article/'.$latest_news->news_category->slug.'/'.$latest_news->slug) !!}'>
				
					<div class="latest-news-content">
						@if($first_img ){!! Html::image($first_img,$latest_news->name,['class'=>'img-responsive']) !!} @endif
						
						<h2>{{$latest_news->name}}</h2>
						
						<hr>
					</div>
				 
				 </a>
				@endforeach
				</div>
				
			  </div><!-- //col -->
			 


@endsection