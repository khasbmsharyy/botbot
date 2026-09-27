# بوت متجر رقمي — botbot

هذا المشروع هو بوت تيليجرام بسيط لبيع منتجات رقمية، مع لوحة إدارة ويب داخل المشروع. المشروع مبني على PHP وSQLite ويستخدم Telegram Bot API للاتصال المباشر مع المستخدمين.

ملاحظات مهمة:
- لا يدعم المشروع أي نشاط غير قانوني أو محاولات تزوير أرقام أو متابعين أو أي عمليات غير شرعية.
- هذا المشروع تعليمي ومرتكز على فكرة متجر رقمي بسيط قابل للتوسعة.
- اللغة الأساسية في المشروع هي PHP، مع بعض ملفات CSS.

## نظرة عامة سريعة

المشروع يتكون من:
- bot.php: نقطة الدخول لـ Telegram webhook.
- config.php: إعدادات التطبيق والمتغيرات البيئية.
- db.php: اتصال قاعدة البيانات SQLite.
- migrations.sql: إنشاء الجداول الأساسية.
- includes/helpers.php: مساعدات إرسال الرسائل إلى Telegram.
- commands/: أوامر المستخدم مثل /start و /products و /buy.
- admin/: أوامر المشرف.
- admin_panel/: لوحة إدارة ويب بسيطة لإدارة المنتجات والطلبات.
- scripts/: أكواد تشغيلية مثل معالجة الطلبات أو التنفيذ المجدول.

## هيكل المشروع

```text
botbot/
├── .env.example
├── README.md
├── config.php
├── db.php
├── migrations.sql
├── bot.php
├── includes/
│   └── helpers.php
├── commands/
│   ├── start.php
│   ├── products.php
│   └── order.php
├── admin/
│   ├── admin.php
│   └── .gitkeep (إن وجد)
├── admin_panel/
│   ├── index.php
│   ├── dashboard.php
│   ├── products.php
│   ├── orders.php
│   └── logout.php
├── assets/
│   └── styles.css
├── scripts/
│   └── process_orders.php
├── name.php
├── data/
│   └── database.sqlite (يُنشأ عند التشغيل)
└── .htaccess (إن وجد)
```

## شرح الملفات كاملة ووظيفتها

### 1) .env.example
ملف مثال يوضح المتغيرات المطلوبة مثل:
- TELEGRAM_BOT_TOKEN
- ADMIN_TELEGRAM_ID
- ADMIN_PANEL_TOKEN
- DB_PATH

الوظيفة: يساعدك في إعداد متغيرات البيئة قبل التشغيل الحقيقي.

### 2) README.md
هذا الملف الحالي، ويحتوي على توثيق المشروع وإرشادات التشغيل.

### 3) config.php
يحمّل إعدادات التطبيق من متغيرات البيئة ويحدد:
- رمز البوت الخاص بـ Telegram
- رقم مشرف البوت
- مسار قاعدة البيانات
- إعدادات التطبيق العامة

الوظيفة: مركز إعدادات التطبيق، ويُستعمل في بقية الملفات.

### 4) db.php
يُنشئ اتصال PDO إلى SQLite.

الوظيفة:
- التأكد من وجود مجلد data
- إنشاء ملف SQLite إذا لزم الأمر
- إعادة كائن الاتصال PDO لكل الاستدعاءات
- إعداد قاعدة البيانات لاستخدامها داخل مشروع البوت

### 5) migrations.sql
يحتوي SQL لإنشاء الجداول الأساسية مثل:
- users
- products
- orders

الوظيفة: إنشاء هيكل قاعدة البيانات عند أول تشغيل.

### 6) bot.php
هذا هو ملف نقطة الدخول الأساسي لبوت Telegram.

الوظيفة:
- استقبال طلبات webhook من Telegram
- قراءة JSON من الطلب
- استخراج رسالة المستخدم
- تحليل الأمر مثل /start أو /products أو /buy
- توجيه الطلب إلى الملف المناسب داخل commands أو admin
- الرد للرسالة مباشرة عبر Telegram API

