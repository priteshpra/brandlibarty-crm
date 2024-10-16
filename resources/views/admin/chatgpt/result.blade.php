@extends('layouts.admin')
@section('content')
<div class="page-content">
    <h1>Generated Text:</h1>
    <p>{!! $generatedText !!}</p>

    <a href="{{ URL('/openai-response') }}">Try another prompt</a>
</div>
@endsection