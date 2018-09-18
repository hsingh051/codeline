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
                <div class="card-header">Add New Film</div>

                <div class="card-body">
                    {!! Form::open(['url' => 'film/add']) !!}
                        <div class="row">
                            <label class="col-md-3"><strong>Name</strong>:</label>
                            <div class="col-md-8"> 
                                {{ Form::text('name', '', ['class' => 'form-control required','required'])}} 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-md-3"><strong>Description</strong>:</label>
                            <div class="col-md-8"> 
                                {{ Form::textarea('description', '', ['class' => 'form-control','required'])}} 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-md-3"><strong>Realease Date</strong>:</label>
                            <div class="col-md-8"> 
                                {{ Form::date('realease_date', '', ['class' => 'form-control','required'])}} 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-md-3"><strong>Rating</strong>:</label>
                            <div class="col-md-8"> 
                                {{ Form::radio('rating', '1', ['class' => 'form-control'])}} 1 
                                {{ Form::radio('rating', '2', ['class' => 'form-control'])}} 2
                                {{ Form::radio('rating', '3', ['class' => 'form-control'])}} 3
                                {{ Form::radio('rating', '4', ['class' => 'form-control'])}} 4
                                {{ Form::radio('rating', '5', ['class' => 'form-control'])}} 5
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-md-3"><strong>Ticket Price</strong>:</label>
                            <div class="col-md-8"> 
                                {{ Form::number('ticket_price', '', ['placeholder' => '$','class' => 'form-control','required'])}} 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-md-3"><strong>Country</strong>:</label>
                            <div class="col-md-8"> 
                                {{ Form::text('country', '', ['placeholder' => '','class' => 'form-control','required'])}} 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-md-3"><strong>Genre</strong>:</label>
                            <div class="col-md-8"> 
                                {{ Form::text('genre', '', ['placeholder' => 'Add multiple genre seperate by commas','class' => 'form-control','required'])}} 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-2"> 
                                {{ Form::submit('Submit', ['class' => 'form-control btn btn-primary'])}} 
                            </div>
                        </div>
                        
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