مهم: هذا الملف هو الذي يتم تسجيله في webhook في Telegram.

### 7) includes/helpers.php
يحتوي د��ال مساعدة لإرسال الرسائل إلى Telegram.

الوظيفة:
- sendTelegram(): تنفيذ طلبات API عبر cURL
- sendMessage(): إرسال رسائل نصية مع ألوان/HTML حسب الحاجة
- يساعد في تقليل تكرار الكود داخل الأوامر

### 8) commands/start.php
يتعامل مع الأمر /start.

الوظيفة:
- تسجيل المستخدم في قاعدة البيانات إن لم يكن مسجلاً
- إرسال رسالة ترحيب
- شرح أوامر البوت الأساسية

### 9) commands/products.php
يتعامل مع الأمر /products.

الوظيفة:
- جلب المنتجات من قاعدة البيانات
- عرض اسم المنتج والسعر والكمية
- توجيه المستخدم إلى الأمر /buy

### 10) commands/order.php
يتعامل مع عميلة الطلب /buy.

الوظيفة:
- التحقق أن المنتج موجود
- التحقق من توفر الكمية
- إنشاء سجل طلب جديد
- تحديث رصيد المخزون
- إرسال تأكيد للمستخدم
- إرسال تنبيه إلى المشرف

### 11) admin/admin.php
يحتوي أوامر المشرف داخل المحادثة.

الوظيفة:
- قبول أوامر المشرف فقط من ADMIN_TELEGRAM_ID
- إضافة منتجات مثل: /addproduct اسم|السعر|الكمية
- عرض أحدث الطلبات
- إدارة البوت من داخل الدردشة

### 12) admin_panel/index.php
صفحة تسجيل دخول لوحة الإدارة على الويب.

الوظيفة:
- طلب ADMIN_PANEL_TOKEN
- التحقق من قيمة الرمز
- إذا نجح، فتح لوحة الإدارة

### 13) admin_panel/dashboard.php
لوحة الإدارة الرئيسية.

الوظيفة:
- إحصائيات عامة مثل عدد المنتجات والطلبات
- عرض جاهز للإدارة السريعة

### 14) admin_panel/products.php
واجهة لإدارة المنتجات عبر الويب.

الوظيفة:
- إضافة منتج جديد
- حذف منتج
- عرض المنتجات الحالية

### 15) admin_panel/orders.php
واجهة لإدارة الطلبات عبر الويب.

الوظيفة:
- عرض الطلبات
- تغيير حالة الطلب
- متابعة الطلبات من لوحة التحكم

### 16) admin_panel/logout.php
تسجيل خروج من لوحة الإدارة.

### 17) assets/styles.css
ملف أنماط CSS للوحة الإدارة.

الوظيفة:
- تنسيق الواجهة وعلى هذا النسق يمكن تخصيص المشروع بسهولة.

### 18) scripts/process_orders.php
سكريبت مخصص للتعامل مع الطلبات أو تنفيذ المهام المجدولة.

الوظيفة:
- التحقق من الطلبات المعالجة
- تحديث حالتها إلى مكتملة أو في انتظار التنفيذ
- إرسال إشعارات للمستخدم أو المشرف عند الحاجة

يُستخدم غالباً عبر cron أو التشغيل اليدوي.

### 19) name.php
ملف يحتوي على بيانات أو أسماء أو رموز قد تكون مستخدمة كقوائم مساعدة.

الوظيفة:
- قد يكون مصدر بيانات أو جدول أسماء مخصص لتطبيقات إضافية أو تهيئة المنتجات.
- ليس أساسيًا للوظائف الأساسية للبوت، لكنه جزء من المشروع كملف دعم.

## المتطلبات الأساسية

قبل التشغيل، تأكد من وجود:
- PHP 7.4 أو أحدث
- امتداد PDO
- امتداد pdo_sqlite
- امتداد cURL
- SQLite3 أو أي أداة SQLite
- خادم ويب يدعم PHP (nginx أو Apache)
- شهادة HTTPS لأن Telegram يتطلب webhook عبر HTTPS

