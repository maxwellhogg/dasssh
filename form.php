<?php

require __DIR__ . '/inc/functions.inc.php';
require __DIR__ . '/inc/db-connect.inc.php';

var_dump($_POST);

?>

<?php require __DIR__ . '/views/header.views.php'; ?>
<h1 class="main-heading">NEW ENTRY</h1>
<form class="form" method="POST" action="form.php">
    <div class="form-section">
        <label class="form-section-item" for="title">Title:</label>
        <input class="form-section-item-input" type="text" id="title" name="title" />
    </div>
    <div class="form-section">
        <label class="form-section-item" for="date">Date:</label>
        <input class="form-section-item-input" type="date" id="date" name="date" />
    </div>
    <div class="form-section">
        <label class="form-section-item" for="entry">Entry:</label>
        <textarea class="form-section-item-input form-section-item-input-textarea" name="entry" id="entry"></textarea>
    </div>
    <button class="entry">
        Save
    </button>
</form>
<?php require __DIR__ . '/views/footer.views.php'; ?>