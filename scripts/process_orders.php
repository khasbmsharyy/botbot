<?php
// scripts/process_orders.php
// Script to be run by admin to process pending orders or by cron
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../includes/helpers.php';
$pdo = db();

$pending = $pdo->query("SELECT o.id, o.user_id, o.product_id, o.total, u.telegram_id, p.name FROM orders o JOIN users u ON o.user_id = u.id JOIN products p ON o.product_id = p.id WHERE o.status = 'pending' LIMIT 50")->fetchAll(PDO::FETCH_ASSOC);
foreach ($pending as $o) {
    // Here you'd integrate with your delivery mechanism.
    // For demo we mark as completed and notify user.
    $stmt = $pdo->prepare('UPDATE orders SET status = :status WHERE id = :id');
    $stmt->execute([':status' => 'completed', ':id' => $o['id']]);

    // notify user via Telegram
    $config = require __DIR__ . '/../config.php';
    if (!empty($config['bot_token'])) {
        sendMessage($o['telegram_id'], "طلبك #{$o['id']} للمنتج {$o['name']} اكتمل. شكراً لك.");
    }
}

echo "Processed: " . count($pending) . " orders\n";
