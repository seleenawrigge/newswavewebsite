<?php
include 'db_config.php';

// Directory for uploads
$image_dir = 'uploads/images/';
$pdf_dir = 'uploads/pdfs/';

// Check if directories exist, if not, create them
if (!is_dir($image_dir)) {
    mkdir($image_dir, 0777, true);
}
if (!is_dir($pdf_dir)) {
    mkdir($pdf_dir, 0777, true);
}

$image_file = $image_dir . basename($_FILES["image"]["name"]);
$pdf_file = $pdf_dir . basename($_FILES["pdf"]["name"]);

// Check if image file is an actual image
$check_image = getimagesize($_FILES["image"]["tmp_name"]);
if($check_image === false) {
    die("File is not an image.");
}

// Check if pdf file is an actual pdf
if (mime_content_type($_FILES["pdf"]["tmp_name"]) != 'application/pdf') {
    die("File is not a PDF.");
}

// Move uploaded files to designated directories
if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_file) && move_uploaded_file($_FILES["pdf"]["tmp_name"], $pdf_file)) {
    $image_path = $image_file;
    $pdf_path = $pdf_file;

    // Insert file paths into database
    $stmt = $conn->prepare("INSERT INTO uploads (image_path, pdf_path) VALUES (?, ?)");
    $stmt->bind_param("ss", $image_path, $pdf_path);

    if ($stmt->execute()) {
        header("Location: view.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Sorry, there was an error uploading your files.";
}

$conn->close();
?>
