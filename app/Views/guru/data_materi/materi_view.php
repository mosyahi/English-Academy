<!-- materi_view.php -->
<html>
<head>
    <title>File Materi</title>
</head>
<body>
    <?php
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    if ($extension === 'pdf') {
        echo '<embed src="data:application/pdf;base64,' . base64_encode($fileContent) . '" width="100%" height="600px" type="application/pdf">';
    } elseif (in_array($extension, ['png', 'jpg', 'jpeg', 'gif'])) {
        echo '<img src="' . base_url('uploads/file_materi/' . $filename) . '" alt="Materi Image" width="100%">';
    } else {
        echo '<p>File tidak dapat ditampilkan.</p>';
    }
    ?>
</body>
</html>
