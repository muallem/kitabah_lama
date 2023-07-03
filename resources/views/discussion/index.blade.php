@extends('layouts.app')

@section('title', 'Data detail Diskusi')

@section('content_header')
    <h1>Data Detail Diskusi</h1>
@stop

@section('content')
<div class="container">
    @livewire('discussion.detail')

</div>
@endsection