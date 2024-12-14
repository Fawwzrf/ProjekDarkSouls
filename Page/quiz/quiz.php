<?php
$conn = new mysqli('localhost', 'root', '', 'darksouls');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; // Dummy user ID untuk testing
    $_SESSION['username'] = 'Tester';
}

// Ambil ID soal saat ini dari parameter URL, default ke soal pertama jika tidak ada
$currentQuestionId = isset($_GET['question_id']) ? (int)$_GET['question_id'] : 1;

// Ambil soal saat ini dari database
$questionQuery = "SELECT * FROM questions WHERE id = ?";
$stmt = $conn->prepare($questionQuery);
$stmt->bind_param('i', $currentQuestionId);
$stmt->execute();
$questionResult = $stmt->get_result();
$question = $questionResult->fetch_assoc();
$stmt->close();

if (!$question) {
    // Jika tidak ada soal dengan ID tersebut, redirect ke halaman hasil
    header('Location: result.php');
    exit();
}

// Ambil jawaban untuk soal saat ini
$answersQuery = "SELECT * FROM answers WHERE question_id = ?";
$stmt = $conn->prepare($answersQuery);
$stmt->bind_param('i', $currentQuestionId);
$stmt->execute();
$answersResult = $stmt->get_result();
$stmt->close();

// Proses pengiriman jawaban
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer_id = $_POST['answer'];
    $user_id = $_SESSION['user_id'];

    // Masukkan jawaban ke tabel user_answers
    $stmt = $conn->prepare("INSERT INTO user_answers (user_id, question_id, answer_id) VALUES (?, ?, ?)");
    $stmt->bind_param('iii', $user_id, $currentQuestionId, $answer_id);
    $stmt->execute();
    $stmt->close();

    // Respon kosong untuk fetch
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="quizstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&family=Quintessential&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Dark Souls</h1>
        <div class="quiz">
            <div class="question">
                <p><?= htmlspecialchars($question['question_text']) ?></p>
            </div>
            <div class="answers">
                <?php while ($answer = $answersResult->fetch_assoc()): ?>
                    <div class="answer-box" data-answer-id="<?= $answer['id'] ?>">
                        <?= htmlspecialchars($answer['answer_text']) ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.answer-box').forEach(box => {
            box.addEventListener('click', function () {
                const answerId = this.getAttribute('data-answer-id');
                const questionId = <?= $currentQuestionId ?>;

                // Kirim jawaban ke server menggunakan fetch
                fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `answer=${answerId}&question_id=${questionId}`
                })
                .then(response => response.text())
                .then(() => {
                    // Arahkan ke soal berikutnya
                    window.location.href = `?question_id=${questionId + 1}`;
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>
