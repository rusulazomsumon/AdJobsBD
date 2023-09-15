@extends('errors::layout') 

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
@section('details', __('We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?'))
@section('btntxt', __('Back To Home'))
@section('btnurl', __('/'))

