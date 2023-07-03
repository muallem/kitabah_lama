@extends('layouts.app')

@section('title', 'Data detail Skripsi')

@section('content_header')
    <h1>Data Detail Skripsi</h1>
@stop

@section('content')
<div class="container">
    {{session()->get('user_id')}}
    <button type="button" class="btn btn-success btn-icon-split mb-4" data-bs-toggle="modal" data-bs-target="#detailModal"
        wire:click="resetInput">
        Tambah Baru
    </button>

    @livewire('thesis.detail')

    <div class="card">
        <div class="card-body">
            @livewire('thesis.datatable')
        </div>
    </div>
    @livewire('discussion.detail')
</div>
@endsection