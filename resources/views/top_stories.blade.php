 			  
			   <div class="latest-news" style="border-top:3px solid #efca64">
		
				<h1>Top Stories</h1>
				
				<?php $i=0; ?>
				
				 @foreach($top_stories AS $top_story)
				
				<?php $i++;	?>
				@if($i==1)
				<a href='{!! Url('article/'.$top_story->slug) !!}'>
				
					<div class="top-news-content" style="border-bottom:1px solid #dddddd">
						@if($top_story->front_img){!! Html::image('images/news/thumb/'.$top_story->front_img,$top_story->name,['class'=>'img-responsive']) !!} @endif
						
						<h2>{{$top_story->name}}</h2>
						
						
					</div>
				 <div class="clearfix"></div>
				 </a>
				 @else
				 <a href='{!! Url('article/'.$top_story->slug) !!}'>
				
					<div class="top-news-content" style="padding:10px 0; border-bottom:1px solid #dddddd">
					<div class="row">
					  <div class="col-md-4" style="padding-left:20px; padding-right:0px;">
						@if($top_story->front_img){!! Html::image('images/news/thumb/'.$top_story->front_img,$top_story->name,['class'=>'img-responsive']) !!} @endif
					  </div>
					  
					  <div class="col-md-8" style="padding-right:20px;">
						{{$top_story->name}}
					  <?php //<div class="recent-date"><i class="fa fa-clock-o"></i> {!!$top_story->created_at->diffForHumans()!!}</div>?>
					  </div>
					  
					</div>	
					</div>
				 	<div class="clearfix"></div>
				 </a>
			 
				 @endif
				@endforeach
				<div class="clearfix"></div>
				</div>