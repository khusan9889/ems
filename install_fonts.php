<?php
$directory = 'public/Noto_Sans/static'; // Shriftlar joylashgan katalog
$files = glob($directory . '/*.ttf'); // Faqat .ttf kengaytmali fayllarni qidirish

foreach ($files as $file) {
    $font = basename($file, '.ttf'); // Fayl nomidan kengaytmani olib tashlash
    echo "O'rnatilmoqda: $font\n";
    system("php load_font.php Noto_Sans '$file'"); // Har bir shrift uchun load_font.php ni ishga tushirish
}
