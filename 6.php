<?php

// Telegram bot tokeni
$botToken = "1990990344:AAFBAH4w8ifn7T2nlrWjU4EgOlWC5O0uYIsZ";
// Kanal IDsi
$kanalId = "@t.me/calipcoo";
// Foydalanuvchi IDsi
$foydalanuvchiId = "@t.me/cw_murodov";

// Foydalanuvchi kanalga a'zo ekanligini tekshirish funksiyasi
function foydalanuvchiniTekshirish($botToken, $kanalId, $foydalanuvchiId) {
    // Telegram API orqali a'zolikni tekshirish so'rovi
    $manzil = "https://api.telegram.org/bot$botToken/getChatMember?chat_id=$kanalId&user_id=$foydalanuvchiId";
    $javob = file_get_contents($manzil);
    $natija = json_decode($javob, true);
    
    // Agar foydalanuvchi kanal a'zosi bo'lsa, statusni tekshiramiz
    if ($natija['ok'] && ($natija['result']['status'] == "member" || $natija['result']['status'] == "administrator" || $natija['result']['status'] == "creator")) {
        return true; // Foydalanuvchi obuna bo'lgan
    }
    return false; // Foydalanuvchi obuna bo'lmagan
}

// Foydalanuvchini obuna bo'lishga majburlash
if (!foydalanuvchiniTekshirish($botToken, $kanalId, $foydalanuvchiId)) {
    echo "Iltimos, kanalimizga obuna bo'ling: $kanalId";
    printf("Salom");
} else {
    echo "Siz kanalga obuna bo'lgansiz.";
}

?>
