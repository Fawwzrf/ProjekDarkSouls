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

    // Redirect ke soal berikutnya
    $nextQuestionId = $currentQuestionId + 1;
    header("Location: ?question_id=$nextQuestionId");
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&family=Quintessential&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Dark Souls</h1>
        <form method="POST" action="">
        <div class="quiz">
            <div class="question">
                <p><?= htmlspecialchars($question['question_text']) ?></p>
                <?php while ($answer = $answersResult->fetch_assoc()): ?>
                </div>
                
                <div class="answer">
                    <label>
                        <input type="radio" name="answer" value="<?= $answer['id'] ?>" required>
                        <?= htmlspecialchars($answer['answer_text']) ?>
                    </label>
                <?php endwhile; ?>
            </div>
                </div>
            <button type="submit">Kirim Jawaban</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
