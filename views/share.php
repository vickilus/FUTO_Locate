<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share File to Social Media</title>
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
            margin-bottom: 20px;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        input[type="file"] {
            display: block;
            margin-bottom: 20px;
            width: 100%;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 100%;
            font-size: 1rem;
        }
        button:hover {
            background-color: #2980b9;
        }
        .share-links {
            margin-top: 20px;
        }
        .share-links a {
            display: block;
            margin: 5px 0;
            color: #3498db;
            text-decoration: none;
        }
        .share-links a:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Share File to Social Media</h1>
    <div class="form-container">
        <form id="uploadForm">
            <input type="file" id="fileInput" required>
            <button type="submit">Upload & Generate Share Links</button>
        </form>
        <div class="share-links" id="shareLinks"></div>
    </div>
    
    <script>
        const uploadForm = document.getElementById('uploadForm');
        const shareLinksDiv = document.getElementById('shareLinks');

        uploadForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const fileInput = document.getElementById('fileInput');
            const file = fileInput.files[0];
            if (!file) {
                alert('Please select a file to upload.');
                return;
            }

            const formData = new FormData();
            formData.append('file', file);

            try {
                const response = await fetch('../public/upload.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    const fileUrl = result.fileUrl;

                    // Generate social media share links
                    const whatsappLink = `https://api.whatsapp.com/send?text=Check this out: ${encodeURIComponent(fileUrl)}`;
                    const telegramLink = `https://t.me/share/url?url=${encodeURIComponent(fileUrl)}&text=Check this out`;
                    const facebookLink = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(fileUrl)}`;
                    const twitterLink = `https://twitter.com/intent/tweet?url=${encodeURIComponent(fileUrl)}&text=Check this out!`;
                    
                    shareLinksDiv.innerHTML = `
                        <h2>Share Links</h2>
                        <a href="${whatsappLink}" target="_blank">Share on WhatsApp</a>
                        <a href="${telegramLink}" target="_blank">Share on Telegram</a>
                        <a href="${facebookLink}" target="_blank">Share on Facebook</a>
                        <a href="${twitterLink}" target="_blank">Share on Twitter</a>
                        
                    `;
                } else {
                    alert('File upload failed. Please try again.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            }
        });
    </script>

<a href="../views/home.php?action=home">Home Page</a>
</body>
</html>
