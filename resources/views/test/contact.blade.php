@extends('templates.index')

@section('content')
Kontak saya :
	@if (count($contact))
	<ul>
		@foreach($contact as $contacts)
			<li>{{ $contacts }}</li>
		@endforeach
	</ul>

	@else
	<p>
		Nomor kontak tidak ada
	</p>
	@endif
@stop
