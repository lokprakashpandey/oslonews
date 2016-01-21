
			 <div class="sub-headline">
				<?php $i=0; ?>
				@foreach($first_column_news AS $first_col_news)
				
				<?php $i++; ?>
				
					<div class="col-md-4 news-box-3col" @if($i%3==0) style="padding-right:0px" @endif>
					
					<a href='{!! Url('article/'.$first_col_news->slug) !!}'>
					
					<div class="news-box-bg-cat">
					
					 @if($first_col_news->front_img) {!! Html::image('images/news/thumb/'.$first_col_news->front_img,$first_col_news->name,['class'=>'img-responsive']) !!} @endif
						<h2>{{$first_col_news->name}}</h2>
						<p>{!! str_limit($first_col_news->content, $words = 150, $end = '') !!}</p>
					
					
					</div>
					</a>
					</div>
				@if($i%3==0)<div class="clearfix"></div>@endif
				@endforeach
				
				 <div class="clearfix"></div>
				 
				 {!! str_replace('/?', '?', $first_column_news->render());!!}
				 
			</div>