@extends('layouts.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="page-content">
    <form id="generateForm">
        <label for="text">Enter Text:</label>
        <input type="text" id="text" name="text" required>
        <button type="submit">Generate Image</button>
    </form>

    <div id="result"></div>
</div>
<script>
    document.getElementById('generateForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const text = document.getElementById('text').value;

        fetch('generate-image', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    text
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('result').innerText = 'Error: ' + data.error;
                } else {
                    const image = document.createElement('img');
                    console.log(data[0]);

                    image.src = 'data:image/jpeg;base64,' + data[0]['base64']; // Assuming the API returns an image URL
                    document.getElementById('result').appendChild(image);
                }
            })
            .catch(error => {
                document.getElementById('result').innerText = 'Error: ' + error;
            });
    });
</script>
@endsection