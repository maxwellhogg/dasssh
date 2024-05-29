<?php

require __DIR__ . '/inc/functions.inc.php';
require __DIR__ . '/inc/db-connect.inc.php';

date_default_timezone_set('Etc/GMT+0');

$perPage = 6;
$page = $_GET['page'] ?? 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $perPage;

$stmtCount = $pdo->prepare('SELECT COUNT(*) AS `count` FROM `entries`');
$stmtCount->execute();
$count = $stmtCount->fetch(PDO::FETCH_ASSOC)['count'];

$numPages = ceil($count / $perPage);

$stmt = $pdo->prepare('SELECT * FROM `entries` ORDER BY `date` DESC, `id` DESC LIMIT :perPage OFFSET :offset');
$stmt->bindValue('perPage', (int) $perPage, PDO::PARAM_INT);
$stmt->bindValue('offset', (int) $offset, PDO::PARAM_INT);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php require __DIR__ . '/views/header.views.php'; ?>
<h1 class="main-heading">Messages</h1>
<?php foreach ($results as $result): ?>
<div class="card">
    <?php if (!empty($result['image'])): ?>
        <div class="image-container">
            <img class="thumbnail" src="uploads/<?= esc($result['image']); ?>" alt="">
        </div>
    <?php endif; ?>
    <div class="content-container">
        <?php 
            $dateExploded = explode('-', $result['date']);
            $timestamp = mktime(12, 0, 0, $dateExploded[1], $dateExploded[2], $dateExploded[0]);
        ?>
        <div class="content-date"><?= esc(date('jS-M-Y', $timestamp)); ?></div>
        <h2 class="card-heading"><?= esc($result['title']); ?></h2>
        <p class="content-description"><?= nl2br(esc($result['article'])); ?></p>
    </div>
</div>
<?php endforeach; ?>
<?php if ($numPages > 1): ?>
    <ul class="pagination">
        <?php if ($page > 1): ?>
            <li class="pagination-item">
                <a class="pagination-link pagination-link-arrow" href="index.php?<?= http_build_query(['page' => $page - 1]); ?>">&laquo;</a>
            </li>
        <?php endif ?>
        <?php for($x = 1; $x <= $numPages; $x++): ?>
            <li class="pagination-item">
                <a 
                    class="pagination-link <?php if ($page === $x): ?>pagination-link-active<?php endif; ?>"
                    href="index.php?<?= http_build_query(['page' => $x]); ?>">
                    <?= esc($x); ?>
                </a>
            </li>
        <?php endfor; ?>
        <?php if ($page < $numPages): ?>
            <li class="pagination-item">
                <a class="pagination-link pagination-link-arrow" href="index.php?<?= http_build_query(['page' => $page + 1]) ?>">&raquo;</a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<?php require __DIR__ . '/views/footer.views.php'; ?>