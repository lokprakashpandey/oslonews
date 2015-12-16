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


@endsection