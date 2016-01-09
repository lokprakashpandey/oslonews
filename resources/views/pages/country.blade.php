@extends('user')
@section('title', 'The Oslo Times')
@section('content')
<style>
.carousel {
        background: #000000;
   }
.carousel-caption {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 10px;
    background: #333333;
    background: rgba(0, 0, 0, 0.55);
}
.carousel-caption h1,.carousel-caption a {
    margin-bottom: 0;
	color:#ffffff;
	text-decoration:none;
	 line-height:30px;
	 padding-top:0px;
	 margin-top:0px;
	 font-size:30px;
}

@media screen and (max-width: 700px){
     .carousel-caption h1,.carousel-caption a {
        font-size: 13px;
		line-height:16px;
    }
    .carousel-caption {
    background: rgba(0, 0, 0, 0.55);
    }
    .carousel-control {
        top: 20%;
    }
}

</style>

<div class="sub-headline">
	@foreach($front_categories_first_col as $front_category_first)
				
			<div class="col-lg-12 news-box">
			
			<h2>{{$front_category_first->name}}</h2>

			@foreach($front_category_first->hubCountryNewsTop5($front_category_first->pivot->id) as $news_first_col)
			
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