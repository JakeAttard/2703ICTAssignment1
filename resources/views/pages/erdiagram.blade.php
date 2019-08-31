@extends('layouts.master')

@section('title')
    ERD Diagram
@endsection

@section('contentContainer')
    <div class="erdiagramTitle">
        <h3>Entity Relationship Diagram</h3>
    </div>
    <img src="{{asset('images/erdiagram.png')}}" class="ERDiagram" alt="ERDiagram">
@endsection('contentContainer')