<?php
// bot.php - نقطة الدخول للـ webhook
// ضع ملف هذا كـ webhook URL في Telegram أو شغّل من CLI للـ long polling حسب حاجتك.

require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/db.php';

$raw = file_get_contents('php://input');
if (empty($raw)) {
    // بسيط: استجابة فارغة عند طلب GET
    http_response_code(200);
    echo "ok";
    exit;
}
$update = json_decode($raw, true);
if (!$update) {
    http_response_code(200);
    echo "ok";
    exit;
}

$message = $update['message'] ?? $update['edited_message'] ?? null;
if (!$message) {
    // لا ندعم كل أنواع الـ updates الآن
    http_response_code(200);
    echo "ok";
    exit;
}

$text = $message['text'] ?? '';
$parts = preg_split('/\s+/', trim($text));
$cmd = strtolower($parts[0] ?? '');
$args = array_slice($parts, 1);

switch ($cmd) {
    case '/start':
        require_once __DIR__ . '/commands/start.php';
        handle_start($message);
        break;
    case '/products':
        require_once __DIR__ . '/commands/products.php';
        handle_products($message);
        break;
    case '/buy':
    case '/order':
    case '/purchase':
        require_once __DIR__ . '/commands/order.php';
        handle_buy($message, $args);
        break;
    case '/balance':
        // عرض رصيد بسيط
        $pdo = db();
        $stmt = $pdo->prepare('SELECT balance FROM users WHERE telegram_id = :tg');
        $stmt->execute([':tg' => $message['from']['id']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $bal = $row['balance'] ?? 0;
        sendMessage($message['chat']['id'], "رصيدك: {$bal}");
        break;
    case '/admin':
        require_once __DIR__ . '/admin/admin.php';
        handle_admin($message, $args);
        break;
    case '/orders':
        // عرض طلبات المستخدم
        $pdo = db();
        $stmt = $pdo->prepare('SELECT o.id, p.name, o.total, o.status FROM orders o JOIN users u ON o.user_id = u.id JOIN products p ON o.product_id = p.id WHERE u.telegram_id = :tg ORDER BY o.id DESC');
        $stmt->execute([':tg' => $message['from']['id']]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($rows)) {
            sendMessage($message['chat']['id'], "لا توجد طلبات لديك.");
        } else {
            $lines = [];
            foreach ($rows as $r) {
                $lines[] = "#{$r['id']} | {$r['name']} | {$r['total']} | {$r['status']}";
            }
            sendMessage($message['chat']['id'], implode("\n", $lines));
        }
        break;
    case '/support':
        sendMessage($message['chat']['id'], "للدعم: راسل المشرف أو استخدم /admin (إذا كنت مشرفاً)");
        break;
    default:
        // رسائل عامة
        if (!empty($text)) {
            sendMessage($message['chat']['id'], "أمر غير معروف. استخدم /products لعرض المنتجات.");
        }
        break;
}

http_response_code(200);
echo "ok";
