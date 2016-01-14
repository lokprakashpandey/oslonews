<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="token" content="{!! csrf_token() !!}"/>

    <title>@yield('title')</title>
	
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
	
	<link href="{{ asset('/css/li-scroller.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/slick.css') }}" rel="stylesheet">
	
	 <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">


	<script src="{{ asset('/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/scroll_li.js') }}"></script>

	<script src="{{ asset('/js/metisMenu.js') }}"></script>
	<script src="{{ asset('/js/sb-admin-2.js') }}"></script>
	
	<script src="{{ asset('/js/jquery.li-scroller.1.0.js') }}"></script>
	
	<script src="{{ asset('/js/slick.min.js') }}"></script>
	
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/social.css') }}" rel="stylesheet">
<style>
@media screen {
    #printSection {
        display: none;
    }
}
@media print {
    body * {
        visibility:hidden;
    }
    #printSection, #printSection * {
        visibility:visible;
    }
    #printSection {
        position:absolute;
        left:0;
        top:0;
    }
}
</style>    
<script>
$(function () {
    //For News Ticker
    $("ul#scrolling-news").liScroll();
	document.getElementById("btnPrint").onclick = function () {
		printElement(document.getElementById("print-this"));
	};
	function printElement(elem) {
		var domClone = elem.cloneNode(true);

		var $printSection = document.getElementById("printSection");

		if (!$printSection) {
			var $printSection = document.createElement("div");
			$printSection.id = "printSection";
			document.body.appendChild($printSection);
		}

		$printSection.innerHTML = "";
		$printSection.appendChild(domClone);
		window.print();
		return false;
	}
    
});
</script>
<?php /*
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "89e644f1-19ca-4ac6-8fa8-b6b43a9d18ad", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
*/?>	
	</head>
	
	
    <body>
	 <!-- Preloader -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <!-- End Preloader -->
	<?php //@include('scrolling_news')?>
	
	 
	<header>
	
	
	
	<div class="oslo-header">
	
	
	
		  <div class="row header-bg" style="margin-left:0; margin-right:0;">
		  
			<div class="col-md-4 col-xs-12">
			  
			</div>
	
			<div class="col-md-5 col-xs-12 nopadding" style="text-align:center">
				
			</div>
			
			<div class="col-md-3 col-xs-12 pull-right" style="padding-top:10px; margin-right:17px; color:#ffffff;text-align:right">
			
				<div class="col-md-12 user-login nopadding">
					<div class="signin">
					<ul class="edition pull-right">
					  
						 
            			<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">US Edition <b class="caret"></b></a>
							<ul class="dropdown-menu message-dropdown">
								<li class="message-preview">
									<a href="http://www.theoslotimes.com">International Edition</a>
								</li>
								<li class="message-preview">
									<a href="http://www.totimes.org">Norway Edition</a>
								</li>
								<li class="message-preview">
									<a href="http://extremismalert.com/">Extremism alert</a>
								</li>
       
							</ul>
						 </li>
						 
						<li>
						<i class="fa fa-user"></i> 
							@if(Auth::check()) <a href="{{url('auth/logout')}}">  logout</a> @role('admin|editor|author') <a href="{{url('news/index')}}" style="padding-left:15px;">admin</a>@endrole 
							@else <a href="{{ url('signin') }}"> sign in</a>
							@endif
						</li> 
					</ul>
				
					
					</div>
				</div>
				
				<div class="col-md-10 search pull-right">
					<div class="input-group">
						<input type="text" class="form-control input-sm" placeholder="Search">
						<div class="input-group-btn">
							<button class="btn btn-search  input-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
				</div>
				
				
		   </div>
			
			
	     </div><!-- //row -->
			
	
	</div><!-- //oslo-header  -->
	
	
	
	<div class="oslo-navigation-wrapper">
		<div class="container oslo-navigation">
		
		 @include('topmenudefault')

		</div>
	</div><!-- //oslo-navigation-wrapper-->
	
	<div class="oslo-breadcrumb-wrapper">
		<div class="container oslo-breadcrumb">
			<div class="breadcrumb-links col-md-7"><a href="{{url('/')}}">home</a> › <a href="{{url('/category/')}}">@yield('menu')</a></div>
			<div class="social-media col-md-5 pull-right hidden-xs" style="padding-top:9px;">
			
				<a class="btn btn-social-icon btn-xs btn-facebook"><i class="fa fa-facebook"></i></a>
				<a class="btn btn-social-icon btn-xs btn-twitter"><i class="fa fa-twitter"></i></a>
				<a class="btn btn-social-icon btn-xs btn-google-plus"><i class="fa fa-google-plus"></i></a>
				<a class="btn btn-social-icon btn-xs btn-linkedin"><i class="fa fa-linkedin"></i></a>
				<a class="btn btn-social-icon btn-xs btn-instagram"><i class="fa fa-instagram"></i></a>
				<a class="btn btn-social-icon btn-xs btn-tumblr"><i class="fa fa-tumblr"></i></a>
				
			</div>
		</div>
	</div>
	
	
	</header>
	
	
