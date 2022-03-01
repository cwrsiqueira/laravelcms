@extends('site.layout')

@section('title', $page['tittle'])

@section('content')

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1" style="background-image:url('')">
        <div class="container" style="background-color: rgba(40,167,69,0.3); color:#ddd; padding:50px;">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{$page['title']}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <div class="container my-4">
        {!! $page['body'] !!}
    </div>

@endsection
