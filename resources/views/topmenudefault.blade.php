
<nav class="navbar navbar-default">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-home"></i></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
			
			  <ul class="nav navbar-nav">
			  
			    
			   <li class="dropdown">
			    <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >Hub <span class="caret"></span> </a>
		
							<ul class="dropdown-menu" role="menu">
								@foreach($hubs as $hub)
									<li><a href="{{ url( '/pages/hub/'.$hub->slug ) }}">{{$hub->name}}</a></li>
								@endforeach
							</ul>

			  </li> 
					

			
			 @foreach($countries as $country) 
			   <li @if($country->getCountryCategories($country->pivot->id)->count()) class="dropdown" @endif>
			    <a href="{{ url( '/countries/'.$country->id ) }}" @if($country->getCountryCategories($country->pivot->id)->count()) class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" @endif>{{$country->name}} @if($country->getCountryCategories($country->pivot->id)->count()) <span class="caret"></span> @endif</a>
						@if($country->getCountryCategories($country->pivot->id)->count())
							<ul class="dropdown-menu" role="menu">
								@foreach($country->getCountryCategories($country->pivot->id) as $category)
									<li><a href="{{ url( '/category/'.$category->slug ) }}">{{$category->name}}</a></li>
								@endforeach
							</ul>
						@endif
			  </li> 
					
			@endforeach
		
			  
			 
			   @foreach( $categories as $cat )
					<li @if($cat->children->count()) class="dropdown" @endif>
						<a href="{{ url( '/category/'.$cat->slug ) }}" @if($cat->children->count()) class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" @endif>{{ $cat->name }} @if($cat->children->count()) <span class="caret"></span> @endif</a>
						@if($cat->children->count())
							<ul class="dropdown-menu" role="menu">
								@foreach($cat->children as $child)
									<li><a href="{{ url( '/category/'.$child->slug ) }}">{{$child->name}}</a></li>
								@endforeach
							</ul>
						@endif
					</li>
				@endforeach
				 
			 </ul>
			 <?php /* @if(Auth::check())
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="#">{{Auth::user()->name}}</a></li>
			  </ul>
			  @endif */
			  ?>
			</div><!--/.nav-collapse -->
		  </div>
</nav>