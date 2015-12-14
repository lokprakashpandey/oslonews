@extends('user')

@section('title', $page->name)

@section('content')

<?php //@section('menu', $news->news_category->name)?>

 
			 <div class="news-detail">
			 <!--
				<div class="col-md-12 nopadding">
					
					<span class='st_facebook_large' displayText='Facebook'></span>
					<span class='st_twitter_large' displayText='Tweet'></span>
					<span class='st_linkedin_large' displayText='LinkedIn'></span>
					<span class='st_pinterest_large' displayText='Pinterest'></span>
					<span class='st_email_large' displayText='Email'></span>
					<span class='st_sharethis_large' displayText='ShareThis'></span>
					<button class="btn btn-success pull-right" id="btnPrint"><i class="glyphicon glyphicon-print"></i></button>
				</div>
			-->
				<div id="print-this">
				
					<h1>{!! $page->name !!}</h1>
					
					
					<div class="news-content">
					
					{!! $page->content !!}
					</div>
					
				</div><!-- //print -->
				
			</div><!-- //news-detail -->
						
	
@endsection