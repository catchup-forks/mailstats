@extends('layouts.app')

@section('contentheader_title')
    Edit project: {{ $project->human_name }}
@endsection
@section('contentheader_description')
    Update {{ $project->human_name }}
@endsection

@section('main-content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', [$project->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                   value="@if(old('name')){{ old('name') }}@else{{ $project->name }}@endif">
            <span class="danger">Only update this if you know what you're doing.</span>
        </div>

        <div>
            <label for="human_name">Human readable name</label>
            <input type="text" name="human_name" id="human_name"
                   value="@if(old('human_name')){{ old('human_name') }}@else{{ $project->human_name }}@endif">
        </div>

        <fieldset title="Default recipient information">
            <legend>Default recipient information</legend>

            <div>
                <label for="recipient_name">Default recipient name</label>
                <input type="text" name="recipient_name" id="recipient_name"
                       value="@if(old('recipient_name')){{ old('recipient_name') }}@else{{ $project->recipient_name }}@endif">
            </div>

            <div>
                <label for="recipient_email">Default recipient e-mail address</label>
                <input type="text" name="recipient_email" id="recipient_email"
                       value="@if(old('recipient_email')){{ old('recipient_email') }}@else{{ $project->recipient_email }}@endif">
            </div>
        </fieldset>

        <fieldset title="Default sender information">
            <legend>Default sender information</legend>

            <div>
                <label for="sender_name">Default sender name</label>
                <input type="text" name="sender_name" id="sender_name"
                       value="@if(old('sender_name')){{ old('sender_name') }}@else{{ $project->sender_name }}@endif">
            </div>

            <div>
                <label for="sender_email">Default sender e-mail address</label>
                <input type="text" name="sender_email" id="sender_email"
                       value="@if(old('sender_email')){{ old('sender_email') }}@else{{ $project->sender_email }}@endif">
            </div>
        </fieldset>

        <button type="submit">Save</button>
    </form>

@endsection