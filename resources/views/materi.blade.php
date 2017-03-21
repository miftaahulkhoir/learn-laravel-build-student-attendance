@extends('master')

@section('content')

@if(count($data))
  @foreach($data as $datas)
    {{$datas}}
  @endforeach
@else
  <p>
    gak ada
  </p>
  @endif
@stop
