<?php
// commands/order.php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../db.php';

function handle_buy($message, $args) {
    $chat_id = $message['chat']['id'];
    $from = $message['from'];
    $telegram_id = $from['id'];

    if (empty($args)) {
        sendMessage($chat_id, "استخدم: /buy <product_id>");
        return;
    }
    $product_id = intval($args[0]);
    $pdo = db();
    $pdo->beginTransaction();
    try {
        // Ensure user exists
        $stmt = $pdo->prepare('SELECT id FROM users WHERE telegram_id = :tg');
        $stmt->execute([':tg' => $telegram_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            $stmt = $pdo->prepare('INSERT INTO users(telegram_id, username) VALUES(:tg, :un)');
            $stmt->execute([':tg' => $telegram_id, ':un' => ($from['username'] ?? null)]);
            $user_id = $pdo->lastInsertId();
        } else {
            $user_id = $user['id'];
        }

        $stmt = $pdo->prepare('SELECT id, name, price, stock FROM products WHERE id = :id');
        $stmt->execute([':id' => $product_id]);
        $prod = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$prod) {
            $pdo->rollBack();
            sendMessage($chat_id, "المنتج غير موجود.");
            return;
        }
        if ($prod['stock'] <= 0) {
            $pdo->rollBack();
            sendMessage($chat_id, "المنتج نفد من المخزون.");
            return;
        }
        $total = $prod['price'];
        // إنشاء طلب
        $stmt = $pdo->prepare('INSERT INTO orders(user_id, product_id, quantity, total, status) VALUES(:uid, :pid, 1, :total, :status)');
        $stmt->execute([':uid' => $user_id, ':pid' => $prod['id'], ':total' => $total, ':status' => 'pending']);
        $order_id = $pdo->lastInsertId();
        // خفض من المخزون
        $stmt = $pdo->prepare('UPDATE products SET stock = stock - 1 WHERE id = :id');
        $stmt->execute([':id' => $prod['id']]);

        $pdo->commit();

        $msg = "تم إنشاء الطلب #{$order_id} للمنتج {$prod['name']}\nالمجموع: {$total}\nحالة الطلب: قيد الانتظار\nسيقوم المشرف بمراجعة الطلب وإرساله.";
        sendMessage($chat_id, $msg);

        // إشعار للمشرف
        $config = require __DIR__ . '/../config.php';
        if (!empty($config['admin_id'])) {
            sendMessage($config['admin_id'], "طلب جديد: #{$order_id} من @" . ($from['username'] ?? $telegram_id));
        }

    } catch (Exception $e) {
        $pdo->rollBack();
        error_log($e->getMessage());
        sendMessage($chat_id, "حدث خطأ أثناء معالجة الطلب.");
    }
}
