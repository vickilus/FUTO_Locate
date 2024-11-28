<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Picture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input[type="file"] {
            display: block;
            margin: 20px auto;
            font-size: 1rem;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background-color: #2980b9;
        }
        #preview {
            margin-top: 20px;
            border: 2px dashed #ddd;
            padding: 10px;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <h1>Upload Profile Picture</h1>
    <div class="form-container">
        <form id="uploadForm">
            <input type="file" id="fileInput" accept="image/*" required>
            <button type="submit">Upload Picture</button>
        </form>
        <img id="preview" src="#" alt="Profile Picture Preview" style="display: none;">
    </div>

    <script>
        const uploadForm = document.getElementById('uploadForm');
        const fileInput = document.getElementById('fileInput');
        const preview = document.getElementById('preview');

        // Preview image before upload
        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

        // Handle form submission
        uploadForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const file = fileInput.files[0];
            if (!file) {
                alert('Please select a file to upload.');
                return;
            }

            const formData = new FormData();
            formData.append('profile_picture', file);

            try {
                const response = await fetch('upload_profile_picture.php', {
                    method: 'POST',
                    body: formData,
                });

                const result = await response.json();

                if (result.success) {
                    alert('Profile picture uploaded successfully!');
                } else {
                    alert('Upload failed: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            }
        });
    </script>
</body>
</html>
