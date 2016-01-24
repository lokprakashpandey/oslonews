<script src="{{ asset('/js/slick.min.js') }}"></script>
<link href="{{ asset('/css/slick.css') }}" rel="stylesheet">
<link href="{{ asset('/css/slick-theme.css') }}" rel="stylesheet">
<style>
.slick-slider {
    margin-bottom: 0px;
}
.slick-slide {
    margin: 0 5px;
  }
  /* the parent */
  .slick-list {
    margin: 0 -5px;
  }
  .slick-prev {
    margin-left: 30px;
	z-index:99;
  }

  .slick-next {
    margin-right: 30px;
  }
.slick-prev:before, .slick-next:before { font-family: FontAwesome; font-size: 26px; line-height: 1; opacity: 0.65; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }   

.slick-prev:before { content: "\f053"; }
[dir="rtl"] .slick-prev:before { content: "\f054"; }

[dir="rtl"] .slick-next { left: -10px; top: 70px; right: auto; }
.slick-next:before { content: "\f054"; }
[dir="rtl"] .slick-next:before { content: "\f053"; }

.item{ position: relative;}
.item .caption {
    position:absolute; /* absolute position (so we can position it where we want)*/  
    bottom:0px; /* position will be on bottom */  
    left:0px;  
    width:100%;  
    /* styling bellow */  
    background:#000000;
    font-family: 'tahoma';  
    font-size:12px; 
	line-height:15px;
    color:#ffffff;  
    opacity:0.6; /* transparency */  
    filter:alpha(opacity=60); /* IE transparency */  
	z-index:9999999999;
	padding:5px;
}
</style>
 <div class="col-md-12" style="padding-left:0px;">

			 @if($slide_news) 
			 
			   <div class="front_slide">
			   
	
				  <?php $i=0; ?>
				  @foreach($slide_news as $slide)
				  
				   <?php 
				    $i++;
					$active=($i==1)?'active':'';

					?>
		
				
				   <div class="item">

					  <a href='{!! Url('news/'.date('Y-m-d', strtotime($slide->created_at)).'/'.$slide->slug) !!}'>
					  {!! Html::image('images/news/slides/'.$slide->front_img,$slide->name,['class'=>'img-responsive']) !!}
					
					  <div class="caption">{{$slide->name}}</div>
						
					  </a>
				  </div>
				@endforeach
			  </div>

			 @endif	
</div>

<div class="col-md-8" style="padding:0px;">
  <div class="sub-headline">
	@foreach($front_categories_first_col as $front_category_first)
				
		<div class="col-lg-12 news-box">
		
		<h2>{{$front_category_first->name}}</h2>	

		@foreach($front_category_first->newsTop5 as $news_first_col)
		
		<a href="{{url('news/'.date('Y-m-d', strtotime($news_first_col->created_at)).'/'.$news_first_col->slug)}}">
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
	<!--<hr style="width: 100%; color: black; height: 1px; background-color:#eeeeee;" />-->
	<?php $i=0;?>
	@foreach($front_categories_second_col as $front_category_second)
	<?php $i++; ?>

	<div class="col-lg-4 news-box-3col" @if($i%3==0) style="padding-right:0px" @endif>
   <div class="{{($i%2==1)?'blue-bg':'red-bg'}}" style="padding:5px 0;">
	 <h2>{{$front_category_second->name}}</h2>
   </div> 
  
	 <div class="news-box-bg">
	 <?php $news_cnt = 0; ?>
	 @foreach($front_category_second->newsTop5 as $news_second_col)
	 <?php $news_cnt++ ?>
	 <a href="{{url('news/'.date('Y-m-d', strtotime($news_second_col->created_at)).'/'.$news_second_col->slug)}}">
	  @if($news_cnt==1)
	   <div class="box-border-bottom-3col">
	 @if($news_second_col->front_img) {!! Html::image('images/news/thumb/'.$news_second_col->front_img,$news_second_col->name,['class'=>'img-responsive']) !!} @endif
	   <h3>{{$news_second_col->name}}</h3>
	  </div>
	  @else
	   <div class="box-border-bottom-3col">
	    <p>{{$news_second_col->name}}</p>
	  </div>
	  @endif
	</a>
	 @endforeach

	 </div>
	
	</div>

	@endforeach	

	 <div class="clearfix"></div>
  </div>
</div>

   <div class="col-md-4" style="margin-top:15px;">
		@include('top_stories')
		@include('latest_news')			
  </div>

<script>
$('.front_slide').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script>