@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="news">
                <section class="news">
                    @if(is_array($news ) || is_object($news))
                    @foreach($news as $selectedNews)

                    <article>
                        <img src="{{$selectedNews['urlToImage']}}" alt="" />
                        <div class="text">
                            <h1>{{$selectedNews['title']}}</h1>
                            <p style="font-size: 14px">{{$selectedNews['description']}} <a href="{{$selectedNews['url']}}" target="_blank">
                                    <small>read more...</small>
                                </a></p>
                            <div style="padding-top: 5px;font-size: 12px">
                                Author: {{$selectedNews['author'] ? : "Unknown" }}</div>
                            @if($selectedNews['publishedAt'] !== null)
                            <div style="padding-top: 5px;">Date
                                Published: {{ Carbon\Carbon::parse($selectedNews['publishedAt'])->format('l jS \\of F Y ') }}</div>
                            @else
                            <div style="padding-top: 5px;">Date Published: Unknown</div>
                            @endif

                        </div>
                    </article>
                    @endforeach
                    @endif
                </section>
            </div>
        </div>
    </div>
</div>
@endsection