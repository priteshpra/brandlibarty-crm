@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/adsblock.css') }}">

<div class="page-content">
    <div class="page-content">


        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th id="domainHeader">Select Domain</th>
                        <th id="categoryHeader">Select Category</th>
                        <th>Remove</th>
                    </tr>
                </thead>
            </table>
        </div>

        <button class="upload-button" id="uploadButton1" onclick="handleUploadButton(this)">
            <i class="fas fa-upload"></i>
            Upload
        </button>
        <button class="right-bottom-button" id="uploadButton2" onclick="handleUploadButton(this)">
            <i class="fas fa-upload"></i>
            Upload
        </button>


    </div>

</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script>
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">

                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    // Function to handle upload button click
    function handleUploadButton(button) {
        // Create a hidden file input element
        let fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = 'image/*'; // Specify the file types you want to accept

        // Trigger the file input dialog when this button is clicked
        fileInput.click();

        // Handle file selection
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the selected file
            if (file) {
                // Check if the selected file is an image
                if (file.type.startsWith('image/')) {
                    // Create a FileReader object to read the image
                    let reader = new FileReader();

                    // Closure to capture the file information.
                    reader.onload = function(event) {
                        // Create an image element
                        const imgElement = document.createElement('img');
                        imgElement.onload = function() {
                            // Ensure the image maintains its aspect ratio and fits within a max width and height
                            const maxWidth = 200; // Max width for the displayed image
                            const maxHeight = 200; // Max height for the displayed image
                            let width = this.width;
                            let height = this.height;

                            // Calculate aspect ratio
                            if (width > maxWidth) {
                                height *= maxWidth / width;
                                width = maxWidth;
                            }
                            if (height > maxHeight) {
                                width *= maxHeight / height;
                                height = maxHeight;
                            }

                            // Set the scaled width and height
                            imgElement.width = width;
                            imgElement.height = height;

                            // Determine the position based on which button was clicked
                            if (button.id === 'uploadButton1') {
                                // Position the image slightly towards the right side for left button uploads
                                imgElement.style.position = 'fixed';
                                imgElement.style.top = '50%';
                                imgElement.style.left = 'calc(150px + 200px)'; // Offset to the right from the starting point
                                imgElement.style.transform = 'translate(-50%, -50%)'; // Center vertically and horizontally
                            } else if (button.id === 'uploadButton2') {
                                // Position the image towards the right side for right button uploads
                                imgElement.style.position = 'fixed';
                                imgElement.style.top = '50%';
                                imgElement.style.right = '20px'; // Adjust as needed
                                imgElement.style.transform = 'translate(-50%, -50%)'; // Center vertically and horizontally
                            }

                            // Append the image element to the document body or another container
                            document.body.appendChild(imgElement);
                        };

                        // Set the image source to the reader's result (data URL)
                        imgElement.src = event.target.result;
                    };

                    // Read the image file as a data URL
                    reader.readAsDataURL(file);
                } else {
                    alert('Please select an image file.'); // Handle case where file is not an image
                }
            }
        });

        // Remove the file input element from the DOM after use
        fileInput.style.display = 'none'; // Ensure the file input is hidden
        document.body.appendChild(fileInput); // Append fileInput to the body or another container
    }
</script>
<script>
    // Function to handle click on "Select Domain" header
    document.getElementById('domainHeader').addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent event bubbling to parent elements

        // Check if the dropdown is already open, then do not recreate it
        if (document.getElementById('selectDomain')) {
            return;
        }

        // Create a <select> element for domains
        let selectDomain = document.createElement('select');
        selectDomain.id = 'selectDomain';

        // Array of domain options (replace with your actual options)
        let domainOptions = <?php echo $arrDomain ?>;

        // Create and add options to the select element
        let defaultOption = document.createElement('option');
        defaultOption.text = 'Select Domain';
        defaultOption.disabled = true;
        defaultOption.selected = true;
        selectDomain.add(defaultOption);

        domainOptions.forEach(function(optionText) {
            let option = document.createElement('option');
            option.text = optionText;
            selectDomain.add(option);
        });

        // Append the <select> element to the header cell
        let domainHeader = document.getElementById('domainHeader');
        domainHeader.textContent = ''; // Clear existing text content
        domainHeader.appendChild(selectDomain);
    });

    // Function to handle click on "Select Category" header
    document.getElementById('categoryHeader').addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent event bubbling to parent elements

        // Check if the dropdown is already open, then do not recreate it
        if (document.getElementById('selectCategory')) {
            return;
        }

        // Create a <select> element for categories
        let selectCategory = document.createElement('select');
        selectCategory.id = 'selectCategory';

        // Array of category options (replace with your actual options)
        let categoryOptions = <?php echo $arrCate ?>;

        // Create and add options to the select element
        let defaultOption = document.createElement('option');
        defaultOption.text = 'Select Category';
        defaultOption.disabled = true;
        defaultOption.selected = true;
        selectCategory.add(defaultOption);

        categoryOptions.forEach(function(optionText) {
            let option = document.createElement('option');
            option.text = optionText;
            selectCategory.add(option);
        });

        // Append the <select> element to the header cell
        let categoryHeader = document.getElementById('categoryHeader');
        categoryHeader.textContent = ''; // Clear existing text content
        categoryHeader.appendChild(selectCategory);
    });

    // Close the dropdowns when clicking outside of them
    document.addEventListener('click', function(event) {
        if (event.target.closest('#domainHeader') === null) {
            document.getElementById('domainHeader').textContent = 'Select Domain';
        }
        if (event.target.closest('#categoryHeader') === null) {
            document.getElementById('categoryHeader').textContent = 'Select Category';
        }
    });
</script>
@endsection