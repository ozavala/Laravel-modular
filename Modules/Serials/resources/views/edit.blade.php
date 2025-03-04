@extends('layouts.app')
@section('content')
    <div class="card">
        <h1>Edit Serial</h1>
        @include('errors.errors')
        <x-form action="{{route('app.serials.update', $serial->id) }}">
            <x-form.input name="name">{{$serial->name }}</x-form.input>
            <x-form.textarea name="serial" rows="10">{{ $serial->serial}}</xform.textarea>
            <x-form.textarea name="notes" rows="10">{{ $serial->notes }}</xform.textarea>
            <x-form.button>Submit</xform.button>
        </x-form>
    </div>
@endsection