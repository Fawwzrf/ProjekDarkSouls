<?php
$conn = new mysqli('localhost', 'root', '', 'darksouls');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$userId = $_SESSION['user_id'];

// Hitung poin untuk setiap covenant berdasarkan jawaban pengguna
$stmt = $conn->prepare("
    SELECT a.covenant_id, SUM(a.weight) AS total_points
    FROM user_answers ua
    JOIN answers a ON ua.answer_id = a.id
    WHERE ua.user_id = ?
    GROUP BY a.covenant_id
    ORDER BY total_points DESC
    LIMIT 1
");
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$covenantData = $result->fetch_assoc();
$stmt->close();

if ($covenantData && $covenantData['covenant_id']) {
    // Ambil nama dan deskripsi covenant yang cocok
    $stmt = $conn->prepare("SELECT name, description FROM covenants WHERE id = ?");
    $stmt->bind_param('i', $covenantData['covenant_id']);
    $stmt->execute();
    $covenant = $stmt->get_result()->fetch_assoc();
    $stmt->close();
} else {
    // Jika tidak ada hasil
    $covenant = [
        'name' => 'Tidak Diketahui',
        'description' => 'Jawaban Anda tidak cocok dengan covenant manapun. Pastikan Anda menyelesaikan kuis atau coba lagi.'
    ];
}
?>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Neucha&family=Oranienbaum&family=Quintessential&display=swap"
        rel="stylesheet">
</head>

<body>
    <iframe width="0" height="0" scrolling="no" frameborder="no" style="display: none;"
        src="https://w.soundcloud.com/player/?url=https%3A//soundcloud.com/praise-the-music/gravelord-nito&color=%23ff5500&auto_play=true&loop=true">
    </iframe>
    <div class="container">
        <div class="nav">
            <div class="navtitle">
                <nav class="title">
                    <h1>DARK SOULS</h1>
                </nav>
                <nav class="img"><img src="../../Asset/Profile/Profile.png" alt=""></nav>
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
                <div class="quizcontain">
                    <div class="quiz-title">
                        <h1>Which Convenant</h1>
                        <h3>Do You Belong To?</h3>
                    </div>
                    <button class="btnquiz" onclick="window.location.href='../quiz/quiz.php'">Start The Quiz</button>
                    <div class="quiz-desk">
                        <p>Are you destinted be a blade of vengance</p>
                        <p>or a someone on the flame</p>
                    </div>
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
                        <img src="../../Asset/About/char.png" alt="Character Image">
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
                        <img src="../../Asset/About/char.png" alt="Character Image">
                    </div>
                </div>
            </div>
            <div id="profile" class="content-section">
                <div class="profile-container">

                    <div class="left">
                        <div class="border">
                            <div class="border-container">
                                <img src="../../Asset/Profile/border.png" alt="">
                            </div>
                            <div class="border-content">
                                <div class="content-char">
                                    <img id="cov-char-left"
                                        src="../../Asset/Profilee convenant/Gravelord Servant/Nito, First of the Dead.png"
                                        alt="">
                                </div>
                                <div class="content-main">
                                    <table>
                                        <tr>
                                            <td><img src="../../Asset/Register login/mahkota.png" alt=""></td>
                                            <td>
                                                <p id="username" class="info-text">
                                                    <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../../Asset/Register login/tameng.png" alt=""></td>
                                            <td>
                                                <p id="email" class="info-text">
                                                    <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><button class="btnstartagn"
                                                    onclick="window.location.href='../quiz/quiz.php'">Start
                                                    Again</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="cov-name-left">
                            <img src="../../Asset/Profilee convenant/Darkwhraith/Buku.png" alt="">
                            <p id="cov-name" class="cov-name">Gravelord Servant</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="right-top">
                            <div class="logo" id="logo">
                                <img src="../../Asset/Profilee convenant/Gravelord Servant/Logo.png" alt="">
                            </div>
                            <div class="covenant">
                                <p id="nickname" class="nickname">As a fearless leader</p>
                                <p id="cov-name" class="cov-name">Gravelord Servant</p>
                            </div>
                            <div class="logo" id="logo">
                                <img src="../../Asset/Profilee convenant/Gravelord Servant/Logo.png" alt="">
                            </div>
                        </div>
                        <div class="right-mid">
                            <div class="welcome">
                                <p>Welcome to </p>
                                <p id="cov-name">Gravelord Servant</p>
                            </div>
                            <div class="cov-desk">
                                <p id="cov-desk">Gravelord Servant melambangkan kehancuran, kekacauan, dan kematian.
                                    Covenant ini
                                    adalah kebalikan dari tema penyembuhan atau perlindungan, menyoroti sisi gelap
                                    dan tak terelakkan dari siklus kehidupan dan kematian.</p>
                            </div>
                        </div>
                        <div class="right-bottom">
                            <p id="cov-name" class="cov-name">Gravelord Servant</p>
                            <div class="cov-alliance">
                                <div class="cov-img-1">
                                    <img src="../../Asset/Profilee convenant/Gravelord Servant/Nito, First of the Dead_.png"
                                        alt="">
                                </div>
                                <div class="cov-img-2">
                                    <img src="../../Asset/Profilee convenant/Gravelord Servant/Necromancer.png" alt="">
                                </div>
                                <div class="cov-img-3">
                                    <img src="../../Asset/Profilee convenant/Gravelord Servant/skeleton.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showContent(section) {
            const sections = document.querySelectorAll('.content-section');

            sections.forEach((sectionElement) => {
                if (sectionElement.id === section) {
                    // Tambahkan kelas aktif dengan sedikit jeda
                    setTimeout(() => {
                        sectionElement.classList.add('active');
                        sectionElement.style.display = 'block';
                    }, 50);
                } else {
                    // Hapus kelas aktif untuk bagian yang lain
                    sectionElement.classList.remove('active');
                    setTimeout(() => {
                        sectionElement.style.display = 'none';
                    }, 500); // Sesuaikan durasi dengan CSS transition
                }
            });

            // Ubah latar belakang jika diperlukan
            if (section === 'profile') {
                document.body.classList.add('active-profile');
            } else {
                document.body.classList.remove('active-profile');
            }
        }

        // Default menampilkan bagian quiz saat halaman dimuat
        window.onload = function () {
            showContent('quiz');
        };
    </script>
</body>

</html>