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
			 @if(count($slide_news)) 
			 
			   <div id="slide-news" class="carousel slide" data-ride="carousel">
	
		
				  <div class="carousel-inner">
				  <?php $i=0; ?>
				  @foreach($slide_news as $slide)
				  
				   <?php 
				    $i++;
					$active=($i==1)?'active':'';
					/*$first_img = '';
					$output = preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/', $slide->content, $matches);
					$first_img = @$matches[1][0];*/
					?>
		
				
				   <div class="item {{$active}}">
					  <a href='{!! Url('article/'.$slide->slug) !!}'>
					  {!! Html::image('images/news/slides/'.$slide->front_img,$slide->name,['class'=>'img-responsive']) !!}
					  </a>
						<div class="carousel-caption">
						  <h1>
						
						  <a href='{!! Url('article/'.$slide->slug) !!}'>{{$slide->name}}</a>
						
						  </h1>
						  
						</div>
					 
					</div>
	
					@endforeach
				<?php //@endforeach?>
				  </div>
			 
				  <!-- Controls -->
				  <a class="left carousel-control" href="#slide-news" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#slide-news" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				  </a>
				</div> <!-- Carousel -->

			 @endif	
<div class="sub-headline">
	@foreach($front_categories_first_col as $front_category_first)
				
			<div class="col-lg-12 news-box">
			
			<h2>{{$front_category_first->name}}</h2>
			
			@foreach($front_category_first->hubNewsTop5($front_category_first->pivot->id) as $news_first_col)
			
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