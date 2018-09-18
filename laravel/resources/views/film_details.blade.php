@extends('layouts.app')

@section('content')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12"><a class="btn btn-primary" style="float: right; margin-bottom: 10px;" href="{{URL('/')}}/films">All Films</a></div>
            </div>
            <div class="card">
                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif
                <div class="card-header">Film Details</div>

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
                    @auth
                        {!! Form::open(['url' => 'comment/add']) !!}
                            <div class="row">
                                <label class="col-md-3"><strong>Name</strong>:</label>
                                <div class="col-md-8"> 
                                    {{ Form::text('name', '', ['class' => 'form-control required','required'])}} 
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-3"><strong>Comment</strong>:</label>
                                <div class="col-md-8"> 
                                    {{ Form::textarea('comment', '', ['class' => 'form-control','required'])}} 
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-3"></label>
                                <div class="col-md-2"> 
                                    {{ Form::submit('Submit', ['class' => 'form-control btn btn-primary'])}} 
                                </div>
                            </div>
                            <input type="hidden" name="film_id" value="{{$result->id}}">
                        {!! Form::close() !!}
                    @endauth

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
