<?php
// config.php
// ضع متغيرات البيئة: TELEGRAM_BOT_TOKEN و ADMIN_TELEGRAM_ID
return [
    'bot_token' => getenv('TELEGRAM_BOT_TOKEN') ?: '',
    'admin_id' => getenv('ADMIN_TELEGRAM_ID') ?: '',
    'db_path' => __DIR__ . '/data/database.sqlite',
];
