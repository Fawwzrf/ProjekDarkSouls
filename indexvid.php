<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Page</title>
    <style>

        body,
        html {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: black;
        }

        video {
            width: 100vw;
            height: 100vh;
            object-fit: cover;
        }

        #skip-button {
            position: absolute;
            bottom: 20px;
            right: 30px;
            padding: 5px 30px;
            font-family: OptimusPrincepsSemiBold;
            background-color: rgba(67, 34, 38, 0.8);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 32px;
            display: none;
            transition: background-color 0.3s ease;
        }

        #skip-button:hover {
            background-color: #5a2d2f;
        }

        #container {
            position: relative;
            width: 100vw;
            height: 100vh;
            opacity: 1;
            transition: opacity 1s ease-in-out;
        }

        #container.fade-out {
            opacity: 0;
        }

    </style>
</head>

<body>
    <div id="container">
        <video id="intro-video" autoplay>
            <source src="Asset/Video&Font/IMG_6671.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <button id="skip-button">Skip</button>
    </div>

    <script>
        const video = document.getElementById('intro-video');
        const skipButton = document.getElementById('skip-button');
        const container = document.getElementById('container');

        // Show the skip button after 10 seconds
        setTimeout(() => {
            skipButton.style.display = 'block';
        }, 10000);

        // Function to handle fade out and redirect
        const fadeOutAndRedirect = () => {
            container.classList.add('fade-out'); // Add fade-out class
            setTimeout(() => {
                window.location.href = 'index.php'; // Redirect after fade out
            }, 1000); // Match the duration of the CSS transition
        };

        // Redirect when the video ends
        video.addEventListener('ended', fadeOutAndRedirect);

        // Redirect when the skip button is clicked
        skipButton.addEventListener('click', fadeOutAndRedirect);
    </script>
</body>

</html>