<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="antialiased bg-light d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="/submit" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow bg-white">
                    @csrf <!-- Insert CSRF token here -->
                    <h2 class="text-center mb-4">User Form</h2>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">User Image:</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <img id="image-preview" style="display: none;" class="mt-3 img-thumbnail">
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const imageInput = $('#image');
        const imagePreview = $('#image-preview');

        imageInput.on('change', function () {
            const file = imageInput[0].files[0];

            if (file) {
                if (!file.type.startsWith('image/')) {
                    alert('Please select a valid image.');
                    imageInput.val('');
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    alert('Image size should be less than 2MB.');
                    imageInput.val('');
                    return;
                }

                const reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.attr('src', e.target.result);
                    imagePreview.css('display', 'block');
                };

                reader.readAsDataURL(file);
            }
        });
    });
</script>
</html>