<script>
$(document).scroll(function(e){
    var scrollTop = $(document).scrollTop();
    if(scrollTop > 90){
        $('.oslo-navigation-wrapper').addClass('navbar-fixed-top');
		//$('.oslo-navigation-wrapper').addClass('navbar-fixed-margin');
		$('.oslo-breadcrumb-wrapper').addClass('navbar-fixed-top');
		$('.oslo-breadcrumb-wrapper').addClass('navbar-fixed-margin-breadcrumb');
		
    } else {
         $('.oslo-navigation-wrapper').removeClass('navbar-fixed-top');
		 //$('.oslo-navigation-wrapper').removeClass('navbar-fixed-margin');
		  $('.oslo-breadcrumb-wrapper').removeClass('navbar-fixed-top');
		 $('.oslo-breadcrumb-wrapper').removeClass('navbar-fixed-margin-breadcrumb');
    }
  });
</script>

	<div class="content-wrapper">
	
		<div class="container main-content">
			<div class="row">
						
			<div class="col-md-7 col-md-push-2" style="padding:0px;">
				
			<?php //	@include('breaking_news')?>
				@yield('content')
			</div>
		
			<div class="col-md-3 col-md-push-2">
			@include('top_stories')
			
			<?php /*
					
			@if(Route::currentRouteName() != 'column')
				@include('top_stories')
				@include('columns')
				@include('random_news')
			@else
				@include('columns_by_author')
			    @include('top_stories')
				@include('random_news')
			@endif
			*/
			?>
			
			</div>

			<div class="col-md-2 col-md-pull-10">

				@include('sidemenudefault')

			  <?php //@include('latestnews')?>
			<?php //@include('twitter_feed') ?>
			 </div><!-- //col -->
					
			</div><!-- //row -->
			
		
		
		</div><!-- //main-content -->
		
		
	 
	</div><!-- //content-wrapper -->
	
	<footer>
		<div class="oslo-footer">
		 <div class="container footer-content">		  
		   <div class="col-md-3">
		    <h2>TOT Network</h2>
			<div class="footer-links">
				<ul>
				 <li><a href="http://www.theoslotimes.com" target="_blank">TOT International</a></li>
				 <li><a href="http://totimes.org" target="_blank">TOT Norway</a></li>
				 <li><a href="http://totinterviews.com" target="_blank">Exclusive Interviews</a></li>
				 <li><a href="http://human.theoslotimes.com" target="_blank">Human Rights</a></li>
				 <li><a href="http://extremismalert.com" targberet="_blank">Extremism Alert</a></li>
				 <li><a href="http://www.journalistfront.com" target="_blank">Journalist Front</a></li>
				 <li><a href="http://scitechtimes.com" target="_blank">Scitech Times</a></li>
				 <li><a href="http://theoslotimes.com/category/books" target="_blank">Book Corner</a></li>
				</ul>
			</div>
			
		   </div>
		   
		   <div class="col-md-2">
		    <h2>About</h2>
			<div class="footer-links">
			<?php //@include('pages')?>
			   
			</div>
		   </div>
		   
		   <div class="col-md-2">
		    <h2>TOT Sections</h2>
			<div class="footer-links">
			   <ul>
				 <li><a href="#">Lifestyle</a></li>
				 <li><a href="#">Entertainment</a></li>
				 <li><a href="#">Book Corner</a></li>
				 <li><a href="#">Human Rights</a></li>
				 <li><a href="#">Media Freedom</a></li>
				 <li><a href="#">Environment</a></li>
				</ul>
			</div>
		   </div>
		   
		   <div class="col-md-2">
		    <h2>Follow Us</h2>
			<div class="footer-links">
			<div class="social-icons">
				<a href="#"><i class="fa fa-facebook"></i></a> 
				<a href="#"><i class="fa fa-twitter"></i></a> 
				<a href="#"><i class="fa fa-google-plus"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="#"><i class="fa fa-tumblr"></i></a>
			</div> 
			</div>
		   </div>
		   
		    <div class="col-md-2">
		    <h2>Download Us</h2>
			<div class="footer-links">
			<div class="social-icons">
				<a href="#"><i class="fa fa-android"></i></a> <a href="#"><i class="fa fa-apple"></i></a>
			</div> 
			</div>
		   </div>
		   <div class="clearfix"></div>
		   

		 </div>
		 <div class="col-md-12 footer-logo">
		 
		  <div class="container">
		  
		   <div class="col-md-7" style="padding-top:30px;">{!! Html::image('images/logo-small.jpg','oslo times',['class'=>'img-responsive']) !!}</div>
		   
		  <!-- <div class="col-md-6 footer-title">The Oslo Times International News Network</div>-->
		   
		   <div class="col-md-5 footer-contact pull-right">
		    <div class="contact col-md-12">Contact Us</div>
		     <div class="col-md-6">
		
				<div class="contact-info col-md-12 nopadding" style="padding-top:10px;">
				<p>Editor's Email:<br>
				<a href="mailto:editor@theoslotimes.com">editor@theoslotimes.com</a>
				
				Promotion's<br>
				<a href="mailto:promotion@theoslotimes.com">promotion@theoslotimes.com</a>
				
				
				US edition:	<a href="mailto:us@theoslotimes.com">us@theoslotimes.com</a>
				</p>
				
			
				</div>
			 </div>
			 
			   <div class="col-md-6 pull-right" style="padding-left:35px;">
			   	
				<p style="margin-top:10px;margin-bottom:0">Call us:</p>
				<div class="contact-info col-md-12 nopadding">
				<p>Europe: 004740606570<br>
				Asia: 00977981372615<br>
				</p>
				</div>
			   </div>
			 
		   </div><!-- footer-contact -->
		   
		   <div class="col-md-12" style="text-align:center; padding-top:10px;">
			Copyright ©  2015 Ulvenveien 83 0581, Oslo. All rights reserved. For Reprint contact The Oslo Times International News Network, Oslo
			 </div>
		   
		  </div><!-- //container -->
		  
		 </div>
		</div>
	</footer>
	 
	 <script>
	 //<![CDATA[
    jQuery(window).load(function() { // makes sure the whole site is loaded
      $('#status').fadeOut(); // will first fade out the loading animation
      $('#preloader').delay(700).fadeOut('slow'); // will fade out the white DIV that covers the website.
      $('body').delay(700).css({'overflow':'visible'});
    })
  //]]> 
  
  // slick slider call
  $(document).ready(function(){  
  $('.owl-carousel').slick({
  centerMode: true,
  centerPadding: '0px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    }
  ]
});
});
	 </script>
    </body>
</html>
