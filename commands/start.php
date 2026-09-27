<?php
// commands/start.php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../db.php';

function handle_start($message) {
    $chat_id = $message['chat']['id'];
    $from = $message['from'];
    $username = $from['username'] ?? null;
    $telegram_id = $from['id'];

    $pdo = db();
    $stmt = $pdo->prepare('INSERT OR IGNORE INTO users(telegram_id, username) VALUES(:tg, :un)');
    $stmt->execute([':tg' => $telegram_id, ':un' => $username]);

    $text = "أهلًا! هذا بوت متجر رقمي.\n\nالأوامر المتاحة:\n/products - عرض المنتجات\n/buy <id> - شراء منتج بـ المعرف\n/balance - رصيدك\n/orders - طلباتك\n/support - الدعم";
    sendMessage($chat_id, $text);
}
