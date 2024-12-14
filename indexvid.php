<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Page</title>
    <style>
        body, html {
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
            font-family: Arial, sans-serif;
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
        <!-- Tambahkan atribut autoplay agar video langsung diputar -->
        <video id="intro-video" playsinline>
            <source src="Asset/Video&Font/IMG_6671.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <button id="skip-button">Skip</button>
    </div>

    <script>
        const video = document.getElementById('intro-video');
        const skipButton = document.getElementById('skip-button');
        const container = document.getElementById('container');

        // Memaksa video diputar dengan suara
        document.addEventListener('DOMContentLoaded', () => {
            video.muted = false; // Pastikan suara video aktif
            video.play().catch(() => {
                console.error("Autoplay gagal. Interaksi pengguna diperlukan.");
            });
        });

        // Tampilkan tombol Skip setelah 10 detik
        setTimeout(() => {
            skipButton.style.display = 'block';
        }, 10000);

        // Fungsi untuk fade-out dan redirect
        const fadeOutAndRedirect = () => {
            container.classList.add('fade-out');
            setTimeout(() => {
                window.location.href = 'pres.php';
            }, 1000);
        };

        // Event ketika video selesai diputar
        video.addEventListener('ended', fadeOutAndRedirect);

        // Event ketika tombol Skip diklik
        skipButton.addEventListener('click', fadeOutAndRedirect);
    </script>
</body>

</html>
