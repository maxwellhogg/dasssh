<?php

require __DIR__ . '/inc/functions.inc.php';
require __DIR__ . '/inc/db-connect.inc.php';

if (!empty($_POST))
{
    $user       =   (string) ($_POST['user'] ?? '');
    $title      =   (string) ($_POST['title'] ?? '');
    $date       =   (string) ($_POST['date'] ?? '');
    $article    =   (string) ($_POST['entry'] ?? '');

    if (!empty($_FILES) && !empty($_FILES['image'])) {
        if ($_FILES['image']['error'] === 0 && $_FILES['image']['size'] !== 0) {
            $removedExtension = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
            $name = preg_replace('/[^a-zA-Z0-9]/', '', $removedExtension);
            $originalImage = $_FILES['image']['tmp_name'];
            $imageDestinationExt = $name .  '-' . time() . '.jpg';
            $imageDestination = __DIR__ . '/uploads/' . $imageDestinationExt;
            $imageSize = getimagesize($originalImage);
            if (!empty($imageSize)) {
                [$width, $height] = $imageSize;
                $maxDimensions = 400;
                $scaleFactor = $maxDimensions / max($width, $height);
                $newWidth = $width * $scaleFactor;
                $newHeight = $height * $scaleFactor;
                $im = imagecreatefromjpeg($originalImage);
                if (!empty($im)) {
                    $newImage = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresampled($newImage, $im, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);    
                    imagejpeg($newImage, $imageDestination);
                }
            }            
        }
    }

    $stmt = $pdo->prepare('INSERT INTO `entries` (`user`, `title`, `date`, `article`, `image`) VALUES (:user, :title, :date, :article, :image)');
    $stmt->bindValue(':user', $user);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':article', $article);
    $stmt->bindValue(':image', $imageDestinationExt);
    $stmt->execute();

    // echo '<a class="continue" href="index.php">Click here to go back to the message board</a>';
    include 'inc/return-to.inc.php';
    die();
}

?>

<?php require __DIR__ . '/views/header.views.php'; ?>
<h1 class="main-heading">NEW ENTRY</h1>
<form class="form" method="POST" action="form.php" enctype="multipart/form-data">
    <div class="form-section">
        <label class="form-section-item" for="name">Your Name:</label>
        <input class="form-section-item-input" type="text" id="user" name="user" required />
    </div>
    <div class="form-section">
        <label class="form-section-item" for="title">Title:</label>
        <input class="form-section-item-input" type="text" id="title" name="title" required />
    </div>
    <div class="form-section">
        <label class="form-section-item" for="date">Date:</label>
        <input class="form-section-item-input" type="date" id="date" name="date" required />
    </div>
    <div class="form-section">
        <label class="form-section-item" for="image">Image (JPEG/JPG only):</label>
        <input class="form-section-item-input" type="file" id="image" name="image" required />
    </div>
    <div class="form-section">
        <label class="form-section-item" for="entry">Entry:</label>
        <textarea class="form-section-item-input form-section-item-input-textarea" name="entry" id="entry" required></textarea>
    </div>
    <button class="entry">
        Post
    </button>
</form>
<?php require __DIR__ . '/views/footer.views.php'; ?>