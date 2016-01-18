<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">The Oslo Times <b class="caret"></b></a>
		<ul class="dropdown-menu message-dropdown">
	@foreach($hubs as $hub)	
     		<li class="message-preview">
				<a href="{{ url( '/hub/'.$hub->slug ) }}">{{$hub->name}}</a>
			</li>
	@endforeach
		</ul>
</li>
	 