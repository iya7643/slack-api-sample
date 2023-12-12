@extends('___app')
@section('title', 'index')

@section('content')
    <h1 class="title">
        Slackチャンネル一覧
    </h1>
    <div class="columns is-multiline">
        @foreach($channels as $channel)
            <div class="column is-one-third">
                <div class="box" style="min-height: 12rem;">
                    <p class="title is-4">
                        <a href="{{ $channel->id }}">{{ $channel->name }}</a>
                    </p>
                    <p>{{ $channel->purpose['value'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