### التحقق من المتطلبات

```bash
php -v
php -m | grep -E 'pdo|sqlite|curl'
```

إذا لم تظهر الامتدادات المطلوبة، ثبّتها قبل التشغيل.

## إعداد البيئة

أنشئ متغيرات البيئة قبل التشغيل.

### مثال سريع في Linux/macOS

```bash
export TELEGRAM_BOT_TOKEN="YOUR_BOT_TOKEN"
export ADMIN_TELEGRAM_ID="123456789"
export ADMIN_PANEL_TOKEN="your_strong_token"
export DB_PATH="/var/www/botbot/data/database.sqlite"
```

في بيئة الإنتاج، من الأفضل حفظ هذه القيم في ملف أو داخل إعدادات خادم الـ PHP/NGINX.

## إنشاء قاعدة البيانات

من مجلد المشروع:

```bash
mkdir -p data
sqlite3 data/database.sqlite < migrations.sql
```

أو إذا كنت تستخدم أداة SQLite أخرى، نفّذ محتوى `migrations.sql` داخل قاعدة البيانات.

### التحقق من الجداول

```bash
sqlite3 data/database.sqlite "SELECT name FROM sqlite_master WHERE type='table';"
```

## التشغيل السريع

1. ضع المشروع على خادم ويب يدعم PHP.
2. تأكد أن ملف المشروع قابل للوصول عبر HTTPS.
3. أنشئ قاعدة البيانات من `migrations.sql`.
4. سجل webhook الخاص بالبوت.
5. ابدأ الاختبار عبر Telegram.

## تسجيل webhook في Telegram

بعد رفع المشروع على رابط HTTPS:

```bash
curl "https://api.telegram.org/bot<YOUR_TOKEN>/setWebhook?url=https://yourdomain.com/bot.php"
```

إذا نجح، سيعيد Telegram:

```json
{"ok":true,"result":true,"description":"Webhook was set"}
```

### اختبار محلي (بدون استضافة حقيقية)

يمكن استخدام ngrok:

```bash
./ngrok http 80
```

ثم استخدم الرابط الذي يعطيه ngrok في أمر setWebhook.

## اختبارات أساسية بعد التشغيل

بعد إعداد webhook، أرسل للبوت هذه الأوامر:

- /start
- /products
- /buy 1 (إذا هناك منتج مسجل)
- /admin
- /orders

إذا ظهرت رسائل صحيحة، فإن البوت يعمل بشكل أساسي.

## إعداد لوحة الإدارة

افتح في المتصفح:

```text
https://yourdomain.com/admin_panel/index.php
```

ثم أدخل قيمة `ADMIN_PANEL_TOKEN` كرمز الدخول.

من لوحة الإدارة يمكنك:
- إضافة منتجات
- حذف منتجات
- عرض الطلبات
- تحديث حالة الطلبات

## إعداد cron (العمل المجدول)

إذا كنت تستخدم السكربت `scripts/process_orders.php`، يمكنك تشغيله عبر cron كل 5 دقائق.

### مثال cron

```bash
crontab -e
```

ثم أضف:

```bash
*/5 * * * * /usr/bin/php /var/www/botbot/scripts/process_orders.php >> /var/log/botbot/process_orders.log 2>&1
```

## مثال إعداد nginx

