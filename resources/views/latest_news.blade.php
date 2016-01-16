
 <div class="latest-news" style="border-top:3px solid #efca64">
	<h1>Latest News</h1>
		<?php $i=0; ?>
		@foreach($news AS $latest_news)
		  <?php $i++;	?>
		  @if($i==1)
					
				<a href='{!! Url('article/'.$latest_news->slug) !!}'>
				
					<div class="top-news-content" style="border-bottom:1px solid #dddddd">
						@if($latest_news->front_img){!! Html::image('images/news/thumb/'.$latest_news->front_img,$latest_news->name,['class'=>'img-responsive']) !!} @endif					
						<h2>{!!$latest_news->name!!}</h2>
					<div class="recent-date"style="margin-left:10px;margin-bottom:5px;"><i class="fa fa-clock-o"></i> {!!$latest_news->created_at->diffForHumans()!!}</div>													
					</div>
				 
				 </a>
		  @else
				 <a href='{!! Url('article/'.$latest_news->slug) !!}'>
				
					<div class="top-news-content" style="padding:10px 0; border-bottom:1px solid #dddddd">
					<div class="row">
					  <div class="col-md-4" style="padding-left:20px; padding-right:0px;">
						@if($latest_news->front_img){!! Html::image('images/news/thumb/'.$latest_news->front_img,$latest_news->name,['class'=>'img-responsive']) !!} @endif
					  </div>
					  
					  <div class="col-md-8" style="padding-right:20px;">
						{{$latest_news->name}}
					  <div class="recent-date"><i class="fa fa-clock-o"></i> {!!$latest_news->created_at->diffForHumans()!!}</div>						
					  </div>
					</div>	
					</div>
				 	<div class="clearfix"></div>
				 </a>
			 
		@endif
		@endforeach

</div>