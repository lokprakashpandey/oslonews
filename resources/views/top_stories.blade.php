 			  
			   <div class="latest-news" style="border-top:3px solid #efca64">
		
				<h1>Top Stories</h1>
				
				 @foreach($top_stories AS $top_story)
				<?php 
					//$first_img = '';
					//$output = preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/', $top_story->content, $matches);
					//$first_img = @$matches[1][0];
				?>
				<a href='{!! Url('article/'.$top_story->slug) !!}'>
				
					<div class="top-news-content">
						@if($top_story->front_img){!! Html::image('images/news/thumb/'.$top_story->front_img,$top_story->name,['class'=>'img-responsive']) !!} @endif
						
						<h2>{{$top_story->name}}</h2>
						
						<hr style="height:3px;border:none;color:#333;background-color:#efca64;">
					</div>
				 
				 </a>
				@endforeach
				</div>