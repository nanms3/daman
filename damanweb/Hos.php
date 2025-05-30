
<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=shopping;charset=utf8", "root", "");
} catch (PDOException $e) {
    die("فشل الاتصال: " . $e->getMessage());
}

$stmt = $pdo->query("SELECT image_path FROM slider");
$slides = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>سلايدر صور</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            direction: rtl;
        }
            .slider-container {
    position: relative;
    width: 80%;
    height: 300px;
    max-width: 800px;
    margin: 50px auto;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.slider {
    display: flex;
    transition: transform 0.6s ease;
    height: 100%;
}

.slide {
    min-width: 100%;
    height: 100%;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
    background-color: #000; /* لتمييز حدود الصورة إذا كانت أصغر */
}


        .controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .controls button {
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            font-size: 30px;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 50%;
            transition: background 0.3s;
        }

        .controls button:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<body>

<div class="slider-container">
<div class="slider" id="slider">
    <?php if (!empty($slides)): ?>
        <?php foreach ($slides as $slide): ?>
            <div class="slide">
                <img src="img/<?= htmlspecialchars($slide['image_path']) ?>" alt="slide">
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="slide">
            <p style="padding: 20px; text-align: center;">لا توجد صور في قاعدة البيانات.</p>
        </div>
    <?php endif; ?>
</div>


    <div class="controls">
        <button id="prev">&#10094;</button>
        <button id="next">&#10095;</button>
    </div>
</div>

<script>
    const slider = document.getElementById('slider');
    const slides = document.querySelectorAll('.slide');
    let index = 0;

    function showSlide(i) {
        if (i >= slides.length) index = 0;
        else if (i < 0) index = slides.length - 1;
        else index = i;

        slider.style.transform = `translateX(-${index * 100}%)`;
    }

    document.getElementById('next').addEventListener('click', () => showSlide(index + 1));
    document.getElementById('prev').addEventListener('click', () => showSlide(index - 1));

    // تلقائي كل 5 ثوانٍ
    setInterval(() => showSlide(index + 1), 5000);

    // دعم السحب على الجوال
    let startX = 0;
    slider.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });

    slider.addEventListener('touchend', (e) => {
        let endX = e.changedTouches[0].clientX;
        if (startX - endX > 50) showSlide(index + 1);
        else if (endX - startX > 50) showSlide(index - 1);
    });
</script>

</body>
</html>
