<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&family=Quintessential&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="nav">
            <div class="navtitle">
                <nav class="title">
                    <h1>DARK SOULS</h1>
                </nav>
                <nav class="img"><img src="/Asset/Profile/Profile.png" alt=""></nav>
            </div>
            <div class="navmenu">
                <ul>
                    <li onclick="showContent('quiz')">Quiz</li>
                    <li onclick="showContent('about')">About</li>
                    <li onclick="showContent('profile')">Profile</li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div id="quiz" class="content-section">
                <div class="quiz-title">
                    <h1>Which Convenant</h1>
                    <h3>Do You Belong To?</h3>
                </div>
                <button class="btnquiz">Start the quiz</button>
                <div class="quiz-desk">
                    <p>Are you destinted be a blade of vengance</p>
                    <p>or a someone on the flame</p>
                </div>
            </div>
            <div id="about" class="content-section">
                <div class="aboutcontain">
                    <h2>DARK SOULS</h2>
                    <div class="abouttext">
                        <p>Dark Souls Covenant Test adalah sebuah kuis interaktif yang dirancang untuk
                            membantu Anda menemukan covenant mana yang paling cocok dengan kepribadian,
                            nilai, dan gaya bermain Anda dalam dunia Dark Souls. Setiap covenant di dalam game
                            memiliki filosofi, tujuan, dan keunikan tersendiri, dan kuis ini memberikan cara
                            menarik untuk mengeksplorasi ikatan Anda dengan salah satunya.</p>
                        <button class="btnabout" onclick="showContent('aboutmore')">Read More</button>
                    </div>
                    <div class="aboutimg">
                        <img src="/Asset/About/char.png" alt="Character Image">
                    </div>
                </div>
            </div>
            <div id="aboutmore" class="content-section">
                <div class="aboutcontain">
                    <h2>Apa itu Covenant di Dark Souls?</h2>
                    <div class="abouttext">
                        <p>Covenant adalah fraksi atau kelompok dalam Dark Souls yang menawarkan mekanika permainan
                        khusus, hadiah unik, dan lore yang mendalam. Bergabung dengan covenant mencerminkan pilihan
                        moral atau takdir pemain di dunia gelap dan penuh bahaya Lordran, Drangleic, atau Lothric. 
                        Beberapa Covenant yang ditampilkan:</p>
                        <ol>
                            <li>Warrior Of Sunlight</li>
                            <li>Princess's Guard</li>
                            <li>Darkwraith</li>
                            <li>Gravelord Servant</li>
                            <li>Forest Hunter</li>
                            <li>Blade of the Darkmoon</li>
                            <li>Chaos Servant</li>
                            <li>Path of the Dragon</li>
                            <li>Undead Legion</li>
                        </ol>
                    </div>
                    <div class="aboutimg">
                        <img src="/Asset/About/char.png" alt="Character Image">
                    </div>
                </div>
            </div>
            <div id="profile" class="content-section">
                <h2>Profile Section</h2>
                <p>Content for Profile.</p>
            </div>
        </div>
    </div>

    <script>
        function showContent(section) {
            const sections = document.querySelectorAll('.content-section');
            sections.forEach((section) => {
                section.style.display = 'none';
            });

            document.getElementById(section).style.display = 'block';
        }

        window.onload = function () {
            showContent('quiz');
        };
    </script>
</body>

</html>