@extends('layouts.default')

@section('menu_items')
    @if(isset($paste->ip) && strcmp($paste->ip, Request::getClientIp()) == 0)
        <button id="views">views {{ $paste->views }}</button>
        <button id="delete">delete</button>
    @endif
    @if(isset($paste->parent_id) && $paste->parent_id != null)
        <a href="{{ url($paste->parent->slug) }}"><button id="parent">parent</button></a>
    @endif
    <button id="save">save</button>
    @if(isset($paste->modsCount) && $paste->modsCount > 0)
        <a href="{{ url($paste->slug . '/mods') }}"><button id="parent">mods ({{ $paste->modsCount }})</button></a>
    @endif
@stop

@section('content')
    <div id="linenumbers"></div>
    <div id="content"><pre><code></code></pre></div>
    <textarea spellcheck="false" autocomplete="off" autofocus="true" id="editor" name="code">{{ $paste->code or '' }}</textarea>
    <input type="hidden" name="parent_id" id="parent_id" value="{{ $paste->id or '' }}">
    <div id="caret"></div>
    <div class="hide" id="overlay"></div>
    <div class="modal hide" id="success-modal"></div>
    <div class="modal hide" id="error-modal"></div>
@stop