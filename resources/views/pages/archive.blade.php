@extends('user')
@section('title', 'Archive')
@section('content')
<style>
.no-radius{
    border-radius: 0;
}
label{font-size:16px;}
.form-group
{
	margin:0px; padding:0px;
}
.form-control {
   padding:6px;
}
.form-padding-margin{
	margin-right:0px;
	padding-right:0px;
}
</style>
	 
	<div class="archive">

		
		<div class="col-lg-12 news-box-archive">
		<div class="archive-border">
	    
		
		<?php
		    $year = date('Y');
			$month = date('m');
		   ?>
		<form role="form" method="GET" action="{{ url('/result') }}" class='form-horizontal'>
			<div class="form-group">
				<label class="col-md-2 control-label">Archive</label>
			
			<div class="col-sm-3 form-padding-margin">
				
				<select class='form-control' name="category_id">
					 @foreach( $categories as $cat )
					 
					   @if($cat->children->count())
						   
						<optgroup label="{{$cat->name}}">
					      @foreach($cat->children as $child)
							<option value="{{$child->id}}">{{$child->name}}</option>
						  @endforeach
						</optgroup>
						@else
							<option value="{{$cat->id}}">{{$cat->name}}</option>
						@endif
					 @endforeach
				</select>
			</div>
		   <div class="col-sm-2 form-padding-margin">
		   
				{!! Form::selectYear('year', 2013, 2016, $year, ['class' => 'form-control no-radius']) !!}
			</div>
			<div class="col-sm-2 form-padding-margin">
				{!! Form::selectMonth('month', $month, ['class' => 'form-control no-radius']) !!}
			</div>
			<div class="col-sm-2">
				 <button type="submit" class="btn btn-info form-control no-radius">Find</button>   
			</div>
		</div>
		</form>
	
	
		</div>
		</div>
	
		<?php $i=0; ?>
			@foreach($news as $news_all)
		<?php $i++; ?>		
			<div class="col-lg-4 news-box-archive">
			
				<div class="archive-border">
				
	
				 <a href="{{url('article/'.$news_all->slug)}}">
				 
				 <div class="col2-margin">
				
				 @if($news_all->front_img) {!! Html::image('images/news/thumb/'.$news_all->front_img,$news_all->name,['class'=>'img-responsive']) !!} @endif
				  <h3>{{$news_all->name}}</h3>
				  {!! str_limit($news_all->content, $limit = 150, $end = '...') !!}
			
				  </div>
				  
				</a>
		
		
				</div>
			</div>
			@if($i%3==0)<div class="clearfix"></div>@endif
		@endforeach	
	
		<div class="clearfix"></div>
				 
		{!! $news->setPath('archive' )->render() !!}
		
	</div>

@endsection