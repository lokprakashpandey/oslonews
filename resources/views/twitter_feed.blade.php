
 <div class="twitter">
	<div class="twitter-header"><i class="fa fa-twitter fa-3"> @TheOsloTimes</i></div>
	<div class="twitter-body">
	
		@foreach($tweets AS $tweet)
		@if(count($tweet->entities->urls)>=1)
		 @foreach($tweet->entities->urls as $urls_object)
		 <?php
		 //$search = "{!!$urls_object->url!!}";
		 //$replace = "<a href=\"{!!$urls_object->url!!}\" title=\"{!!$urls_object->expanded_url!!}\">{!!$urls_object->display_url!!}</a>";
		 //$text = str_replace($urls_object->url, '', $tweet->text);
		 $regex = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@";
		 $text = preg_replace($regex, ' ', $tweet->text)
		 ?>
				<a href="{!! Url($urls_object->url) !!}">
					<div class="latest-news-content">
						<p>{!!$text!!}</p>
						<div class="recent-date-twitter">{!!Twitter::ago($tweet->created_at)!!}</div>
						
					</div>
				</a>
				 
		 @endforeach
		 @endif
		@endforeach
	</div>
</div>