<?php
// include ('file/header.php');
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - المهندس</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin-right: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            object-fit: cover; /* لضمان وضوح الصورة */
        }
        .description {
            flex: 1;
        }
        .description h2 {
            margin: 0 0 10px 0; /* المسافة بين الاسم والصورة */
            color: #333;
        }
        .description p {
            margin-top: 10px;
            line-height: 1.6;
        }
        .experience, .education {
            margin-top: 20px;
            background: #e0f7fa;
            padding: 15px;
            border-radius: 5px;
        }
        .experience h3, .education h3 {
            color: #00796b;
        }
        .contact-info {
            text-align: center;
            margin-top: 20px;
        }
        .contact-info a {
            color: #4CAF50;
            text-decoration: none;
            margin: 0 10px;
            font-size: 24px;
        }
        .contact-info a:hover {
            color: #00796b;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 0.9em;
            color: #777;
        }
        @media (max-width: 600px) {
            .header {
                flex-direction: column;
                align-items: center;
            }
            .header img {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>عبدالله محمد العمراني -Eng</h1>
        <div class="header">
            <img src="controlpanel/uplaud/صورتي.jpg" alt="صورة عبدالله محمد">
            <div class="description">
                <h2>المهندس/ عبدالله محمد العمراني</h2>
                <p>أنا مهندس برمجيات ذو خبرة واسعة في تطوير التطبيقات والمواقع الإلكترونية. أعمل بجد لتقديم حلول تقنية مبتكرة تلبي احتياجات العملاء. أستمتع بتحديات البرمجة وأحب التعلم المستمر في هذا المجال المتطور بسرعة.</p>
            </div>
        </div>
        <div class="experience">
            <h3>الخبرات:</h3>
            <ul>
                <li>تطوير تطبيقات الويب باستخدام PHP وJavaScript.</li>
                <li>إنشاء مواقع إلكترونية متجاوبة باستخدام HTML وCSS.</li>
                <li>تجربة في إدارة قواعد البيانات باستخدام MySQL.</li>
                <li>المشاركة في مشاريع برمجية متعددة كجزء من فريق عمل.</li>
                <li>تحسين أداء التطبيقات وتقديم الدعم الفني.</li>
            </ul>
        </div>
        <div class="education">
            <h3>المؤهلات الدراسية:</h3>
            <ul>
                <li>بكاليوس في علوم الحاسوب.</li>
                <li>دورات متقدمة في جميع لغات البرمجة الرئيسية.</li>
                <li>شهادات احترافية في تطوير البرمجيات.</li>
            </ul>
        </div>
        <div class="contact-info">
            <h3>معلومات الاتصال:</h3>
            <p>رقم الهاتف: <a href="tel:+967770999042">+967 770999042</a></p>
            <p>
                <a href="https://wa.me/123456789" title="واتس آب"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.facebook.com" title="فيسبوك"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com" title="تويتر"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com" title="لينكد إن"><i class="fab fa-linkedin-in"></i></a>
            </p>
        </div>
    </div>
    <footer>
        &copy; 2025 عبدالله محمد العمراني. جميع الحقوق محفوظة.
    </footer>
</body>
</html>



<!-- <?php
// include ('file/header.php');
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - المهندس</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
        }
        h1 {
            text-align: center;
            color: #4CAF50; /* لون جديد */
            margin-bottom: 20px;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin-right: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .description {
            flex: 1;
        }
        .description h2 {
            margin: 0;
            color: #333;
        }
        .description p {
            margin-top: 10px;
            line-height: 1.6;
        }
        .experience {
            margin-top: 20px;
            background: #e0f7fa; /* خلفية جديدة */
            padding: 15px;
            border-radius: 5px;
        }
        .experience h3 {
            color: #00796b; /* لون جديد */
        }
        .contact-info {
            text-align: center;
            margin-top: 20px;
        }
        .contact-info a {
            color: #4CAF50; /* لون جديد */
            text-decoration: none;
            margin: 0 10px;
            font-size: 24px;
        }
        .contact-info a:hover {
            color: #00796b; /* لون جديد */
        }
        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>عبدالله محمد العمراني -Eng</h1>
        <div class="header">
            <img src="controlpanel/uplaud/صورتي.jpg" alt="صورة عبدالله محمد">
            <div class="description">
                <h2>المهندس/ عبدالله محمد العمراني</h2>
                <p>أنا مهندس برمجيات ذو خبرة واسعة في تطوير التطبيقات والمواقع الإلكترونية. أعمل بجد لتقديم حلول تقنية مبتكرة تلبي احتياجات العملاء. أستمتع بتحديات البرمجة وأحب التعلم المستمر في هذا المجال المتطور بسرعة.</p>
            </div>
        </div>
        <div class="experience">
            <h3>الخبرات:</h3>
            <ul>
                <li>تطوير تطبيقات الويب باستخدام PHP وJavaScript.</li>
                <li>إنشاء مواقع إلكترونية متجاوبة باستخدام HTML وCSS.</li>
                <li>تجربة في إدارة قواعد البيانات باستخدام MySQL.</li>
                <li>المشاركة في مشاريع برمجية متعددة كجزء من فريق عمل.</li>
                <li>تحسين أداء التطبيقات وتقديم الدعم الفني.</li>
            </ul>
        </div>
        <div class="contact-info">
            <h3>معلومات الاتصال:</h3>
            <p>رقم الهاتف: <a href="tel:+967770999042">+967 770999042</a></p>
            <p>
                <a href="https://wa.me/123456789" title="واتس آب"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.facebook.com" title="فيسبوك"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com" title="تويتر"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com" title="لينكد إن"><i class="fab fa-linkedin-in"></i></a>
            </p>
        </div>
    </div>
    <footer>
        &copy; 2025 عبدالله محمد العمراني. جميع الحقوق محفوظة.
    </footer>
</body>
</html> -->