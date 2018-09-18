@extends('layouts.app')

@section('content')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Film Detail</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! -->
                    <label><strong>Name</strong>: </label> {{$result->name}} <br>
                    <label><strong>Description</strong>: </label> {{$result->description}} <br>
                    <label><strong>Realease Date</strong>: </label> {{ date("F d, Y",strtotime($result->realease_date))}} <br>
                    <label><strong>Rating</strong>: </label> {{$result->rating}}/5 <br>
                    <label><strong>Ticket Price</strong>: </label> ${{$result->ticket_price}} <br>
                    <label><strong>Country</strong>: </label> {{$result->country}} <br>
                    <label><strong>Genre</strong>: </label> {{$result->genre}} <br><br>
                    <hr>
                    <h4>Comments</h4>

                    @if(@$result->comments)
                        
                        @foreach ($result->comments as $comment)
                            <div class="cmtlist">
                                <label>{{ $comment->name }}</label>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        @endforeach
                        
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
