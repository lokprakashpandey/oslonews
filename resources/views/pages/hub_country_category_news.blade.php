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
				<?php $i=0; ?>
				@foreach($front_categories_first_col->news AS $first_col_news)
				
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
				 
				<?php // {!! str_replace('/?', '?', $first_column_news->render());!!}?>
				 
			</div>

@endsection