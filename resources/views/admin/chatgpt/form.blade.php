@extends('layouts.admin')
@section('content')
<div class="page-content">
    <form action="{{ URL('openai/generate') }}" method="POST">
        @csrf
        <div>
            <label for="prompt">Enter your prompt:</label>
            <textarea id="prompt" class="form-control" name="prompt" rows="4" cols="50"></textarea>
        </div>
        <div>
            <button type="submit">Generate Text</button>
        </div>
    </form>
</div>
@endsection