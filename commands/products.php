<?php
// commands/products.php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../db.php';

function handle_products($message) {
    $chat_id = $message['chat']['id'];
    $pdo = db();
    $stmt = $pdo->query('SELECT id, code, name, price, stock FROM products ORDER BY id');
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($items)) {
        sendMessage($chat_id, "لا توجد منتجات متاحة حاليًا.");
        return;
    }
    $lines = [];
    foreach ($items as $p) {
        $lines[] = "ID: {$p['id']} | {$p['name']} | السعر: {$p['price']} | المتبقي: {$p['stock']}";
    }
    $text = "قائمة المنتجات:\n" . implode("\n", $lines) . "\n\nللطلب: /buy <ID>";
    sendMessage($chat_id, $text);
}
