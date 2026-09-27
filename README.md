# بوت متجر رقمي — botbot

هذا المشروع بداية لبوت تيليجرام بسيط لبيع منتجات رقمية بطريقة قانونية وآمنة.

ملاحظات مهمة:
- لا أدعم أو أضيف وظائف متعلقة بأرقام وهمية، زيادة متابعين مزيفة، أو أي نشاط غير قانوني.
- هذا مشروع تعليمي / قاعدة لبناء متجر رقمي.

الملفات الأساسية المضافة:
- config.php — إعدادات بسيطة (استخدم متغيرات البيئة).
- db.php — اتصال SQLite.
- migrations.sql — سكربت إنشاء الجداول.
- bot.php — نقطة الدخول للـ webhook.
- includes/helpers.php — دوال مساعدة لنداء Telegram.
- commands/ — معالجة أوامر المستخدم.
- admin/ — أوامر المشرف.

البدء السريع:
1. ضع متغيرات البيئة:
   - TELEGRAM_BOT_TOKEN
   - ADMIN_TELEGRAM_ID
2. شغّل إنشاء القاعدة من migrations.sql:
   - sqlite3 data/database.sqlite < migrations.sql
   أو نفّذ SQL باستخدام أي أداة SQLite.
3. ارفع المشروع إلى استضافة PHP مع HTTPS.
4. سجّل webhook لـ Telegram:
   - https://api.telegram.org/bot<YOUR_TOKEN>/setWebhook?url=https://yourdomain.com/bot.php

أوامر مستخدمة:
- /start
- /products
- /buy <id>
- /balance
- /orders
- /support
- /admin (للمشرف — إضافة منتجات: /addproduct name|price|stock)

ما الذي سأفعله الآن:
- جهزت فرع "init/telegram-digital-store" وأضافت الملفات الأساسية.
- التالي: أساعدك بتشغيل المهاجرات تلقائيًا، إضافة منتجات عينة، وضبط webhook أو إعداد polling.

أخبرني ماذا تريد الآن: "شغل المهاجرات" أو "أضف منتجات تجريبية" أو "دلني على ضبط webhook".
