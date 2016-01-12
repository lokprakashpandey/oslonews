@extends('default')
@section('title', 'The Oslo Times')
@section('content')

<div class="sub-headline">
	@foreach($front_categories_first_col as $front_category_first)
				
					<div class="col-lg-12 news-box">
					
					<h2>{{$front_category_first->name}}</h2>	

					@foreach($front_category_first->newsTop5 as $news_first_col)
					
					<a href="{{url('article/'.$news_first_col->slug)}}">
					<div class="box-border-top">
						<div class="col-lg-3 nopadding">
						@if($news_first_col->front_img) {!! Html::image('images/news/thumb/'.$news_first_col->front_img,$news_first_col->name,['class'=>'img-responsive']) !!} @endif
						</div>
						<div class="col-lg-9">
							<h3>{{$news_first_col->name}}</h3>
							{!! str_limit($news_first_col->content, $words = 150, $end = '') !!}
						</div>
					
						 <div class="clearfix"></div>
					 </div>
					</a>

					@endforeach
						
					</div>
				@endforeach
</div>

@endsection