```nginx
server {
    listen 80;
    server_name yourdomain.com;
    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl;
    server_name yourdomain.com;

    ssl_certificate /etc/letsencrypt/live/yourdomain.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/yourdomain.com/privkey.pem;

    root /var/www/botbot;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

## المشكلات الشائعة وحلولها

### 1) لا يعمل webhook
الأسباب المحتملة:
- لا توجد شهادة HTTPS
- خطأ في عنوان URL في setWebhook
- ملف bot.php لا يُستدعى بشكل صحيح
- خطأ في PHP أو cURL

الحل:
- تأكد أن عنوان الموقع يبدأ بـ https://
- تأكد أن bot.php متاح عبر الإنترنت
- راجع logs للـ nginx أو PHP

### 2) قاعدة البيانات لا تنشئ
الأسباب:
- مجلد data غير موجود
- المستخدم الذي يشتغل عليه PHP لا يملك صلاحية الكتابة
- الملف SQLite محمي

الحل:

```bash
mkdir -p data
chmod 755 data
chown -R www-data:www-data data
```

### 3) رسالة خطأ: pdo_sqlite not found
الحل:

```bash
sudo apt-get install php-sqlite3
sudo systemctl restart php-fpm
```

أو حسب توزيعة النظام ونسخة PHP.

### 4) رسالة خطأ: curl failed
الحل:

```bash
sudo apt-get install php-curl
sudo systemctl restart php-fpm
```

### 5) لوحة الإدارة لا تفتح
تأكد من:
- أن الملف admin_panel/index.php موجود
- أن ADMIN_PANEL_TOKEN موجود وقيمة صحيحة
- أن PHP يُشغّل المشروع بشكل صحيح

## ملاحظات أمان

- لا تضع TOKEN أو مفاتيح الإدارة داخل الكود مباشرة في مشروع الإنتاج.
- استخدم متغيرات البيئة أو متغيرات الخادم.
- احفظ ملفات SQLite خارج مسار الويب إن أمكن.
- استخدم HTTPS دائماً.
- راقب سجلات الخادم للتأكد من عدم وجود محاولات اختراق.
- طبّق CSRF وحماية إضافية على صفحات لوحة الإدارة إذا أردت التوسع لاحقاً.

## توصيات للتطوير

- إضافة طبقة تسجيل (`logger`) بدل الاعتماد على `error_log` فقط.
- إضافة دعم `dotenv` لتسهيل إدارة المتغيرات.
- إضافة حماية CSRF لتصاريح التعديلات من لوحة الإدارة.
- إحصائيات أفضل للطلبات والمستخدمين.
- دعم نظام صلاحيات أكثر دقة للمشرفين.
- دعم تعدد اللغات داخل البوت.

## الخلاصة

هذا المشروع يعتبر نقطة انطلاق جيدة لبناء بوت متجر رقمي على Telegram باستخدام PHP وSQLite. إذا تم إعداد البيئات بشكل صحيح، وإنشاء قاعدة البيانات، وإنشاء webhook، فسيعمل البوت بكفاءة ومع إمكانية التوسعة لاحقاً.

المراحل الأساسية للتشغيل هي:
1. تثبيت المتطلبات
2. إعداد متغيرات البيئة
3. إنشاء قاعدة البيانات
4. رفع المشروع على HTTPS
5. إعداد webhook
6. اختبار الأوامر الأساسية
7. تشغيل لوحة الإدارة
8. إضافة المنتجات والطلبات

## نصائح إضافية

- إذا كنت تعمل محلياً، استخدم ngrok أو LocalTunnel لتجربة webhook.
- إذا كنت ترغب بتشغيل البوت بدون webhook، فيمكن بناء حل polling باستخدام getUpdates، لكنه أقل كفاءة في الإنتاج.
- إذا احتجت إلى التوسيع، يمكن إضافة:
  - نظام رصيد مستخدم
  - سلة طلبات
  - دفع إلكتروني
  - لوحة تقارير
  - دعم العملاء

---

تم إعداد هذا الملف كدليل كامل للتشغيل والفهم، مع شرح لكل ملف ووظائفه، ويغطي أيضًا خطوات التشغيل بدون مشاكل بشكل عملي وسهل.

إذا أردت، يمكنني أيضاً تجهيز:
- نسخة ملف `INSTALL.md` منفصلة
- مثال `nginx.conf` جاهز
- ملف `systemd.service` لتشغيل البوت كخدمة Linux
- قائمة تحقق (checklist) للتشغيل الفوري على الخادم
