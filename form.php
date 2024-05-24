<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Nokora:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Scrippt</title>
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-container">
                <a class="logo" href="index.php">
                    SCRIBBBLE
                </a>
                <a class="entry" href="form.php">
                + Add Entry
                </a>
            </div>
        </div>
    </nav>
    <main>
        <h1 class="main-heading">NEW SCRIBBBLE</h1>
        <div class="container">
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
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="container-column">
                <a class="logo" href="index.php">
                    SCRIBBBLE
                </a>
                <div class="social-icons-container">
			        <a class="social-icons-link" href="#"><i class="fa fa-github" style="font-size:30px;color:var(--main)"></i></a>
                    <a class="social-icons-link" href="#"><i class="fa fa-linkedin" style="font-size:30px;color:var(--main)"></i></a>
                    <a class="social-icons-link" href="#"><i class="fa fa-instagram" style="font-size:30px;color:var(--main)"></i></a>
		        </div>
                <div class="copyright">App design by <a class="copyright-link" href=#">webDevMax</a> &#169;2024</div>
            </div>
        </div>
    </footer>
</body>
</html>