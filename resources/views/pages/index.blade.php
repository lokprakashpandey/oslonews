<style>
#owl-demo .item{
  display: block;
  padding: 30px 0px;
  margin: 5px;
  color: #FFF;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  text-align: center;
}
.owl-theme .owl-controls .owl-buttons div {
  padding: 5px 9px;
}
 
.owl-theme .owl-buttons i{
  margin-top: 2px;
}
 
//To move navigation buttons outside use these settings:
 
.owl-theme .owl-controls .owl-buttons div {
  position: absolute;
}
 
.owl-theme .owl-controls .owl-buttons .owl-prev{
  left: -45px;
  top: 55px; 
}
 
.owl-theme .owl-controls .owl-buttons .owl-next{
  right: -45px;
  top: 55px;
}
 
</style>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<link href="{{ asset('/css/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ asset('/css/owl.theme.css') }}" rel="stylesheet">

 <div class="col-md-12" style="padding-left:0px;">

			 @if($slide_news) 
			 
			   <div class="owl-carousel">
	
				  <?php $i=0; ?>
				  @foreach($slide_news as $slide)
				  
				   <?php 
				    $i++;
					$active=($i==1)?'active':'';

					?>
		
				
				   <div class="item">

					  <a href='{!! Url('article/'.$slide->slug) !!}'>
					  {!! Html::image('images/news/slides/'.$slide->front_img,$slide->name,['class'=>'img-responsive']) !!}
					
					  <p>{{$slide->name}}</p>
						
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
	
	<?php $i=0;?>
	@foreach($front_categories_second_col as $front_category_second)
	<?php $i++; ?>

	<div class="col-lg-4 news-box-3col" @if($i%3==0) style="padding-right:0px" @endif>

	 <h2>{{$front_category_second->name}}</h2>
	 
	 <div class="news-box-bg">
	 
	 @foreach($front_category_second->newsTop5 as $news_second_col)
	 
	 <a href="{{url('article/'.$news_second_col->slug)}}">
	 
	 <div class="box-border-bottom-3col">
	 @if($news_second_col->front_img) {!! Html::image('images/news/thumb/'.$news_second_col->front_img,$news_second_col->name,['class'=>'img-responsive']) !!} @endif
	  <h3>{{$news_second_col->name}}</h3>
	  </div>
	  
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
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
	autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
	
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
			 navigationText: [
      "<i class='icon-chevron-left icon-white'><</i>",
      "<i class='icon-chevron-right icon-white'>></i>"
      ],
            loop:true
        }
    }

})
</script>