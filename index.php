<?php

require __DIR__ . '/inc/functions.inc.php';
require __DIR__ . '/inc/db-connect.inc.php';

$stmt = $pdo->prepare('SELECT * FROM `entries` ORDER BY `date` DESC, `id` DESC');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php require __DIR__ . '/views/header.views.php'; ?>
<h1 class="main-heading">ARTICLES</h1>
<?php foreach ($results as $result): ?>
<div class="card">
    <div class="image-container">
        <img class="thumbnail" src="images/jason.png" alt="">
    </div>
    <div class="content-container">
        <div class="content-date"><?= esc($result['date']); ?></div>
        <h2 class="card-heading"><?= esc($result['title']); ?></h2>
        <p class="content-description"><?= nl2br(esc($result['article'])); ?></p>
    </div>
</div>
<?php endforeach; ?>
<ul class="pagination">
    <li class="pagination-item">
        <a class="pagination-link pagination-link-arrow" href="#">&laquo;</a>
    </li>
    <li class="pagination-item pagination-item-active">
        <a class="pagination-link pagination-link-active" href="#">1</a></li>
    <li class="pagination-item">
        <a class="pagination-link" href="#">2</a>
    </li>
    <li class="pagination-item">
        <a class="pagination-link" href="#">...</a>
    </li>
    <li class="pagination-item">
        <a class="pagination-link" href="#">9</a>
    </li>
    <li class="pagination-item">
        <a class="pagination-link" href="#">10</a>
    </li>
    <li class="pagination-item">
        <a class="pagination-link pagination-link-arrow" href="#">&raquo;</a>
    </li>
</ul>
<?php require __DIR__ . '/views/footer.views.php'; ?>