@extends('layouts.app')
@foreach($article as $value)
    {{ $value->title }}
@endforeach
