<?php

// By @v_9_k_e

ob_start();
mkdir('data');
mkdir('EMIL');
mkdir('EMILS');
mkdir('BUY');
mkdir('assignment');
mkdir('data/id');
mkdir('data/txt');
mkdir('data/api');
$API_KEY= '8335305754:AAHQ5r7ii_NfboyZTR-gAZSbWCdlrAJclP8';
define('API_KEY',$API_KEY);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$amrakl = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$amrakl";
$amrakl = file_get_contents($url);
return json_decode($amrakl);
}
$update = json_decode(file_get_contents('php://input'));

$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$message_id = $message->message_id;
$id = $message->from->id;
if($update->callback_query){
$id                                   = $update->callback_query->message->chat->id;
}else{
$id           						= $update->message->chat->id;
}
$user = $message->from->username;
$first = $message->from->first_name;
if(isset($update->callback_query)){
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$user = $update->callback_query->from->username;
$first = $update->callback_query->from->first_name;
}
#=========={التخزينات}==========#
function Aemil($array){
file_put_contents('EMIL/emil.json', json_encode($array));
}
function Bemil($array){
file_put_contents('EMIL/emils.json', json_encode($array));
}
function Now($array){
file_put_contents('EMIL/emilnow.json', json_encode($array));
}
function OrdAll($array){
file_put_contents('BUY/Orderall.json', json_encode($array,64|128|256));
}
function NumbBuys($array,$account){
file_put_contents("EMILS/$account/number.json", json_encode($array,64|128|256));
}
function SendBuys($array,$account){
file_put_contents("EMILS/$account/send.json", json_encode($array,64|128|256));
}
function CardBuys($array,$account){
file_put_contents("EMILS/$account/card.json", json_encode($array,64|128|256));
}
function PricBuys($array,$account){
file_put_contents("EMILS/$account/price.json", json_encode($array,64|128|256));
}
function Ands($array){
file_put_contents('data/openlock.json', json_encode($array));
}
function Bnds($array){
file_put_contents('data/addblusdel.json', json_encode($array));
}
function Agent($array){
file_put_contents('data/txt/agent.json', json_encode($array));
}
function Addserver($array){
file_put_contents('data/country.json', json_encode($array,64|128|256));
}
function Sool($array){
file_put_contents('data/txt/sool.json', json_encode($array));
}
function Ready($array){
file_put_contents('data/storenumber.json', json_encode($array));
}
function Admins($array){
file_put_contents('data/id/admin.json', json_encode($array));
}
function Save($array){
file_put_contents('data/txt/random.json', json_encode($array));
}
function Ssai($array){
file_put_contents("assignment/addem.json",json_encode($array));
}
function Dsai($array){
file_put_contents("assignment/addid.json",json_encode($array));
}
function Apps($array){
file_put_contents('data/api/apps.json', json_encode($array,64|128|256));
}
$zzz = json_decode(file_get_contents("zzz.json"),1);
function zzz(){
global $zzz;
file_put_contents("zzz.json",json_encode($zzz));
}
$EMIL = json_decode(file_get_contents('EMIL/emil.json'),true);
$EMILS = json_decode(file_get_contents('EMIL/emils.json'),true);
$EMILNow = json_decode(file_get_contents('EMIL/emilnow.json'),true);
$ORDERALL = json_decode(file_get_contents('BUY/Orderall.json'),true); #تخزين ايدي عمليات جميع الشراء
$openandlock = json_decode(file_get_contents('data/openlock.json'),true);
$addblusdel = json_decode(file_get_contents('data/addblusdel.json'),true);
$agents = json_decode(file_get_contents('data/txt/agent.json'),true);
$buy = json_decode(file_get_contents('data/country.json'),true);
$sool = json_decode(file_get_contents('data/txt/sool.json'),true);
$storenumber = json_decode(file_get_contents('data/storenumber.json'),true);
$admins = json_decode(file_get_contents('data/id/admin.json'),true);
$random = json_decode(file_get_contents('data/txt/random.json'),true);
$assignment = json_decode(file_get_contents('assignment/addem.json'),true);
$assignment2 = json_decode(file_get_contents('assignment/addid.json'),true);
$APPS = json_decode(file_get_contents('data/api/apps.json'),true);
#============={أوامر إضافية}===========#
$me = bot('getme',['bot'])->result->username;
$bot="botbot";
$get = file_get_contents('data/txt/file.txt');
$exxx = explode("\n",$get);
$count = count($exxx);
if($user != null){
$User_link ="☑️ - رابط العضو ↖️";
}
#=========={حساب الإحصائيات}=========#
$numbot = $ORDERALL['number']; #عدد الأرقام المكتملة#
$readybot = $ORDERALL['ready']; #عدد الأرقام الجاهزة المشترى#
$numbots=count($ORDERALL); #العدد الكلي لكمية الأرقام المستخرجة#
$numbote = $numbots-$numbot; #عدد الأرقام المحضور#
$buysall = $numbots; #العدد الكلي للأرقام المباعة#
$Buybot = $numbot+$readybot; #العدد الكلي للأرقام المدفوعة#
$cardbot = $ORDERALL['card']; #عدد الكروت المباعة#
$sendbot = $ORDERALL['send']; #عدد عمليات التحويل#
$money2 = file_get_contents("data/txt/rubleall.txt"); #الروبل اللكلي#
$poi_money = file_get_contents("data/txt/pointall.txt"); #الروبل المتبقي#
$money = $money2 - $poi_money; #الروبل المستهلك#
$allcharges = $ORDERALL['add']; #عدد الشحن ب المرات#
$assignru=0.25; #نسبة ربح رابط الدعوة#
$Exchange=60; #سعر الدولار#
#________________
$EM = $EMILNow['emil'][$chat_id];
$passewo = $EMILNow['password'][$chat_id];
if($EM==null){
$EM=$EMIL[$chat_id]['emil'];
$passewo = $EMIL[$chat_id]['pass'];
}
$perrewo = $EMILS['emils'][$EM]['pass'];
if(!is_dir("EMILS/$EM")){
mkdir("EMILS/$EM");
}
if(!is_dir("data/id/$id")){
mkdir("data/id/$id");
}
$BUYSNUM = json_decode(file_get_contents("EMILS/$EM/number.json"),true);
$BUYSSEND = json_decode(file_get_contents("EMILS/$EM/send.json"),true);
$BUYSCARD = json_decode(file_get_contents("EMILS/$EM/card.json"),true);
$BUYSPRIC = json_decode(file_get_contents("EMILS/$EM/price.json"),true);
#_________________
$Detector = file_get_contents("data/id/$id/restriction.txt");
$step = file_get_contents("data/id/$id/step.txt");
$twas = file_get_contents("data/id/$id/twas.txt");
$buynumber = file_get_contents("data/id/$id/number.txt");
$exstep=explode("|", $step);
$extext = explode("\n", $text);
$ex_text=explode(" ", $text);
$ex__text=explode("-", $text);
$exdata=explode("-", $data);
$ex_data=explode("#", $data);
$ordermy = count($BUYSNUM[number]); #عدد الأرقام المشترى#
$numbuy = $BUYSNUM[number_my]; #عدد الأرقام المشترى#
$readymy = $BUYSNUM[ready_my]; #عدد الأرقام الجاهزة#
$orderall = count($ORDERALL)+1; #عدد مشتريات الاعضاء#
$idnums = count($ORDERALL)+999999999; #عدد مشتريات الاعضاء#
$cardmy = count($BUYSCARD); #عدد الكروت المشترى#
$sendmy = count($BUYSSEND); #عدد عمليات تحويل الروبل#
$pricmy = count($BUYSPRIC); #عدد عمليات شحن الحساب#
$buymy = $BUYSNUM['number_my']; #عدد الأرقام المكتملة#
$rubles=file_get_contents("EMILS/$EM/rubles.txt"); #الرصيد اللكلي#
$Balance = file_get_contents("EMILS/$EM/points.txt"); #رصيد العضو#
$consumers = $rubles-$Balance; #عدد الروبل المستهلك#
#_________________
if($numbuy==null){
$numbuy=0;
}
if($buymy==null){
$buymy=0;
}
if($readymy==null){
$readymy=0;
}
if($cardmy==null){
$cardmy=0;
}
if($sendmy==null){
$sendmy=0;
}
if($pricmy==null){
$pricmy=0;
}
if($rubles==null){
$rubles=0;
}
if($counmy==null){
$counmy=0;
}
if($Balance==null){
$Balance=0;
}
if($consumers==null){
$consumers=0;
}
if($numbot==null){
$numbot=0;
}
if($readybot==null){
$readybot=0;
}
if($numbote==null){
$numbote=0;
}
if($numbots==null){
$numbots=0;
}
if($Buybot==null){
$Buybot=0;
}
if($cardbot==null){
$cardbot=0;
}
if($sendbot==null){
$sendbot=0;
}
if($money==null){
$money=0;
}
if($poi_money==null){
$poi_money=0;
}
if($allcharges==null){
$allcharges=0;
}
#_________________
date_default_timezone_set('Asia/Baghdad');
$tim = date('h'.'i'.'s');
$tim1 = date('h:i:s');
$aa = date('a');
$a=str_replace(["am","pm"],["AM","PM"],$aa);
$e=str_replace(["am","pm"],["صباحاً","مسائاً"],$aa);
$time = "$tim$a";
$D = date('j'); // الايام
$Y = date('Y'); // السنة
$M = date('n'); // الشهر
if($M<10){
$M=str_replace(["1","2","3","4","5","6","7","8","9"],["01","02","03","04","05","06","07","08","09"],$M);
}
if($D<10){
$D=str_replace(["1","2","3","4","5","6","7","8","9"],["01","02","03","04","05","06","07","08","09"],$D);
}
function day_name(){
$ds = array('الأحد', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت');
return $ds[Date('w')];
}
$DY = day_name();
function month_name(){
$month_n = array('فارغ','يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو','اغسطس','سبتمبر','اكتوبر','نوفمبر','ديسمبر');
return $month_n[date('n')];
}
$MH = month_name();
$DAY="$Y$M$D$time";
$DAY2="$DY $D $MH $Y | $tim1 $e";
$DAY3="$D-$M-$Y | $tim1 $e";
#_________________
$chall = "n_u_m_11";
$useradmin = "spadesign1";
$sim =-1002806684032; #القناة الرسمية
$PAY =-1002838562959; #الارقام المكتملة
$ess =-1002713317368; #عمليات شراء الارقام
$eer =-1002275252814; #اشعارات الايميلات وتحويل الروبل
if($chat_id==8177557473){
$sudo=$chat_id;
}elseif($chat_id==8177557473){
$sudo=$chat_id;
}else{
$sudo==8177557473;
}
#=========={الإشتراك الإجباري}==========#
if(!in_array($id,$exxx) and $ex_text[1] != null){
$cod=$ex_text[1];
$EEM=$assignment["emils"][$cod];
if($assignment2['my'][$id] == null and $EMILS['emils'][$EEM]['emil'] != null and $EEM != $EM){
file_put_contents("data/id/$id/lift.txt","$EEM");
}
}
$status = bot('getChatMember',['chat_id'=>$sim,'user_id'=>$chat_id])->result->status;
if($data == "verification"){
if($status == 'left'){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"🚧︙يرجى الإنضمام بالقناة أولاً، ثم إضغط على التحقق.",
'show_alert'=>true
]);
exit;
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️*︙تم التحقق من الإنضمام وشكرا لإنضمامك* 😁
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>"- للدخول إلى البوت إضغط هنا ☑️",'callback_data'=>"startup"]]
]
])
]);
exit;
}
if($data == null and $status == 'left'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🖐*︙مرحبا* [$first](tg://user?id=$id) .♥️

- يجب الإشتراك بقناة البوت الرسمية لإستخدام البوت 📢

*- رابط القناة: @n_u_m_11 @$chall*

🙋‍♂️ *⁞ إضغط على الزر بالأسفل للتحقق.*
",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>"التحقق من الإنضمام. ☑️",'callback_data'=>"verification"]]
]
])
]);
exit;
}
if($data != null and $status == 'left'){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🖐*︙مرحبا* [$first](tg://user?id=$id) .♥️

- يجب الإشتراك بقناة البوت الرسمية لإستخدام البوت 📢

*- رابط القناة: $ch_sub*

🙋‍♂️ *⁞ إضغط على الزر بالأسفل للتحقق.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>"التحقق من الإنضمام. ☑️",'callback_data'=>"verification"]]
]
])
]);
exit;
}
#=========={قفل البوت}==========#
if($openandlock['bot']['lock'] == "ok" and $id != $sudo){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
*البوت تحت الصيانة حاليا , سوف يتم إشعاركم في قناة البوت عند الإكتمال , ونشكر انتظاركم 💙🙂*
",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[ 
[['text'=>"⚜ قناة البوت ⚜",'url'=>"t.me/$chall"]]
]
])
]);
exit;
}
#=========={رسالة /start}==========#
$liftchal=file_get_contents("data/id/$id/lift.txt");
if($liftchal != null and $assignment2['my'][$id] == null and $EMILS['emils'][$liftchal]['emil'] != null and $liftchal != $EM){
$EMID=$EMILS['emils'][$liftchal]['id'];
bot('sendMessage',[
'chat_id'=>$EMID,
'text'=>"
☑️* - قام عضو جديد بستجيل الدخول عبر رابطك
💸 - وتم إضافة $assignru روبل لحسابك بنجاح*
",
'parse_mode'=>"MarkDown",
]);
$assignment2['my'][$id] = $liftchal;
Dsai($assignment2);
$points = file_get_contents("EMILS/$liftchal/points.txt");
$as = $points + $assignru;
file_put_contents("EMILS/$liftchal/points.txt",$as);
$rubles = file_get_contents("EMILS/$liftchal/rubles.txt");
$ds = $rubles - $assignru;
file_put_contents("EMILS/$liftchal/rubles.txt",$ds);
$pointall = file_get_contents("data/txt/pointall.txt");
$alls = $pointall + $assignru;
file_put_contents("data/txt/pointall.txt",$alls);
$rubleall = file_get_contents("data/txt/rubleall.txt");
$dlls = $rubleall + $assignru;
file_put_contents("data/txt/rubleall.txt",$dlls);
unlink("data/id/$id/lift.txt");
}
if($ex_text[0] == '/start' and $ex_text[1] != 'ONE' and $id !== $sudo){
$cod=$ex_text[1];
$EEM=$assignment["emils"][$cod];
$EMID=$EMILS['emils'][$EEM]['id'];
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♐️ - مرحبا بك [$first](tg://user?id=$id) ؛ 🤍

*- في بوت @n_u_m_11* ؛ البوت الأفضل على التليجرام والذي يقوم بتوفير *خدمات الأرقام الوهمية* ل مواقع السوشيال ميديا مثل *التيليجرام والواتساب والتويتر وغيره* 👾

*- قم بإنشاء حساب جديد* ؛ واذا كان لديك حساب من قبل: قم بالضغط على زر *تسجيل الدخول* ☑️
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'لديكَ حساب؟ تسجيل دخول 📲','callback_data'=>"login"]],
[['text'=>'إنشاء حساب جديد ☑️','callback_data'=>"sign_in"]],
[['text'=>'شروط الإستخدام وإخلاء للمسؤلية 🚨','callback_data'=>"to_explain"]],
[["text"=>'إدارة البوت 👨🏻‍💻',"url"=>"tg://user?id=$sudo"]],
[['text'=>'هام للأعضاء الجُدد ⚠️','callback_data'=>"Important"]],
[['text'=>'إحصائيات المستخدمين 📈','callback_data'=>'statsbot2']]
]
])
]);
if(!in_array($id,$exxx) and $assignment2['my'][$id] == null and $cod != null and $EMILS['emils'][$EEM]['emil'] != null and $EEM != $EM){
bot('sendMessage',[
'chat_id'=>$EMID,
'text'=>"
☑️* - قام عضو جديد بستجيل الدخول عبر رابطك
💸 - وتم إضافة $assignru روبل لحسابك بنجاح*
",
'parse_mode'=>"MarkDown",
]);
$assignment2['my'][$id] = $EEM;
Dsai($assignment2);
$points = file_get_contents("EMILS/$EEM/points.txt");
$as = $points + $assignru;
file_put_contents("EMILS/$EEM/points.txt",$as);
$rubles = file_get_contents("EMILS/$EEM/rubles.txt");
$ds = $rubles - $assignru;
file_put_contents("EMILS/$EEM/rubles.txt",$ds);
$pointall = file_get_contents("data/txt/pointall.txt");
$alls = $pointall + $assignru;
file_put_contents("data/txt/pointall.txt",$alls);
$rubleall = file_get_contents("data/txt/rubleall.txt");
$dlls = $rubleall + $assignru;
file_put_contents("data/txt/rubleall.txt",$dlls);
}
if(!in_array($id,$exxx)){
file_put_contents('data/txt/file.txt',"\n" . $id, FILE_APPEND);
}
unlink("data/id/$id/step.txt");
exit;
}
#=========={للمطور}==========#
if($text == '/my' and $id == $sudo){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♐️ - مرحبا بك [$first](tg://user?id=$id) ؛ 🤍

*- في بوت @n_u_m_11* ؛ البوت الأفضل على التليجرام والذي يقوم بتوفير *خدمات الأرقام الوهمية* ل مواقع السوشيال ميديا مثل *التيليجرام والواتساب والتويتر وغيره* 👾

*- قم بإنشاء حساب جديد* ؛ واذا كان لديك حساب من قبل: قم بالضغط على زر *تسجيل الدخول* ☑️
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'لديكَ حساب؟ تسجيل دخول 📲','callback_data'=>"login"]],
[['text'=>'إنشاء حساب جديد ☑️','callback_data'=>"sign_in"]],
[['text'=>'شروط الإستخدام وإخلاء للمسؤلية 🚨','callback_data'=>"to_explain"]],
[["text"=>'إدارة البوت 👨🏻‍💻',"url"=>"tg://user?id=$sudo"]],
[['text'=>'هام للأعضاء الجُدد ⚠️','callback_data'=>"Important"]],
[['text'=>'إحصائيات المستخدمين 📈','callback_data'=>'statsbot2']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
#=========={لوحة التحكم}==========#
if($data == "startup"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
♐️ - مرحبا بك [$first](tg://user?id=$id) ؛ 🤍

*- في بوت @n_u_m_11* ؛ البوت الأفضل على التليجرام والذي يقوم بتوفير *خدمات الأرقام الوهمية* ل مواقع السوشيال ميديا مثل *التيليجرام والواتساب والتويتر وغيره* 👾

*- قم بإنشاء حساب جديد* ؛ واذا كان لديك حساب من قبل: قم بالضغط على زر *تسجيل الدخول* ☑️
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'لديكَ حساب؟ تسجيل دخول 📲','callback_data'=>"login"]],
[['text'=>'إنشاء حساب جديد ☑️','callback_data'=>"sign_in"]],
[['text'=>'شروط الإستخدام وإخلاء للمسؤلية 🚨','callback_data'=>"to_explain"]],
[["text"=>'إدارة البوت 👨🏻‍💻',"url"=>"tg://user?id=$sudo"]],
[['text'=>'هام للأعضاء الجُدد ⚠️','callback_data'=>"Important"]],
[['text'=>'إحصائيات المستخدمين 📈','callback_data'=>'statsbot2']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
#=========={الحماية}==========#
if($Detector != null){
if($exdata[0] == "Ii" or $exdata[0] == "Xi" or $exdata[0] == "Wi" or $ex_data[0] == "readdd" or $exdata[0] == "Vi" or $data == "YESSend" or $exdata[0] == "YSb" or $data == "login" or $data == "login_2" or $data == "logout" or $data == "sign_in"){
$site = $BUYSNUM[number][$Detector][site];
$number = $BUYSNUM[number][$Detector][phone];
$idnumber = $BUYSNUM[number][$Detector][idnumber];
$finish = $BUYSNUM[number][$Detector][finish];
$times = $BUYSNUM[number][$Detector][times];
$idSend = $BUYSNUM[number][$Detector][idSend];
$status = $BUYSNUM[number][$Detector][status];
$app = $BUYSNUM[number][$Detector][app];
$api=json_decode(file_get_contents("https://".$_SERVER['SERVER_NAME']."/$bot/api-sites.php?action=getStatus&site=$site&app=$app&idnumber=$idnumber&number=$number"),1);
$status = $api[status];
$code = $api[code];
$agen = $api[agen];
$Location = $api[Location];
$api2=json_decode(file_get_contents("https://".$_SERVER['SERVER_NAME']."/$bot/api-sites.php?action=addBlack&site=$site&app=$app&idnumber=$idnumber&number=$number"),1);
$status2 = $api2[status];
if($user == null){
$uss = "لايوجد ❌";
}else{
$uss = "[@$user]";
}
if($code != null and $status == 1){
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>'⚠️ - لايمكنك أن تقوم بشراء أي شيء لأن لديك عملية شراء لم تقم ب إكمالها 🙂',
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
exit;
}elseif(time() - $times < 120 and $status == 1 and $site == "onlinesim"){
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"❌ - لا يمكنك إلغاء الرقم لأن طلبك يحتاج لمرور دقيقتين ♻️",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
exit;
}elseif($code == null and $status == 1){
$BUYSNUM[number][$Detector][status] = -1;
NumbBuys($BUYSNUM,$EM);
$ORDERALL[$idSend][status] = -1;
OrdAll($ORDERALL);
unlink("data/id/$id/restriction.txt");
}
}
}
#=========={تسجيل الدخول}==========#
if($data == "login"){
$emile = $EMIL[$chat_id]['emil'];
$password = $EMILS['emils'][$emile]['pass'];
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*♻️ - يرجى إرسال الحساب او الإيميل الذي تريد تسجيل الدخول عليه ، (يجب أن يكون هذا الإيميل مسجل بالبوت. ⚠️)

☑️ - اذا لديك حساب من قبل سيضهر في الأسفل ، إضغط عليه لتسجيل الدخول ✅.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- $emile .",'callback_data'=>"emils-$emile-$password"]],
[['text'=>'- رجوع.','callback_data'=>"startup"]]
]
])
]);
file_put_contents("data/id/$id/step.txt","login");
exit;
}
if($text != '/start' && $text != null && $step == 'login'){
$pass=$EMILS['emils'][$text]['pass'];
$IDem=$EMILS['emils'][$text]['id'];
if($EMILS['emils'][$text]['emil'] == null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️ *- لم يتم إنشاء حساب ب هذا الإيميل في البوت!*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"↪️ إنشاء حساب جديد ☑️",'callback_data'=>"sign_in"]],
[['text'=>'- رجوع.','callback_data'=>"startup"]]
]
])
]);
exit;
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
☑️ *- يرجى الإنتظار يتم فحص الحساب ⏳...*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
sleep(1);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🔐 *- أرسل كلمة مرور حسابك الأن* ☑️
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⚠️ - طلب المساعدة",'callback_data'=>"super"]],
[['text'=>'- رجوع.','callback_data'=>"startup"]]
]
])
]);
file_put_contents("data/id/$id/step.txt","pasword|$text");
exit;
}
if($text != '/start' && $text != null && $exstep[0] == 'pasword'){
$emile = $exstep[1];
$passe = $EMILS['emils'][$emile]['pass'];
if($text !== $passe){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
*♻️ - كلمة المرور ليست صحيحة ⛔️*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"startup"]]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
$get=bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♻️ *- تم التحقق بنجاح، انتظر قليلا ....*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
sleep(1);
$get=$get->result->message_id;
bot('deletemessage',[
'chat_id'=>$chat_id, 
'message_id'=>$get,
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⤵️ *- يمكنك الآن الضغط على الإيميل بالأسفل للتسجيل* ☑️
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$emile",'callback_data'=>"emils-$emile-$passe"]]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
#=========={إنشاء حساب}=========#
if($data == "sign_in"){
$margin=rand(100000,999999);
if($EMIL[$chat_id]['emil'] != null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
☑️ - يوجد لديك حساب من قبل ⚠️
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
exit;
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
✅ - لأمان حسابك *وحماية خصوصيتك*، نحتاج للتحقق من *انك انساناً ولست روبوتاً* اولاً. ♻️

🔘 - قم بكتابة الرقم الظاهر أمامك *[ $margin ]* 

☑️ - أرسل لنا *الإجابة الصحيحة* للتحقق من *انك لست روبوتاً.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع 🔜','callback_data'=>"startup"]]
]
])
]);
file_put_contents("data/id/$id/step.txt","sign_in|$margin");
exit;
}
if($text != '/start' && $text != null && $exstep[0] == 'sign_in'){
$margin = $exstep[1];
$xzz = "@n_u_m_11.COM";
$code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0-7);
$emile = "$code$xzz";
$password = substr(str_shuffle("12345"),0-5);
if($user == null){
$uss = "لايوجد ❌";
}else{
$uss = "[@$user]";
}
if($EMILS['emils'][$emile]['emil'] == $emile){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
*❌ -  عذرا عزيزي حدث خطأ في البوت أرجوا إعادة المحاولة مرة أخرى 🙃*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع 🔙','callback_data'=>"startup"]]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
if($margin != $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
*❌ - إجابة غير صحيحة! حاول مجددا.*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع 🔜','callback_data'=>"startup"]]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
*✅ - إجابة صحيحة ⚜!

♻️ - تتم معالجة البيانات يرجى الإنتظار قليلاً.*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id,
]);
sleep(2);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
☑️ - تم إنشاء حساب جديد لك.!✔

📧 - الحساب: *$emile*
🔐 - كلمة السر: *$password*
🆔 - أيدي الحساب: *$chat_id*

⚠️ - ملاحظة: *قم بتغيير كلمة مرورك من الإعدادات حتى تستطيع تذكرها متى ماشئت.*

⚠️ - ملاحظة: *لاتعطي كلمة مرورك لأي شخص حتى تحفظ حسابك من الإختراق.*

✅ *- إضغط على حسابك الأن ⬇️ للدخول للبوت.*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⚜ - تسجيل الدخول','callback_data'=>"emils-$emile-$password"]]
]
])
]);
bot('sendMessage',[
'chat_id'=>$eer,
'text'=>"
☑️ - تم إنشاء حساب جديد في البوت.!✔

✅ - الحساب: *$emile*
🔐 - كلمة السر: *$password*
🆔 - أيدي الحساب: [$chat_id](tg://openmessage?user_id=$chat_id)
⚜ - إسم العضو: [$first](tg://user?id=$chat_id)
🌀 - المعرف: $uss
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ - رابط العضو ↖️",'url'=>"tg://openmessage?user_id=$id"]]
]
])
]);
$EMIL[$chat_id]['emil'] = $emile;
$EMIL[$chat_id]['pass'] = $password;
$EMIL[$chat_id]['Date_created'] = "$D/$M/$Y $tims";
Aemil($EMIL);
$EMILS['emils'][$emile]['emil'] = $emile;
$EMILS['emils'][$emile]['pass'] = $password;
$EMILS['emils'][$emile]['Date_created'] = "$D/$M/$Y $tims";
$EMILS['emils'][$emile]['id'] = $chat_id;
Bemil($EMILS);
unlink("data/id/$id/step.txt");
exit;
}
#=========={الإحصائيات}==========#
if($data == "statsbot2"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📊 - *إحصائيات البوت :*

✅ - عدد العملاء النشطين: *$count* 🙋🏻
📞 - عدد الأرقام المكتملة: *$numbot* 🎖
☎️ - عدد الأرقام الجاهزة التي تم شراؤها: *$readybot* 🚀
🎟 - عدد الكروت التي تم شراؤها: *$cardbot* 🏆
💸 - وصل الروبل المصروف الى: *₽ $money* 💰
☑️ - عدد الروبل المتبقى: *₽ $poi_money* 💰
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"startup"]]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
#========={شرح البوت}=========#
if($data == "to_explain"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
• *مرحبا بك عزيزي في قسم التعليمات والشروط.*

• *شروط البوت :* ↘️

- هذا البوت يقوم بجلب أرقام وهمية لجميع مواقع السوشيل ميديا ولمعضم الدول.
- البوت لايتحمل مسؤولية الأرقام في حالة أنها انحظرت او انسرقت , بمعنى البوت لايتحمل مسؤولية الرقم بعد شرائه.
- فضلا يرجى عدم إستعمال الأرقام في أشياء قد تغضب الله عز وجل أو الإنحراف الإسلامي كالإختراقات وغيره.

• *تعليمات عن كيفية إستعمال البوت :* ↘️

- عندما تقوم بشراء رقم يجب أن تقوم بفحصها في حالة كانت الأرقام مستخدمة قم ب إلغاء الرقم وفي حالة كانت الأرقام جديده قم بشرائها.
- لفحص الرقم, أضغط على زر *رؤية الرقم في واتسأب* بعد شراء الرقم, سيقوم بتوجيهك إلى الواتساب, في حالة قال لك *إن رقم الهاتف هذا +967••• @n_u_m_11 ليس في واتسأب* هذا يعني أن الرقم جديد ولم يستخدم في واتسأب من قبل, *أما في الحالات الأخرى فهذا يعني أن الرقم مستخدم في واتسأب ولا نتحمل مسؤولية تفعيلة في أي حال من الأحوال.*
- قد لا تصل الأكواد إلى بعض الأرقام لتطبيق *واتسأب* , لذلك ياعزيزي يمكنك  إستخدام واتسأب أعمال قد تم نشرة في قناتنا على التيليجرام [إضغط هنا لتحميلها](t.me/$chall/2186).
- في حالة لم يصل الكود في هذه النسخة, قم بعمل إرسال رسالة مجددا في الواتسأب وأنتظر نصف دقيقة وأضغط تحديث, في حالة لم يصل بعد قم بإلغائه وشراء رقم آخر.

• *للإستفسار تواصل معنا: @$useradmin* .
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"startup"]]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
#========={الاعضاء الجدد}=========#
if($data == "Important"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*- هام للأعضاء الجُدد في بوت اكسبلورر.*

- هذا البوت مخصّص لعمل أرقام وهمية لتفعيل مواقع التواصل الإجتماعي ، *لانتحمل مسؤولية الأرقام بعد شراءِها.*

*- يعمل البوت عبر عدّة سيرفرات او عدّة مورّدين مختصّين بتوفير الأرقام من دُول معيَّنة* ، ولبرامج محدّدة ، وكلّ سيرفر او مُورد له *سِعر خاص فيه.*

*- هذا البوت لايظمن أي رقم بعد شراءِه* ، حتى اذا لم يشتغل لديك ، مجرد شراء الرقم يعني إخلاء المسؤولية، وهذا موضح في *شروط الاستخدام.*

*- مسؤولية استخدامك للأرقام على رب العباد ، لذلك لاتستخدم الأرقام في اشياء مخالفة للدين.*
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"startup"]]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
#=========={دخول للبوت}==========#
if($exdata[0] == "emils"){
$emile = $exdata[1];
$password = "$exdata[2]";
$pase = $EMILS['emils'][$emile]['pass'];
$pase = "$pase";
$idEM = $EMILS['emils'][$emile]['id'];
$rubles=file_get_contents("EMILS/$emile/rubles.txt"); #الرصيد اللكلي#
$Balance = file_get_contents("EMILS/$emile/points.txt"); #رصيد العضو#
$consumers = $rubles-$Balance; #عدد الروبل المستهلك#
if($Baalanc==null){
$Baalanc=0;
}
if($consumsre==null){
$consumsre=0;
}
if($user == null){
$uss = "لايوجد ❌";
}else{
$uss = "[@$user]";
}
if($EMILS['emils'][$emile]['emil'] == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
⚠️ - عذرا هذا الحساب قد تم حذفة من البوت بشكل كامل ❎
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($password !== $pase and $sudo != $id){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
⚠️ - عذرا كلمة المرور ل هذا الحساب قد تم تغييرة ☑️
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
👨‍✈️ *⁞ مرحبا بك* [$first](tg://user?id=$id) ؛
🏛 *⁞ هذه تفاصيل حسابك في بوت. @n_u_m_11* ⬇️

📨︙حسابك: *$emile* 
💰︙رصيدك: *₽ $Balance 💸*
🆔︙أيدي حسابك: *$id ⚜*
♻️︙رصيدك المصرف: *$consumers 🗞*

☑️ *⁞ قناة البوت الرسمية: @$chall
🎬︙قم بالتحكم بالبوت الأن عبر الضعط على الأزرار.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'☎️︙شراء ارقـام وهمية','callback_data'=>'Buynum']],
[['text'=>'💰︙شحن رصيدك','callback_data'=>'Payment'],['text'=>'👤︙قسم الرشق','callback_data'=>'sh']],
[['text'=>'🅿️︙كشف الحساب','callback_data'=>"Record"],['text'=>'🛍︙قسم العروض','callback_data'=>"Wo"]],
[['text'=>'☑️︙قسم العشوائي','callback_data'=>"worldwide"],['text'=>'👑︙قسم الملكي','callback_data'=>"saavmotamy"]],
[['text'=>'💰︙ربح روبل مجاني 🤑','callback_data'=>"assignment"]],
[['text'=>'💳︙متجر الكروت','callback_data'=>"readycard-10"],['text'=>'🔰︙الارقام الجاهزة','callback_data'=>'ready']],
[['text'=>'👨‍💻︙قسم الوكلاء','callback_data'=>"gents"],['text'=>'⚙︙إعدادات البوت','callback_data'=>"MyAccount"]],
[['text'=>'📮︙تواصل الدعم أونلاين','callback_data'=>"super"]]
]
])
]);
$EMILNow['emil'][$chat_id] = $emile;
$EMILNow['password'][$chat_id] = $pase;
Now($EMILNow);
unlink("data/id/$id/step.txt");
}
}
#=========={القائمة الرئيسية}==========#
if($data == "back"){
if($EM == null or $EMILS['emils'][$EM]['emil'] == null or $passewo != $perrewo){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
♐️ - مرحبا بك [$first](tg://user?id=$id) ؛ 🤍

*- في بوت @n_u_m_11 ؛ البوت الأفضل على التليجرام والذي يقوم بتوفير *خدمات الأرقام الوهمية* ل مواقع السوشيال ميديا مثل *التيليجرام والواتساب والتويتر وغيره* 👾

*- قم بإنشاء حساب جديد* ؛ واذا كان لديك حساب من قبل: قم بالضغط على زر *تسجيل الدخول* ☑️
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'لديكَ حساب؟ تسجيل دخول 📲','callback_data'=>"login"]],
[['text'=>'إنشاء حساب جديد ☑️','callback_data'=>"sign_in"]],
[['text'=>'شروط الإستخدام وإخلاء للمسؤلية 🚨','callback_data'=>"to_explain"]],
[["text"=>'إدارة البوت 👨🏻‍💻',"url"=>"tg://user?id=$sudo"]],
[['text'=>'هام للأعضاء الجُدد ⚠️','callback_data'=>"Important"]],
[['text'=>'إحصائيات المستخدمين 📈','callback_data'=>'statsbot2']]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
👨‍✈️ *⁞ مرحبا بك* [$first](tg://user?id=$id) ؛
🏛 *⁞ هذه تفاصيل حسابك في البوت* ⬇️

📨︙حسابك: *$EM* 
💰︙رصيدك: *₽ $Balance 💸*
🆔︙أيدي حسابك: *$id ⚜*
♻️︙رصيدك المصرف: *$consumers 🗞*

☑️ *⁞ قناة البوت الرسمية: @$chall
🎬︙قم بالتحكم بالبوت الأن عبر الضعط على الأزرار.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'☎️︙شراء ارقـام وهمية','callback_data'=>'Buynum']],
[['text'=>'💰︙شحن رصيدك','callback_data'=>'Payment'],['text'=>'👤︙قسم الرشق','callback_data'=>'sh']],
[['text'=>'🅿️︙كشف الحساب','callback_data'=>"Record"],['text'=>'🛍︙قسم العروض','callback_data'=>"Wo"]],
[['text'=>'☑️︙قسم العشوائي','callback_data'=>"worldwide"],['text'=>'👑︙قسم الملكي','callback_data'=>"saavmotamy"]],
[['text'=>'💰︙ربح روبل مجاني 🤑','callback_data'=>"assignment"]],
[['text'=>'💳︙متجر الكروت','callback_data'=>"readycard-10"],['text'=>'🔰︙الارقام الجاهزة','callback_data'=>'ready']],
[['text'=>'👨‍💻︙قسم الوكلاء','callback_data'=>"gents"],['text'=>'⚙︙إعدادات البوت','callback_data'=>"MyAccount"]],
[['text'=>'📮︙تواصل الدعم أونلاين','callback_data'=>"super"]]
]
])
]);
unlink("data/id/$id/step.txt");
unlink("data/id/$id/twas.txt");
exit;
}
}
if($data=="sh"){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"- عذراً قسم الرشق مغلق حالياً
- يمكنك الرشق عبر مراسلة المالك",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
exit;
}
#=========={الحماية}==========#
if($text != null and $text != '/my' and $text != '/start ONE' and $step != null and $twas != 'tw' and $id != $sim and $id != $PAY and $id != $ess and $id != $eer and $id != $sudo){
if($EM == null or $EMILS['emils'][$EM]['emil'] == null or $passewo != $perrewo){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♐️ - مرحبا بك [$first](tg://user?id=$id) ؛ 🤍

*- في بوت @n_u_m_11* ؛ البوت الأفضل على التليجرام والذي يقوم بتوفير *خدمات الأرقام الوهمية* ل مواقع السوشيال ميديا مثل *التيليجرام والواتساب والتويتر وغيره* 👾

*- قم بإنشاء حساب جديد* ؛ واذا كان لديك حساب من قبل: قم بالضغط على زر *تسجيل الدخول* ☑️
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'لديكَ حساب؟ تسجيل دخول 📲','callback_data'=>"login"]],
[['text'=>'إنشاء حساب جديد ☑️','callback_data'=>"sign_in"]],
[['text'=>'شروط الإستخدام وإخلاء للمسؤلية 🚨','callback_data'=>"to_explain"]],
[["text"=>'إدارة البوت 👨🏻‍💻',"url"=>"tg://user?id=$sudo"]],
[['text'=>'هام للأعضاء الجُدد ⚠️','callback_data'=>"Important"]],
[['text'=>'إحصائيات المستخدمين 📈','callback_data'=>'statsbot2']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
}
if($text == null and $data != null and $data != "super" and $id != $sim and $id != $buys and $id != $PAY and $id != $ess and $id != $eer and $id != $sudo){
if($EM == null or $EMILS['emils'][$EM]['emil'] == null or $passewo != $perrewo){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
♐️ - مرحبا بك [$first](tg://user?id=$id) ؛ 🤍

*- في بوت @n_u_m_11* ؛ البوت الأفضل على التليجرام والذي يقوم بتوفير *خدمات الأرقام الوهمية* ل مواقع السوشيال ميديا مثل *التيليجرام والواتساب والتويتر وغيره* 👾

*- قم بإنشاء حساب جديد* ؛ واذا كان لديك حساب من قبل: قم بالضغط على زر *تسجيل الدخول* ☑️
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'لديكَ حساب؟ تسجيل دخول 📲','callback_data'=>"login"]],
[['text'=>'إنشاء حساب جديد ☑️','callback_data'=>"sign_in"]],
[['text'=>'شروط الإستخدام وإخلاء للمسؤلية 🚨','callback_data'=>"to_explain"]],
[["text"=>'إدارة البوت 👨🏻‍💻',"url"=>"tg://user?id=$sudo"]],
[['text'=>'هام للأعضاء الجُدد ⚠️','callback_data'=>"Important"]],
[['text'=>'إحصائيات المستخدمين 📈','callback_data'=>'statsbot2']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
}
if($exdata[0] == "Ii" or $exdata[0] == "Xi"){
$zero = $exdata[1];
$zero = md5($zero);
$price=$buy['number'][$zero][price];
if($price > $Balance or $Balance < $price or $Balance == 0 or $Balance === 0 or $Balance < 0){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- لايوجد لديك رصيد كافي لشراء هذا الرقم
💸 - رصيدك المتوفر في حسابك >> ₽ $Balance*
",
'parse_mode'=>"MarkDown",
]);
unlink("data/id/$id/step.txt");
exit;
}
}
if($exdata[0] == "Vi"){
if($exdata[2] > $Balance or $Balance < $exdata[2] or $Balance == 0 or $Balance === 0 or $Balance < 0){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"⚠️ - رصيدك غير كافية لشراء بطاقة الشحن 💰",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
exit;
}
}
if($ex_data[0] == "readdd"){
if($storenumber['ready'][$ex_data[1]]['price'] > $Balance or $Balance < $storenumber['ready'][$ex_data[1]]['price'] or $Balance == 0 or $Balance === 0 or $Balance < 0){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- لايوجد لديك رصيد كافي لشراء هذا الرقم
💸 - رصيدك المتوفر في حسابك >> ₽ $Balance*
",
'parse_mode'=>"MarkDown",
]);
unlink("data/id/$id/step.txt");
exit;
}
}
if($exdata[0] == "YSg" or $exdata[0] == "YSb"){
if($exdata[2] > $Balance or $Balance < $exdata[2] or $Balance == 0 or $Balance === 0 or $Balance < 0){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"⚠️ - رصيدك غير كافية لتحويل رصيد إلى الأصدقاء 💰",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
exit;
}
}
if($data == "YESSend"){
if(20 > $Balance or $Balance < 20 or $Balance == 0 or $Balance === 0 or $Balance < 0){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"⚠️ - لايوجد لديك رصيد كافي للتحويل 💰",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
exit;
}
}
if($admins[$EM]["check"] != null and time() - $admins[$EM]["time"] >= $admins[$EM]["end"]){
unset($admins[$EM]);
Admins($admins);
}
if($exdata[0] == "Ii" or $exdata[0] == "Xi" or $exdata[0] == "Wi" or $exdata[0] == "Vi" or $exdata[0] == "YSb" or $exdata[0] == "YSg" or $data == "YESSend" or $ex_data[0] == "readdd"){
$v=$admins[$EM]["end"]-(time() - $admins[$EM]["time"]);
if($admins[$EM]["check"] != null and time() - $admins[$EM]["time"] < $admins[$EM]["end"]){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
⚠️ *- تم تقييدك من البوت لسبب مخالفة مالك البوت ولن تستطيع الإستفاده من البوت ب هذا الشكل
♻️ - إذا تظن أنك مقيد لأسباب خاطئة تواصل مع الدعم الأنلاين في الزر الأسفل
⏰ - الوقت المتبقي للتقييد: $v ثانية*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🚀 تواصل مع الدعم 🚀','callback_data'=>"super"]],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
}
#=========={الإحالات}===========#
if($data == "assignment"){
if($assignment["code"][$EM] == null){
$cod=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), -8);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
💸 *- إربح روبل الآن مجاناً* عبر مشاركة رابط البوت الى أصدقائك 👥
*- واحصل على $assignru روبل* مقابل كل شخص يقوم بالدخول إلى البوت عبر الرابط الخاص بك ✅

☑ - رابط الدعوة الخاص بك: *https://t.me/$me?start=$cod*

*- عدد من قام بالدخول عبر رابطك: $counmy 👤
- إجمالي أرباحك حتى الآن: $counmyru ₽* 💰
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
$assignment["emils"][$cod] = $EM;
$assignment["code"][$EM] = $cod;
Ssai($assignment);
unlink("data/id/$id/step.txt");
}
if($assignment["code"][$EM] != null){
$cod=$assignment["code"][$EM];
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
💸 *- إربح روبل الآن مجاناً* عبر مشاركة رابط البوت الى أصدقائك 👥
*- واحصل على $assignru روبل* مقابل كل شخص يقوم بالدخول إلى البوت عبر الرابط الخاص بك ✅

☑ - رابط الدعوة الخاص بك: *https://t.me/$me?start=$cod*

*- عدد من قام بالدخول عبر رابطك: $counmy 👤
- إجمالي أرباحك حتى الآن: $counmyru ₽* 💰
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
#=========={شراء كروت}==========#
if($exdata[0] == "readycard"){
$pri=$exdata[1];
$pri="$pri.00";
if($pri < 10 or $pri > 10000){
unlink("data/id/$id/step.txt");
}else{
$price=$pri*0.04+$pri;
$t=$pri+1;
$i=$pri-1;
$v=$pri+10;
$k=$pri-10;
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- عبر هذا القسم تستطيع شراء كرت شحن في البوت وبيعة او إهدائة لأي صديق لك*
✅ - يتم تحديث *السعر تلقائياً عند الضغط على (➕ أو ➖ )* ⬇️

🅿️ - قيمة الكرت: *₽ $pri*
💸 - سعر الكرت: *₽ $price*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ شراء كرت شحن بقيمة ( ₽ $pri )",'callback_data'=>"Vi-$pri-$price"]],
[['text'=>"➖ 1 ₽",'callback_data'=>"readycard-$i"],['text'=>"➕ 1 ₽",'callback_data'=>"readycard-$t"]],
[['text'=>"➖ 10 ₽",'callback_data'=>"readycard-$k"],['text'=>"➕ 10 ₽",'callback_data'=>"readycard-$v"]],
[['text'=>'- رجوع.','callback_data'=>'MyAccount']]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
if($exdata[0] == "Vi"){
$point = $exdata[1];
$price = $exdata[2];
$cardbot2=$cardbot+1;
$card = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), -8);
$idcard = substr(str_shuffle('12345689807'),1,9);
$pri = $price - $point;
$Balancee = $Balance - $price;
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- ارجوا الانتظار ●○
?? - الكرت قيد التجهيز* ♻️
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id,
]);
sleep(1);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- ارجوا الانتظار ●●○
🧩 - جاري شحن الكرت بقيمة ₽ $points* ♻️
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id,
]);
sleep(1);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- تم التجهيز بنجاح ●●●
🧩 - تم صنع كرت شحن بقيمة ₽ $points* ✅
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id,
]);
sleep(1);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- تم شراء الكرت بنجاح* ↘️

🎛 - أيدي المعاملة: *$idcard*
💰 - سعر الكرت: *₽ $price*
💸 - فئة الكرت: *₽ $point*
🎟 - الكرت: `$card` ⏭

✅ - *إضغط على الكرت ليتم نسخة!*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ صنع كرت شحن آخر! ↖️",'callback_data'=>'readycard-10']],
[['text'=>"- رجوع.",'callback_data'=>"MyAccount"]]
]
])
]);
bot('sendMessage',[
'chat_id'=>$eer,
'text'=>"
🎟 - تم شراء كرت الآن ⚜

🅿️ - فئة الكرت: *₽ $point*
🛅 - الكرت: *$card*
💰 - رصيده المتبقي: *$Balancee*
🧭 - رقم العملية: *$idcard*
🛃 - سعر الكرت: *₽ $price*
🤸‍♂ - الحساب: *$EM* 🌐
🔎 - رقم العمل: *$cardbot2*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ - رابط العضو ↖️",'url'=>"tg://openmessage?user_id=$id"]]
]
])
]);
$sool['card'][$card][amount] = $point;
$sool['card'][$card]['idcar'] = $EM;
$sool['card'][$card]['order'] = $cardmy;
$sool['card'][$card]['name'] = $first;
Sool($sool);
$BUYSCARD[$cardmy][idCard] = $cardbot2;
$BUYSCARD[$cardmy][card] = $card;
$BUYSCARD[$cardmy][price] = $price;
$BUYSCARD[$cardmy][id] = $idcard;
$BUYSCARD[$cardmy][status] = -1;
$BUYSCARD[$cardmy][amount] = $point;
$BUYSCARD[$cardmy]["chat-id"] = $id;
$BUYSCARD[$cardmy][emil] = $EM;
$BUYSCARD[$cardmy][DAY] = $DAY;
CardBuys($BUYSCARD,$EM);
$points = file_get_contents("EMILS/$EM/points.txt");
$as = $points - $price;
file_put_contents("EMILS/$EM/points.txt",$as);
$pointall = file_get_contents("data/txt/pointall.txt");
$alls = $pointall - $price;
file_put_contents("data/txt/pointall.txt",$alls);
$ORDERALL[card] +=1;
OrdAll($ORDERALL);
unlink("data/id/$id/step.txt");
}
#=========={شحن الرصيد}==========#
if($data == "Payment"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- تستطيع شحن حسابك الان عبر:

💸 #إيداع_كريمي_وتحويل
💸 #تحويل_صرافة_يمنية
💸 #بطائق_سوا_stc_موبايلي
💸 #بايير_وعملات_رقمية
💸 #راجحي #stcpay #أهلي
💸 #اسياسيل #زين_كاش*

🥇 - [إضغط هنا](t.me/$chall/2104) لرؤية *أسعار الشحن* 💰

🎬 - للشحن تواصل مع *الوكيل الرسمي للبوت* ✅
👨‍💻 فريق الدعم : *@$useradmin*
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'💭 - تواصل بـ فريق الدعم ↖️','url'=>"tg://user?id=$sudo"]],
[['text'=>'🎁 - الشحن عبر إدخال كرت. ☑️','callback_data'=>'Card']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
}
#============{شحن كرت}=========#
if($data == "Card"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - *مرحباً بك عزيزي,* لشحن رصيدك قم بإرسال *الكرت الشحن الخاص ب البوت* والمكون من *8 أرقام وحروف* ⬇️
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'Payment']]
]
])
]);
file_put_contents("data/id/$id/step.txt","po");
}
if($text && $text !== "/start" and $step == 'po'){
if($sool['card'][$text] !== null){
$amount = $sool['card'][$text]['amount'];
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☑️ - انت على وشك شحن كرت روبل في حسابك

💸 - قيمة الكرت: *₽ $amount*
🚀 - الكرت: *$text*
🎛 - هل تريد تحصيل الكرت في حسابك؟!
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'نعم - ☑️','callback_data'=>"YECard-$text"]],
[['text'=>'- رجوع.','callback_data'=>'Payment']]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🧩 - عذراً عزيزي, *الكرت خاطئ,* أو *سبقك أحدٌ في تحصيل قيمته!* حاول مجدداً بعد شراء كرت آخر ✅
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'Payment']]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
if($exdata[0] == "YECard"){
$carts=$exdata[1];
if($sool['card'][$carts] !== null and $sool['card'][$carts][amount] !== null){
$amount = $sool['card'][$carts]['amount'];
$emil = $sool['card'][$carts]['idcar'];
$name = $sool['card'][$carts]['name'];
$idcar = $EMILS['emils'][$emil]['id'];
$order = $sool['card'][$carts]['order'];
$BUYSCARD = json_decode(file_get_contents("EMILS/$emil/card.json"),true);
$idcard = $BUYSCARD[$order][idcard];
$points = $Balance + $amount;
$idSend = $BUYSCARD[$order][id];
$idd = $BUYSCARD[$order]["chat-id"];
$emile = $BUYSCARD[$order][emil];
$price = $BUYSCARD[$order][price];
$idcard = $BUYSCARD[$order][idcard];
$DAYS = $BUYSCARD[$order][DAY];
if($emil == "ok"){
$idSend = rand(1234567,9999999);
$idd = $sool['card'][$carts]['id'];
$emile = $EMIL[$idd]['emil'];
$price = $amount;
$idcard = $sool['card'][$carts]['idcard'];
$tims = $sool['card'][$carts]['time'];
$days = $sool['card'][$carts]['day'];
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- تم تحصيل قيمة كرت الشحن وإضافة $amount روبل إلى حسابك بنجاح* ↪️
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
bot('sendMessage',[
'chat_id'=>$idcar,
'text'=>"
☑️ *- مرحبا بك عزيزي ؛
🏋‍♂ - لقد قام :* [$first](tg://user?id=$chat_id)

🧩 *- بـ شحن كرت قمت أنت بإنتاجها ✅
🚀 - الكرت :* `$carts`
🅿️ *- قيمة الكرت : ₽ $amount*
",
'parse_mode'=>"MarkDown",
]);
bot('sendMessage',[
'chat_id'=>$eer,
'text'=>"
🎟 - تم شحن كرت في البوت ⚜
🎫 - لصالح: *$emil* 🌐

🅿️ - القيمة: *₽ $amount*
💰 - رصيده: *₽ $points*
🛅 - الكرت: *$carts*
🎗 - الشاحن: *$EM* 🌐
🔎 - رقم العمل: *$idcard*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ - رابط العضو ↖️",'url'=>"tg://openmessage?user_id=$id"]]
]
])
]);
$points = file_get_contents("EMILS/$EM/points.txt");
$as = $points + $amount;
file_put_contents("EMILS/$EM/points.txt",$as);
if($emil == "ok"){
$pointall = file_get_contents("data/txt/pointall.txt");
$alls = $pointall + $amount;
file_put_contents("data/txt/pointall.txt",$alls);
$rubleall = file_get_contents("data/txt/rubleall.txt");
$dlls = $rubleall + $amount;
file_put_contents("data/txt/rubleall.txt",$dlls);
}
if($sool['card'][$carts][order] !== null){
$BUYSCARD[$order][status] = 1;
$BUYSCARD[$order]["user_chat-id"] = $id;
$BUYSCARD[$order][user_emil] = $EM;
$BUYSCARD[$order][DAY_shipping] = $DAY;
CardBuys($BUYSCARD,$emil);
}
$BUYSPRIC[$pricmy][id] = $idSend;
$BUYSPRIC[$pricmy][card] = $carts;
$BUYSPRIC[$pricmy][price] = $price;
$BUYSPRIC[$pricmy][status] = 2;
$BUYSPRIC[$pricmy][idcard] = $idcard;
$BUYSPRIC[$pricmy][amount] = $amount;
$BUYSPRIC[$pricmy][via] = 4;
$BUYSPRIC[$pricmy]["chat-id"] = $id;
$BUYSPRIC[$pricmy]["user_chat-id"] = $idd;
$BUYSPRIC[$pricmy][emil] = $EM;
$BUYSPRIC[$pricmy][user_emil] = $emile;
$BUYSPRIC[$pricmy][user_name] = $name;
$BUYSPRIC[$pricmy][DAY] = $DAYS;
$BUYSPRIC[$pricmy][DAY_shipping] = $DAY;
PricBuys($BUYSPRIC,$EM);
if($emil != $EM){
$ORDERALL[add] +=1;
OrdAll($ORDERALL);
$rubles = file_get_contents("EMILS/$EM/rubles.txt");
$ds = $rubles - $amount;
file_put_contents("EMILS/$EM/rubles.txt",$ds);
}
unset($sool['card'][$carts]);
Sool($sool);
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🔰 *- عذراً، قد سبقك أحدٌ في تحصيل قيمته!* ✅
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'allcart']]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
#=========={الإعدادات}==========#
if($data == 'MyAccount'){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- قسم الإعدادات الخاصة لحسابك.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🔑︙تعديل كلمة سر الحساب','callback_data'=>"changepass"]],
[['text'=>'🔄︙تحويل روبل إلى حساب','callback_data'=>"SendCoin"]],
[['text'=>'☑️︙إستلام تحويل روبل','callback_data'=>"receiptpri"]],
[['text'=>'✅︙الدخول بحساب آخر','callback_data'=>"login_2"]],
[['text'=>'⚠️︙تسجيل الخروج من الحساب','callback_data'=>"logout"]],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
}
#=========={تغيير كلمة المرور}==========#
if($data == "changepass"){
$idEM = $EMILS['emils'][$EM]['id'];
if($idEM != $id and $sudo != $id){
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - حسنا عزيزي، *أرسل كلمة السر الجديدة:*
⚠️ - يجب ان تكون *أكبر من 6 أرقام.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"MyAccount"]]
]
])
]);
file_put_contents("data/id/$id/step.txt","changepass");
}
}
if($text && $text != '/start' && $step == "changepass"){
$pass = $EMILS['emils'][$EM]['pass'];
preg_match_all("/([a-z]*)|([0-9]*)/i",$text,$n);
$text = join ("",$n[0]);
$num = mb_strlen("$text");
if($text === $pass){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️ - كلمة المرور هذه مستخدمة من قبل!
",
'reply_to_message_id'=>$message_id,
]);
}elseif($num < 6){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- كلمة المرور قصيرة جداً 🤖
- يجب ان تكون كلمة مرورك اكثر من 6 أرقام او احرف.
- نقترح استخدام رقم هاتفك ✅.
",
'reply_to_message_id'=>$message_id,
]);
}else{
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🔏 - *تم تغيير كلمة مرورك بنجاح* ✅

☑️ - كلمة السر القديمه: *$pass* ♻️
🔐 - كلمة السر الجديده: *$text* 🌀
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"MyAccount"]]
]
])
]);
bot('SendMessage',[
'chat_id'=>$eer,
'text'=>"
🔰 - قام احدهم بتغيير كلمة السر لحسابة؟!

📧 - الحساب: *$EM*
♻️ - كلمة السر القديمة: *$pass*
🔐 - كلمة السر الجديدة: *$text*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ - رابط العضو ↖️",'url'=>"tg://openmessage?user_id=$id"]]
]
])
]);
unlink("data/id/$id/step.txt");
$EMILNow['password'][$chat_id] = $text;
Now($EMILNow);
$EMIL[$id]['pass'] = "$text";
Aemil($EMIL);
$EMILS['emils'][$EM]['pass'] = "$text";
Bemil($EMILS);
}
}
#=========={تحويل روبل}=========#
if($data == "SendCoin"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - يمكنك الآن *تحويل رصيد من حسابك الى حساب شخص آخر* بشكل مباشر وفي مدة *لاتتعدى الـ 10 ثواني* ✅

🔄 - عمولة التحويل: *%0* ⚜
⚠️ - أقل مبلغ للتحويل: *₽ 20.00* 💸

⬅️ *- هل تريد تحويل رصيد الى حساب آخر؟!* ⤵️
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'نعم ☑️','callback_data'=>'YESSend']],
[['text'=>'- رجوع.','callback_data'=>'MyAccount']]
]
])
]);
unlink("data/id/$id/step.txt");
}
if($data == "YESSend"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*↙️ - أرسل الحساب ( الإيميل ) الذي تريد التحويل إليه* ☑️
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- إلغاء العملية ❎','callback_data'=>'SendCoin']]
]
])
]);
file_put_contents("data/id/$id/step.txt","se");
}
if($text !== '/start' and $text !== null and $step == 'se'){
if($EMILS['emils'][$text]['emil'] == null){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️ - الحساب الذي أرسلته غير صحيح!
📛 - قد يكون الحساب *محذوف* او *لم يتم إنشاؤه بعد*
☑️ *- الرجاء التأكد من الحساب والمحاولة مجددا* ♻️
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
exit;
}elseif($EM == $text){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️ - لايمكن التحويل لنفس الحساب عزيزي العميل 😐
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
}else{
$pri=0;
$price=0/100*$pri+$pri;
$t=$price+1;
$i=$price-1;
$v=$price+10;
$k=$price-10;
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☑️ *- الحساب : [$text]
🔄 - قم ب إنشاء القيمة الذي تريد تحوليها إلى صديقك*
✅ - يتم تحديث *السعر تلقائياً عند الضغط على (➕ أو ➖ )* ⬇️

💸 - رصيدك الموجود في حسابك هو: *₽ $Balance* ✅
🅿️ - القيمة المختارة: *₽ $pri*
",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ - تأكد تحويل رصيد بقيمة ( ₽ $pri )",'callback_data'=>"YSg-$pri-$price-$text"]],
[['text'=>"➖ 1 ₽",'callback_data'=>"increase-$i-$text"],['text'=>"➕ 1 ₽",'callback_data'=>"increase-$t-$text"]],
[['text'=>"➖ 10 ₽",'callback_data'=>"increase-$k-$text"],['text'=>"➕ 10 ₽",'callback_data'=>"increase-$v-$text"]],
[['text'=>'- إلغاء العملية ❎','callback_data'=>'SendCoin']]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
if($exdata[0] == "increase"){
$pri = $exdata[1];
$emils = $exdata[2];
$pri="$pri.00";
if($pri < 0 or $pri > 10000){
unlink("data/id/$id/step.txt");
}else{
$price=0/100*$pri+$pri;
$t=$price+1;
$i=$price-1;
$v=$price+10;
$k=$price-10;
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- الحساب : [$emils]
🔄 - قم ب إنشاء القيمة الذي تريد تحوليها إلى صديقك*
✅ - يتم تحديث *السعر تلقائياً عند الضغط على (➕ أو ➖ )* ⬇️

💸 - رصيدك الموجود في حسابك هو: *₽ $Balance* ✅
🅿️ - القيمة المختارة: *₽ $pri*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ - تأكد تحويل رصيد بقيمة ( ₽ $pri )",'callback_data'=>"YSg-$pri-$price-$emils"]],
[['text'=>"➖ 1 ₽",'callback_data'=>"increase-$i-$emils"],['text'=>"➕ 1 ₽",'callback_data'=>"increase-$t-$emils"]],
[['text'=>"➖ 10 ₽",'callback_data'=>"increase-$k-$emils"],['text'=>"➕ 10 ₽",'callback_data'=>"increase-$v-$emils"]],
[['text'=>'- إلغاء العملية ❎','callback_data'=>'SendCoin']]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
if($exdata[0] == "YSg"){
$price = $exdata[1];
$coun = $exdata[2];
$emils = $exdata[3];
$iddd = $EMILS['emils'][$emils]['id'];
$rubel = $coun-$price;
$points = $Balance - $coun;
if($emils == null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*- حدث خطأ ما لديك أعد المحاولة مرة أخرى* ♻️
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'SendCoin']]
]
])
]);
unlink("data/id/$id/step.txt");
}elseif($coun <= $Balance){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📋 - تفاصيل المستلم: ⬇️

🗞️ - الحساب: *$emils* 🌐
💵 - المبلغ المرسل: *₽ $price* ✅
💸 - العمولة: *₽ $rubel* 💰
☑️ - الإجمالي: *₽ $coun* ⚜️

📋 - تفاصيل المرسل: ⬇️

🗞️ - الحساب: *$EM* 🌐
💵 - المبلغ المخصوم: *₽ $coun* ✅
💰 - رصيدك قبل التحويل: *₽ $Balance* 💸
⚜️ - رصيدك بعد التحويل: *₽ $points* 💰

💵 *- العمولة والرسوم: عليك ☑️

⚠️ - هل تريد تأكيد التحويل؟!* ↙️
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'تأكييد ☑️','callback_data'=>"YSb-$price-$coun-$emils"]],
[['text'=>'- رجوع.','callback_data'=>'SendCoin']]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
⚠️ *- رصيدك غير كافي لإتمام عملية التحويل
☑️ - تم إلغاء العملية*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'SendCoin']]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
if($exdata[0] == "YSb"){
$price = $exdata[1];
$coun = $exdata[2];
$emils = $exdata[3];
$sendbot2=$sendbot+1;
$cel = file_get_contents("EMILS/$emils/points.txt");
$to = $cel + $price;
$rubel = $coun-$price;
$geet = $Balance - $coun;
$idEM = $EMILS['emils'][$emils]['id'];
$idSend = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 8-16);
$code = rand(12345,99999);
$code = "$sendbot$code";
if($coun > $Balance){
exit;
}elseif($coun == null or $price == null or $emils == null or $idEM == null){
unlink("data/id/$id/step.txt");
exit;
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
✅︙تم تحويل ₽ $price الى *[$emils] بنجاح!*
⛔️ *⁞ تم خصم ₽ $coun من رصيدك* ✅
☑️ *⁞ رقم عملية لإستلام الروبل:* `$code`

🅿️︙رقم العملية: *$idSend* 🆔
🔄︙رصيدك الأن: *₽ $geet* 💰
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
bot('sendmessage',[
'chat_id'=>$idEM,
'text'=>"
💰 *⁞ تم تحويل : ₽ $price
✅︙من : *[$first](tg://user?id=$chat_id)

☑️ *⁞ لإستلام هذه التحويل إذهب إلى قسم الإعدادات ومن ثم إلى قسم إستلام الروبل وأرسل رقم العملية الذي ستستلمها من المحول*
",
'parse_mode'=>"MarkDown",
]);
bot('sendmessage',[
'chat_id'=>$eer,
'text'=>"
✅ - *قام عضو بتحويل روبل في البوت*

💸 - المبلغ المحول: *₽ $price* 💰
🗒 - العمولة: *₽ $rubel* ♻️
♻️ - رصيده المتبقي: *₽ $geet* 💸
🗞️ - حساب المرسل: *[$EM]* 🌐
💵 - حساب المستلم: *[$emils]* 🌐
✳️ - سيكون رصيد المستلم: *₽ $to* 💸
☑️ - رقم عملية إستلام الروبل: *$code*
🔎 - رقم العمل: *$sendbot2*
🅿️ - رقم المرجع: *$idSend*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ - رابط المرسل ↖️",'url'=>"tg://openmessage?user_id=$id"]],
[['text'=>"☑️ - رابط المستلم ↖️",'url'=>"tg://openmessage?user_id=$idEM"]]
]
])
]);
$points = file_get_contents("EMILS/$EM/points.txt");
$as = $points - $coun;
file_put_contents("EMILS/$EM/points.txt",$as);
$BUYSPRIC = json_decode(file_get_contents("EMILS/$emils/price.json"),true);
$idd = count($BUYSPRIC);
$BUYSSEND[$sendmy][idSend] = $sendbot+1;
$BUYSSEND[$sendmy][id] = $idSend;
$BUYSSEND[$sendmy][price] = $coun;
$BUYSSEND[$sendmy][amount] = $price;
$BUYSSEND[$sendmy][code] = $code;
$BUYSSEND[$sendmy][status] = 1;
$BUYSSEND[$sendmy][idpric] = $idd;
$BUYSSEND[$sendmy]["chat-id"] = $id;
$BUYSSEND[$sendmy]["user_chat-id"] = null;
$BUYSSEND[$sendmy][user_emil] = $emils;
$BUYSSEND[$sendmy][DAY] = $DAY;
SendBuys($BUYSSEND,$EM);
$BUYSPRIC[$idd][id] = $idSend;
$BUYSPRIC[$idd][price] = $price;
$BUYSPRIC[$idd][status] = 1;
$BUYSPRIC[$idd][code] = $code;
$BUYSPRIC[$idd][idsend] = $sendbot+1;
$BUYSPRIC[$idd][via] = 3;
$BUYSPRIC[$idd]["chat-id"] = null;
$BUYSPRIC[$idd]["user_chat-id"] = $id;
$BUYSPRIC[$idd][emil] = $emils;
$BUYSPRIC[$idd][user_emil] = $EM;
$BUYSPRIC[$idd][user_name] = $first;
$BUYSPRIC[$idd][DAY] = $DAY;
PricBuys($BUYSPRIC,$emils);
$ORDERALL[send] +=1;
OrdAll($ORDERALL);
$sool[send][$code][idsen] = $EM;
$sool[send][$code][order] = $sendmy;
Sool($sool);
unlink("data/id/$id/step.txt");
}
}
#========={إستلام الروبل}==========#
if($data == "receiptpri"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- أرسل رقم الحماية الآن*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'MyAccount']]
]
])
]);
file_put_contents("data/id/$id/step.txt","receiptpri");
}
if($text && $text != null && $text != '/start' && $step == "receiptpri"){
$code=$text;
$order = $sool[send][$code][order];
$emil = $sool[send][$code][idsen];
$BUYSSEND = json_decode(file_get_contents("EMILS/$emil/send.json"),true);
$idd=$BUYSSEND[$order]["chat-id"];
$price=$BUYSSEND[$order][amount];
$idSend=$BUYSSEND[$order][id];
if($BUYSSEND[$order][status] == 3){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
♻️ *- رقم العملية هذه مقيده من قبل المشرف، حاول مره أخرى بعد قليل*
",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"MarkDown",
]);
unlink("data/id/$id/step.txt");
}elseif($sool[send][$code] == null or $BUYSSEND[$order][code] != $text or $BUYSSEND[$order][user_emil] != $EM or $BUYSSEND[$order][status] != 1){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
❌ *- رقم العملية غير صحيح*
",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"MarkDown",
]);
}else{
bot('sendmessage',[
'chat_id'=>$idd,
'text'=>"
☑️ *- تم إستلام الحوالة الذي قمت بإرسالها*
🅿️ - رقم العملية : *$idSend*
",
'parse_mode'=>"MarkDown",
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
☑️ *- تم إستلام حوالتك بقيمة ₽ $price روبل*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
bot('sendmessage',[
'chat_id'=>$eer,
'text'=>"
☑️ *- تم إستلام حوالة روبل على رقم $code*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ - رابط العضو ↖️",'url'=>"tg://openmessage?user_id=$id"]]
]
])
]);
$points = file_get_contents("EMILS/$EM/points.txt");
$as = $points + $price;
file_put_contents("EMILS/$EM/points.txt",$as);
$rubles = file_get_contents("EMILS/$EM/rubles.txt");
$ds = $rubles + $price;
file_put_contents("EMILS/$EM/rubles.txt",$ds);
$idd = $BUYSSEND[$order][idpric];
$BUYSSEND[$order][status] = 2;
$BUYSSEND[$order]["user_chat-id"] = $id;
$BUYSSEND[$order][DAY_shipping] = $DAY;
SendBuys($BUYSSEND,$emil);
$BUYSPRIC[$idd][status] = 2;
$BUYSPRIC[$idd]["chat-id"] = $id;
$BUYSPRIC[$idd][DAY_shipping] = $DAY;
PricBuys($BUYSPRIC,$EM);
unset($sool['send'][$BUYSSEND[$order][code]]);
Sool($sool);
unlink("data/id/$id/step.txt");
}
}
#========={إلغاء التحويل}==========#
if($exdata[0] == "CancelTransfer"){
$order=$exdata[1];
$status_send = $exdata[2];
$idSend = $BUYSSEND[$order][id];
$status = $BUYSSEND[$order][status];
if($status != 1 or $status_send != $idSend){
if($sendmy == null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *⁞ هنا جميع سجلات حسابك وحساب المستخدمين في البوت* 🚀
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⁞ سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'⁞ سجل حسابك الشخصي. 🗂','callback_data'=>'Record2']],
[['text'=>'⁞ سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'⁞ سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'⁞ سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'⁞ سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'⁞ رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}else{
$key     = [];
$key['inline_keyboard'][] = [['text'=>"- رقم العملية 🅿️",'callback_data'=>"no"],['text'=>"- الحالة ☑️",'callback_data'=>"no"]];
foreach($BUYSSEND as $zero=>$num){
$oop++;
if($oop >= 8){
break;
}
if($BUYSSEND[8] != null){
$to="التالي. ⬅️";
}
$statuse = $num[status];
$status=str_replace(["-1","1","2","3"],["🚫","⏰","☑️","⏰"],$statuse);
$idSend = $num[id];
$key['inline_keyboard'][] = [['text'=>"$idSend",'callback_data'=>"sSendBuy#$zero#$idSend#1"],['text'=>"$status",'callback_data'=>"file"]];
}
$key['inline_keyboard'][] = [['text'=>"$to",'callback_data'=>"Download4#2"]];
$key['inline_keyboard'][] = [['text'=>'- رجوع.','callback_data'=>'Record']];
$keyboad      = json_encode($key);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - هذه قائمة *جميع عمليات التحويلات للروبل في البوت.*
⚜ - هذه العلامة *< ☑️ > تعني أن العملية تمت بنجاح* ، وهذه العلامة *< 🚫 > تعني أن العملية قد تم إلغائها* ، وهذه العلامة *< ⏰ > تعني أن العملية قيد الإنتظار.*
♻️ - إضغط على *رقم العلامة لإظهار باقي معلومات عن عملية التحويل الذي قمت بتحويلة.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>($keyboad),
]);
unlink("data/id/$id/step.txt");
exit;
}
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- تم إرسال طلب عملية إلغاء لهذا التحويل برقم $idSend*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"sSendBuy#$order#$status_send#1"]]
]
])
]);
bot('sendMessage',[
'chat_id'=>$sudo,
'text'=>"
☑️ *- إشعار عملية إلغاء برقم $idSend*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'☑️ - موافقة الطلب','callback_data'=>"yesTransfer-$order-$EM"]],
[['text'=>'🚫 - رفض الطلب','callback_data'=>"noTransfer-$order-$EM"]]
]
])
]);
$idd = $BUYSSEND[$order][idpric];
$idEM = $BUYSSEND[$order][user_emil];
$BUYSSEND[$order][status] = 3;
SendBuys($BUYSSEND,$EM);
$BUYSPRIC = json_decode(file_get_contents("EMILS/$idEM/price.json"),true);
$BUYSPRIC[$idd][status] = 3;
PricBuys($BUYSPRIC,$idEM);
unlink("data/id/$id/step.txt");
}
}
#========={موافقة الطلب}==========#
if($exdata[0] == "yesTransfer"){
$order=$exdata[1];
$emil=$exdata[2];
$BUYSSEND = json_decode(file_get_contents("EMILS/$emil/send.json"),true);
$status = $BUYSSEND[$order][status];
$idSend = $BUYSSEND[$order][id];
$coun = $BUYSSEND[$order][price];
$idds = $BUYSSEND[$order]["chat-id"];
if($status != 3){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- رقم العملية قد تم تغييرها $idSend*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"c"]]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- تم إلغاء العملية رقم $idSend بنجاح*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"c"]]
]
])
]);
bot('sendMessage',[
'chat_id'=>$idds,
'text'=>"
☑️ *- تم الموافقة على طلب إلغاء تحويل روبل برقم $idSend*
💸 - تم إرجاع الرصيد إلى حسابك: *₽ $coun*
",
'parse_mode'=>"MarkDown",
]);
$idd = $BUYSSEND[$order][idpric];
$idEM = $BUYSSEND[$order][user_emil];
$idch = $EMILS['emils'][$idEM]['id'];
$BUYSSEND[$order][status] = -1;
$BUYSSEND[$order]["user_chat-id"] = $idch;
$BUYSSEND[$order][DAY_shipping] = $DAY;
SendBuys($BUYSSEND,$emil);
$BUYSPRIC = json_decode(file_get_contents("EMILS/$idEM/price.json"),true);
$BUYSPRIC[$idd][status] = -1;
$BUYSPRIC[$idd]["chat-id"] = $idch;
$BUYSPRIC[$idd][DAY_shipping] = $DAY;
PricBuys($BUYSPRIC,$idEM);
$points = file_get_contents("EMILS/$emil/points.txt");
$as = $points + $coun;
file_put_contents("EMILS/$emil/points.txt",$as);
unset($sool['send'][$BUYSSEND[$order][code]]);
Sool($sool);
unlink("data/id/$id/step.txt");
}
}
#========={رفض الطلب}==========#
if($exdata[0] == "noTransfer"){
$order=$exdata[1];
$emil=$exdata[2];
$BUYSSEND = json_decode(file_get_contents("EMILS/$emil/send.json"),true);
$status = $BUYSSEND[$order][status];
$idSend = $BUYSSEND[$order][id];
$idds = $BUYSSEND[$order]["chat-id"];
if($status != 3){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- رقم العملية قد تم تغييرها $idSend*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"c"]]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- تم رفض طلب إلغاء العملية رقم $idSend*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"c"]]
]
])
]);
bot('sendMessage',[
'chat_id'=>$idds,
'text'=>"
🚫 *- تم رفض طلب إلغاء تحويل روبل برقم $idSend*
",
'parse_mode'=>"MarkDown",
]);
$idd = $BUYSSEND[$order][idpric];
$idEM = $BUYSSEND[$order][user_emil];
$BUYSSEND[$order][status] = 1;
SendBuys($BUYSSEND,$emil);
$BUYSPRIC = json_decode(file_get_contents("EMILS/$idEM/price.json"),true);
$BUYSPRIC[$idd][status] = 1;
PricBuys($BUYSPRIC,$idEM);
unlink("data/id/$id/step.txt");
}
}
#========={تسجيل الدخول_2}==========#
if($data == "login_2"){
$emile = $EMIL[$chat_id]['emil'];
$password = $EMILS['emils'][$emile]['pass'];
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*♻️ - يرجى إرسال الحساب او الإيميل الذي تريد تسجيل الدخول عليه ، (يجب أن يكون هذا الإيميل مسجل بالبوت. ⚠️)

☑️ - اذا لديك حساب من قبل سيضهر في الأسفل ، إضغط عليه لتسجيل الدخول ✅.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- $emile .",'callback_data'=>"emils-$emile-$password"]],
[['text'=>'- رجوع.','callback_data'=>"MyAccount"]]
]
])
]);
file_put_contents("data/id/$id/step.txt","login_2");
}
if($text != '/start' && $text != null && $step == 'login_2'){
$pass=$EMILS['emils'][$text]['pass'];
$IDem=$EMILS['emils'][$text]['id'];
if($EMILS['emils'][$text]['emil'] == null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️ *- لم يتم إنشاء حساب ب هذا الإيميل في البوت!*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"MyAccount"]]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
☑️ *- يرجى الإنتظار يتم فحص الحساب ⏳...*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
sleep(1);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🔐 *- ادخل كلمة مرور حسابك الأن* ☑️
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⚠️ - طلب المساعدة",'callback_data'=>"super"]],
[['text'=>'- رجوع.','callback_data'=>"MyAccount"]]
]
])
]);
file_put_contents("data/id/$id/step.txt","pasword_2|$text");
}
}
if($text != '/start' && $text != null && $exstep[0] == 'pasword_2'){
$emile = $exstep[1];
$passe = $EMILS['emils'][$emile]['pass'];
if($text !== $passe){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
*♻️ - كلمة المرور ليست صحيحة ⛔️*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"MyAccount"]]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
$get=bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♻️ *- تم التحقق بنجاح، انتظر قليلا ....*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id,
]);
sleep(1);
$get=$get->result->message_id;
bot('deletemessage',[
'chat_id'=>$chat_id, 
'message_id'=>$get,
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⤵️ *- يمكنك الآن الضغط على الإيميل بالأسفل للتسجيل* ☑️
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$emile",'callback_data'=>"emils-$emile-$passe"]]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
#=========={تسجيل الخروج}==========#
if($data == "logout"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- تم تسجيل الخروج من الحساب [$EM] بنجاح*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- رجوع.",'callback_data'=>"startup"]]
]
])
]);
$EMILNow['emil'][$chat_id] = null;
$EMILNow['password'][$chat_id] = null;
Now($EMILNow);
unlink("data/id/$id/step.txt");
}
#=========={الإحصائيات}==========#
if($data == "statsbot"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📊 - *إحصائيات البوت :*

✅ - عدد العملاء النشطين: *$count* 🙋🏻
📞 - عدد الأرقام المكتملة: *$numbot* 🎖
☎️ - عدد الأرقام الجاهزة التي تم شراؤها: *$readybot* 🚀
🎟 - عدد الكروت التي تم شراؤها: *$cardbot* 🏆
💸 - وصل الروبل المصروف الى: *₽ $money* 💰
☑️ - عدد الروبل المتبقى: *₽ $poi_money* 💰
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'بيانات حسابك 🗃','callback_data'=>'Record2']],
[['text'=>'- رجوع.','callback_data'=>"Record"]]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
if($text == '/my' and $id != $sudo){
if($EM == null or $EMILS['emils'][$EM]['emil'] == null or $passewo != $perrewo){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♐️ - مرحبا بك [$first](tg://user?id=$id) ؛ 🤍

*- في بوت @n_u_m_11* ؛ البوت الأفضل على التليجرام والذي يقوم بتوفير *خدمات الأرقام الوهمية* ل مواقع السوشيال ميديا مثل *التيليجرام والواتساب والتويتر وغيره* 👾

*- قم بإنشاء حساب جديد* ؛ واذا كان لديك حساب من قبل: قم بالضغط على زر *تسجيل الدخول* ☑️
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'لديكَ حساب؟ تسجيل دخول 📲','callback_data'=>"login"]],
[['text'=>'إنشاء حساب جديد ☑️','callback_data'=>"sign_in"]],
[['text'=>'شروط الإستخدام وإخلاء للمسؤلية 🚨','callback_data'=>"to_explain"]],
[["text"=>'إدارة البوت 👨🏻‍💻',"url"=>"tg://user?id=$sudo"]],
[['text'=>'هام للأعضاء الجُدد ⚠️','callback_data'=>"Important"]],
[['text'=>'إحصائيات المستخدمين 📈','callback_data'=>'statsbot2']]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⚙ *- جميع معلومات عن حسابك الشخصي.*

📧 - الحساب: *$EM* ⏩
🔐 - كلمة المرور: *$passewo* 🔑
🆔 - أيدي الحساب: *$id* ®
💸 - رصيدك: *$Balance* 💲
📞 - عدد الأرقام المشترى: *$numbuy* 🔝
☎️ - تم تفعيل: *$buymy رقماً*
♻️ - عمليات التحويل: *$sendmy*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'- سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'- سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'- سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'- سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
if($data == "Record"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا جميع سجلات حسابك وحساب المستخدمين في البوت* 🚀
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'- سجل حسابك الشخصي. 🗂','callback_data'=>'Record2']],
[['text'=>'- سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'- سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'- سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'- سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
if($data == "Record2"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
📊 - *إحصائيات حسابك :*

☑️ - وصل شحن حسابك إلى: *$rubles*
✳️ - عدد الأرقام المكتملة: *$buymy*
✅ - عدد الأرقام الجاهزة التي تم شراؤها: *$readymy*
⚜️ - عدد شحن حسابك بالمرات: *$pricmy مرة*
☑️ - عدد الروبل المصروف: *₽ $consumers*
💠 - عدد الروبل المتبقي: *₽ $Balance*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>'Record']],
[['text'=>'- القائمة الرئيسية 🏘','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
#=========={الدول}==========#
include("number.php");
#=========={الأرقام}==========#
if($data == "Download1"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا سجلات أرقام كثيرة لذا تم توزيعها حسب حالة الرقم

👮‍♂ - إختر قائمة العرض عبر الأزرار في الأسفل.* 👇
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'☑️ - المكتملة.','callback_data'=>'Downloads#3#1']],
[['text'=>'⏰ - قيد الإنتظار.','callback_data'=>'Downloads#1#1'],['text'=>'✅ - تم الإيصال.','callback_data'=>'Downloads#2#1']],
[['text'=>'⌛️ - انتهى وقتها.','callback_data'=>'Downloads#-2#1'],['text'=>'⛔️ - المحضورة.','callback_data'=>'Downloads#-1#1']],
[['text'=>'- رجوع.','callback_data'=>'Record']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}
if($ex_data[0] == "Downloads"){
$add=$ex_data[1];
$con=$ex_data[2];
$x=str_replace(["-1","-2","1","2","3"],["المحضورة","المنتهي صلاحيتها","قيدة الإنتظار","التي تم وصول الكود الخاص بها","المكتملة"],$add);
$jk = $con * 8;
$oj = $con - 1;
$fj = $oj * 8;
$ij = $fj - 7;
$kb = $con + 1;
$jj = $jk - 8;
$ze='0';
if($numbuy == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
❌ - لا يوجد لديك سجل في هذا الحساب!
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($ze >= $jk){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا سجلات أرقام كثيرة لذا تم توزيعها حسب حالة الرقم

👮‍♂ - إختر قائمة العرض عبر الأزرار في الأسفل.* 👇
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'☑️ - المكتملة.','callback_data'=>'Downloads#3#1']],
[['text'=>'⏰ - قيد الإنتظار.','callback_data'=>'Downloads#1#1'],['text'=>'✅ - تم الإيصال.','callback_data'=>'Downloads#2#1']],
[['text'=>'⌛️ - انتهى وقتها.','callback_data'=>'Downloads#-2#1'],['text'=>'⛔️ - المحضورة.','callback_data'=>'Downloads#-1#1']],
[['text'=>'- رجوع.','callback_data'=>'Record']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}else{
$key     = [];
$key['inline_keyboard'][] = [['text'=>'- الرقم ☎️','callback_data'=>'no'],['text'=>'- الكود 💭','callback_data'=>'no'],['text'=>'- السعر 💰','callback_data'=>'no']];
foreach($BUYSNUM[number] as $zero=>$num){
if($num['status'] == $add and $num[type] == "direct"){
$oop++;
if($oop >= $jk){
break;
}
if($oop >= $fj){
if($BUYSNUM[number][$jk] != null){
$to="التالي. ⬅️";
}
if($BUYSNUM[number][$ij] != null){
$s = "➡️ السابق.";
}
$status = $num[phone];
$number = $num[phone];
if($number != null){
$number = substr($number, 0,+8)."•••";
}
$addcod = count($num[sms])-1;
$code = $num[sms][$addcod][code];
if($code == null and $status != null){
$code = '------';
}
$price = $num[price];
$idSend = $num[idSend];
$key['inline_keyboard'][] = [['text'=>"$number",'callback_data'=>"sNumber#$idSend#$status#$add#$con"],['text'=>"$code",'callback_data'=>"sNumber#$idSend#$status#$add#$con"],['text'=>"$price",'callback_data'=>"sNumber#$idSend#$status#$add#$con"]];
}
}
}
$key['inline_keyboard'][] = [['text'=>"$to",'callback_data'=>"Downloads#$add#$kb"],['text'=>"$s",'callback_data'=>"Downloads#$add#$oj"]];
$key['inline_keyboard'][] = [['text'=>'- رجوع.','callback_data'=>'Download1']];
$keyboad      = json_encode($key);
if($number == null and $con == 1){
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"
⚠️ - لا يوجد لديك سجل للأرقام ال $x"."!
",
'show_alert'=>true,
]);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا سجلات أرقام كثيرة لذا تم توزيعها حسب حالة الرقم

👮‍♂ - إختر قائمة العرض عبر الأزرار في الأسفل.* 👇
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'☑️ - المكتملة.','callback_data'=>'Downloads#3#1']],
[['text'=>'⏰ - قيد الإنتظار.','callback_data'=>'Downloads#1#1'],['text'=>'✅ - تم الإيصال.','callback_data'=>'Downloads#2#1']],
[['text'=>'⌛️ - انتهى وقتها.','callback_data'=>'Downloads#-2#1'],['text'=>'⛔️ - المحضورة.','callback_data'=>'Downloads#-1#1']],
[['text'=>'- رجوع.','callback_data'=>'Record']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}elseif($number == null){
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"
⚠️ - لاتوجد صفحة أخرى حالياً.
",
'show_alert'=>true,
]);
unlink("data/id/$id/step.txt");
exit;
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - هذه قائمة *جميع الأرقام الخاصة بك الذي قمت بشرائها*
♻️ - إضغط على *الازرار* لإظهار باقي *معلومات عن الرقم الذي قمت ب شرائة*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>($keyboad),
]);
unlink("data/id/$id/step.txt");
exit;
}
}
#=========={الارقام الجاهزة}==========#
if($ex_data[0] == "Download2"){
$con=$ex_data[1];
$jk = $con * 8;
$oj = $con - 1;
$fj = $oj * 8;
$ij = $fj - 7;
$kb = $con + 1;
$jj = $jk - 8;
$ze='0';
if($readymy == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
❌ - لا يوجد لديك سجل في هذا الحساب!
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($ze >= $jk){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا جميع سجلات حسابك وحساب المستخدمين في البوت* 🚀
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'- سجل حسابك الشخصي. 🗂','callback_data'=>'Record2']],
[['text'=>'- سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'- سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'- سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'- سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}else{
$key     = [];
$key['inline_keyboard'][] = [['text'=>'- الرقم ☎️','callback_data'=>'no'],['text'=>'- الكود 💭','callback_data'=>'no'],['text'=>'- السعر 💰','callback_data'=>'no']];
foreach($BUYSNUM[number] as $zero=>$num){
if($num[type] == "ready"){
$oop++;
if($oop >= $jk){
break;
}
if($oop >= $fj){
if($BUYSNUM[number][$jk] != null){
$to="التالي. ⬅️";
}
if($BUYSNUM[number][$ij] != null){
$s = "➡️ السابق.";
}
$status = $num[phone];
$number = $num[phone];
if($number != null){
$number = substr($number, 0,+8)."•••";
}
$code = $num[code];
$price = $num[price];
$idSend = $num[idSend];
$key['inline_keyboard'][] = [['text'=>"$number",'callback_data'=>"sReady#$idSend#$status#$con"],['text'=>"$code",'callback_data'=>"sReady#$idSend#$status#$con"],['text'=>"$price",'callback_data'=>"sReady#$idSend#$status#$con"]];
}
}
}
$key['inline_keyboard'][] = [['text'=>"$to",'callback_data'=>"Download2#$kb"],['text'=>"$s",'callback_data'=>"Download2#$oj"]];
$key['inline_keyboard'][] = [['text'=>'- رجوع.','callback_data'=>'Record']];
$keyboad      = json_encode($key);
if($number == null){
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"
⚠️ - لاتوجد صفحة أخرى حالياً.
",
'show_alert'=>true,
]);
unlink("data/id/$id/step.txt");
exit;
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - هذه قائمة *جميع الأرقام الجاهزة الذي قمت بشرائها*
♻️ - إضغط على *الازرار* لإظهار باقي *معلومات عن الرقم الذي قمت ب شرائة*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>($keyboad),
]);
unlink("data/id/$id/step.txt");
exit;
}
}
#=========={الكروت}==========#
if($ex_data[0] == "Download3"){
$con=$ex_data[1];
$jk = $con * 8;
$oj = $con - 1;
$fj = $oj * 8;
$ij = $fj - 7;
$kb = $con + 1;
$jj = $jk - 8;
$ze='0';
if($cardmy == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
❌ - لا يوجد لديك سجل في هذا الحساب!
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($ze >= $jk){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا جميع سجلات حسابك وحساب المستخدمين في البوت* 🚀
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'- سجل حسابك الشخصي. 🗂','callback_data'=>'Record2']],
[['text'=>'- سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'- سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'- سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'- سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}else{
$key     = [];
$key['inline_keyboard'][] = [['text'=>"- رقم الكرت 🅿️",'callback_data'=>"no"],['text'=>"- الحالة ☑️",'callback_data'=>"no"]];
foreach($BUYSCARD as $zero=>$num){
$oop++;
if($oop >= $jk){
break;
}
if($oop >= $fj){
if($BUYSCARD[$jk] != null){
$to="التالي. ⬅️";
}
if($BUYSCARD[$ij] != null){
$s = "➡️ السابق.";
}
$status = $num[status];
$status=str_replace(["-1","1"],["🎫","🎟"],$status);
$card = $num[card];
$idCard = $num[idCard];
$key['inline_keyboard'][] = [['text'=>"$card",'callback_data'=>"sCardBuy#$zero#$card#$con"],['text'=>"$status",'callback_data'=>"file"]];
}
}
$key['inline_keyboard'][] = [['text'=>"$to",'callback_data'=>"Download3#$kb"],['text'=>"$s",'callback_data'=>"Download3#$oj"]];
$key['inline_keyboard'][] = [['text'=>'- رجوع.','callback_data'=>'Record']];
$keyboad      = json_encode($key);
if($card == null){
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"
⚠️ - لاتوجد صفحة أخرى حالياً.
",
'show_alert'=>true,
]);
unlink("data/id/$id/step.txt");
exit;
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - هذه قائمة *جميع الكروت الذي قمت بشرائها.*
⚜ - هذه العلامة *< 🎫 > تعني أن الكرت لم يتم إستخدامة بعد* ، وهذه العلامة *< 🎟 > تعني أن الكرت قد تم إستعمالة.*
♻️ - إضغط على *رقم العملية* لإظهار باقي *معلومات عن الكرت الذي قمت ب شرائة.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>($keyboad),
]);
unlink("data/id/$id/step.txt");
exit;
}
}
#=========={التحويلات}==========#
if($ex_data[0] == "Download4"){
$con=$ex_data[1];
$jk = $con * 8;
$oj = $con - 1;
$fj = $oj * 8;
$ij = $fj - 7;
$kb = $con + 1;
$jj = $jk - 8;
$ze='0';
if($sendmy == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
❌ - لا يوجد لديك سجل في هذا الحساب!
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($ze >= $jk){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا جميع سجلات حسابك وحساب المستخدمين في البوت* 🚀
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'- سجل حسابك الشخصي. 🗂','callback_data'=>'Record2']],
[['text'=>'- سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'- سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'- سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'- سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}else{
$key     = [];
$key['inline_keyboard'][] = [['text'=>"- رقم العملية 🅿️",'callback_data'=>"no"],['text'=>"- الحالة ☑️",'callback_data'=>"no"]];
foreach($BUYSSEND as $zero=>$num){
$oop++;
if($oop >= $jk){
break;
}
if($oop >= $fj){
if($BUYSSEND[$jk] != null){
$to="التالي. ⬅️";
}
if($BUYSSEND[$ij] != null){
$s = "➡️ السابق.";
}
$statuse = $num[status];
$status=str_replace(["-1","1","2","3"],["🚫","⏰","☑️","⏰"],$statuse);
$idSend = $num[id];
$key['inline_keyboard'][] = [['text'=>"$idSend",'callback_data'=>"sSendBuy#$zero#$idSend#$con"],['text'=>"$status",'callback_data'=>"file"]];
}
}
$key['inline_keyboard'][] = [['text'=>"$to",'callback_data'=>"Download4#$kb"],['text'=>"$s",'callback_data'=>"Download4#$oj"]];
$key['inline_keyboard'][] = [['text'=>'- رجوع.','callback_data'=>'Record']];
$keyboad      = json_encode($key);
if($idSend == null){
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"
⚠️ - لاتوجد صفحة أخرى حالياً.
",
'show_alert'=>true,
]);
unlink("data/id/$id/step.txt");
exit;
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - هذه قائمة *جميع عمليات التحويلات للروبل في البوت.*
⚜ - هذه العلامة *< ☑️ > تعني أن العملية تمت بنجاح* ، وهذه العلامة *< 🚫 > تعني أن العملية قد تم إلغائها* ، وهذه العلامة *< ⏰ > تعني أن العملية قيد الإنتظار.*
♻️ - إضغط على *رقم العلامة لإظهار باقي معلومات عن عملية التحويل الذي قمت بتحويلة.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>($keyboad),
]);
unlink("data/id/$id/step.txt");
exit;
}
}
#=========={عمليات الشحن}==========#
if($ex_data[0] == "Download5"){
$con=$ex_data[1];
$jk = $con * 8;
$oj = $con - 1;
$fj = $oj * 8;
$ij = $fj - 7;
$kb = $con + 1;
$jj = $jk - 8;
$ze='0';
if($pricmy == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
❌ - لا يوجد لديك سجل في هذا الحساب!
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($ze >= $jk){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا جميع سجلات حسابك وحساب المستخدمين في البوت* 🚀
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'- سجل حسابك الشخصي. 🗂','callback_data'=>'Record2']],
[['text'=>'- سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'- سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'- سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'- سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
exit;
}else{
$key     = [];
$key['inline_keyboard'][] = [['text'=>"- المحول ♻️",'callback_data'=>"no"],['text'=>"- المبلغ 💸",'callback_data'=>"no"],['text'=>"- التاريخ 📆",'callback_data'=>"no"]];
foreach($BUYSPRIC as $zero=>$num){
$oop++;
if($oop >= $jk){
break;
}
if($oop >= $fj){
if($BUYSPRIC[$jk] != null){
$to="التالي. ⬅️";
}
if($BUYSPRIC[$ij] != null){
$s = "➡️ السابق.";
}
$idSend = $num[id];
$via = $num[via];
$price = $num[price];
if($via == 4){
$price = $num[amount];
}
$via=str_replace(["1","2","3","4"],["الإدارة","الوكيل","صديق","كرت شحن"],$via);
$DAYS=$num[DAY];
$year = substr("$DAYS", 0,4);
$month = substr("$DAYS", 4,2);
$day = substr("$DAYS", 6,2);
$when = substr("$DAYS", 14,2);
$when=str_replace(["AM","PM"],["ص","م"],$when);
$days = "$day-$month-$year $when";
$key['inline_keyboard'][] = [['text'=>"$via",'callback_data'=>"sSendPric#$zero#$idSend#$con"],['text'=>"$price",'callback_data'=>"sSendPric#$zero#$idSend#$con"],['text'=>"$days",'callback_data'=>"sSendPric#$zero#$idSend#$con"]];
}
}
$key['inline_keyboard'][] = [['text'=>"$to",'callback_data'=>"Download5#$kb"],['text'=>"$s",'callback_data'=>"Download5#$oj"]];
$key['inline_keyboard'][] = [['text'=>'- رجوع.','callback_data'=>'Record']];
$keyboad      = json_encode($key);
if($idSend == null){
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"
⚠️ - لاتوجد صفحة أخرى حالياً.
",
'show_alert'=>true,
]);
unlink("data/id/$id/step.txt");
exit;
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هذة جميع عمليات شحن حسابك في البوت.

↪️ - اضغط على التاريخ لعرض جميع التفاصيل.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>($keyboad),
]);
unlink("data/id/$id/step.txt");
exit;
}
}
#=========={الأرقام}==========#
if($ex_data[0] == "sNumber"){
$idSend = $ex_data[1];
$status_num = $ex_data[2];
$adds = $ex_data[3];
$con = $ex_data[4];
$order=$ORDERALL[$idSend][order];
$account=$ORDERALL[$idSend][account];
$number = $BUYSNUM[number][$order][phone];
$idSend = $BUYSNUM[number][$order][idSend];
$code1 = $BUYSNUM[number][$order][sms][0][code];
$code2 = $BUYSNUM[number][$order][sms][1][code];
$code3 = $BUYSNUM[number][$order][sms][2][code];
$code4 = $BUYSNUM[number][$order][sms][3][code];
$code5 = $BUYSNUM[number][$order][sms][4][code];
$code6 = $BUYSNUM[number][$order][sms][5][code];
$code7 = $BUYSNUM[number][$order][sms][6][code];
$code8 = $BUYSNUM[number][$order][sms][7][code];
$code9 = $BUYSNUM[number][$order][sms][8][code];
$allcod = count($BUYSNUM[number][$order][sms]);
$statuse = $BUYSNUM[number][$order][status];
$finish = $BUYSNUM[number][$order][finish];
$times = $BUYSNUM[number][$order][times];
$add = $BUYSNUM[number][$order][add];
$app = $BUYSNUM[number][$order][app];
$operator = $BUYSNUM[number][$order][operator];
$idnumber = $BUYSNUM[number][$order][idnumber];
$site = $BUYSNUM[number][$order][site];
$country = $BUYSNUM[number][$order][country];
$zero = $BUYSNUM[number][$order][zero];
$price = $BUYSNUM[number][$order][price];
$BALANCE = $Balance - $price;
$idnum = $BUYSNUM[number][$order][id];
$DAYS = $BUYSNUM[number][$order][DAY];
$year = substr("$DAYS", 0,4);
$month = substr("$DAYS", 4,2);
$day = substr("$DAYS", 6,2);
$hors = substr("$DAYS", 8,2);
$minute = substr("$DAYS", 10,2);
$second = substr("$DAYS", 12,2);
$when = substr("$DAYS", 14,2);
$day="$day-$month-$year $when";
$when=str_replace(["AM","PM"],["ص","م"],$when);
$tims="$hors:$minute:$second $when";
include("name.php");
$name = $_co['country'][$country];
$server = str_replace(["wa","tg","fb","ig","tw","lf","go","im","vi","fu","nf","au","ot"],["Whatsapp","Telegram","Facebook","Instagram","Twitter","TikTok","Google","Imo","Viber","Snapchat","Netflix","Haraj","Other"],$app);
$APP = str_replace(["Whatsapp","Telegram","Facebook","Instagram","Twitter","TikTok","Google","Imo","Viber","Snapchat","Netflix","Haraj","Other"],["واتسأب","تيليجرام","فيسبوك","انستقرام","تويتر","تيك توك","قوقل","إيمو","فايبر","سناب شات","نيتفلكس","حراج","السيرفر العام"],$server);
$senco1 = "💭 - الكود : *$code1* 1⃣";
$senco2 = "💭 - الكود : *$code2* 2⃣";
$senco3 = "💭 - الكود : *$code3* 3⃣";
$senco4 = "💭 - الكود : *$code4* 4⃣";
$senco5 = "💭 - الكود : *$code5* 5⃣";
$senco6 = "💭 - الكود : *$code6* 6⃣";
$senco7 = "💭 - الكود : *$code7* 7⃣";
$senco8 = "💭 - الكود : *$code8* 8⃣";
$senco9 = "💭 - الكود : *$code9* 9⃣";
if($allcod == 1){
$newcode = "$senco1";
}
if($allcod == 2){
$newcode = "$senco1\n$senco2";
}
if($allcod == 3){
$newcode = "$senco1\n$senco2\n$senco3";
}
if($allcod == 4){
$newcode = "$senco1\n$senco2\n$senco3\n$senco4";
}
if($allcod == 5){
$newcode = "$senco1\n$senco2\n$senco3\n$senco4\n$senco5";
}
if($allcod == 6){
$newcode = "$senco1\n$senco2\n$senco3\n$senco4\n$senco5\n$senco6";
}
if($allcod == 7){
$newcode = "$senco1\n$senco2\n$senco3\n$senco4\n$senco5\n$senco6\n$senco7";
}
if($allcod == 8){
$newcode = "$senco1\n$senco2\n$senco3\n$senco4\n$senco5\n$senco6\n$senco7\n$senco8";
}
if($allcod == 9){
$newcode = "$senco1\n$senco2\n$senco3\n$senco4\n$senco5\n$senco6\n$senco7\n$senco8\n$senco9";
}
if($code1 == null){
$newcode = "💭 - الكود : *------*";
}
if($statuse == 1){
$status = "قيد الإنتظار ... ⏳";
}elseif($statuse == 2){
$status = "تم الإيصال ✅";
}elseif($statuse == 3){
$status = "تم التفعيل ☑️";
}elseif($statuse == -1){
$status = "تم الحظر ⛔️";
}elseif($statuse == -2){
$status = "إنتهى الوقت ⌛️";
}
if($code1 == null){ 
$api=json_decode(file_get_contents("https://mega-ye.net/API/api-sites.php?action=getStatus&bot=$bot&site=$site&idnumber=$idnumber&number=$number&app=$app"),1);
$status_api = $api[status];
$statuscode = $api[code];
$agen = $api[agen];
$Location = $api[Location];
if($agen == "200"){
$agen = "- طلب الكود مرة أخرى🔂";
}else{
$agen = null;
}
}
if($statuse == 2 and time() - $times < $finish){
$end = "- إنهاء الحالة ☑️";
}
if($statuse == 1 and $statuscode == null and time() - $times >= $finish){
$status = "إنتهى الوقت ⌛️";
$statuse = -2;
$BUYSNUM[number][$order][status] = -2;
NumbBuys($BUYSNUM,$EM);
$ORDERALL[$idSend][status] = -2;
OrdAll($ORDERALL);
}
if($statuse == 2 and time() - $times >= $finish){
$status = "تم التفعيل ☑️";
$statuse = 3;
$BUYSNUM[number][$order][status] = 3;
NumbBuys($BUYSNUM,$EM);
$ORDERALL[$idSend][status] = 3;
OrdAll($ORDERALL);
}
if($statuse == 1 and time() - $times < $finish){
$cod = "- تحديث 🚥";
$ban = "- إلغاء الرقم 🚨";
}
if($statuse != 1 and $statuse != 2 and $buy['number'][$zero] != null){
$Repzero = "- شراء نفس الدولة لتطبيق $APP ☑️";
if($site=="5sim" and $country==72){
$Repurchase="- شراء نفس الرقم لتطبيق $APP ✅";
}
if($add >= 21 and $add <= 25){
$add=21;
}elseif($add >= 26 and $add <= 30){
$add=26;
}
if($add == 1){
$back = "Wo";
$MS="➡️ قائمة سيرفرات العروض ✔️";
}elseif($add >= 21 and $add <= 25){
$back = "saavmotamy";
$MS="➡️ قائمة سيرفرات $APP ✔️";
}elseif($add >= 26 and $add <= 30){
$back = "worldwide";
$MS="➡️ قائمة سيرفرات ال$APP ✔️";
}else{
$back = "Ms-$add-$country";
$MS="➡️ قائمة سيرفرات $APP ✔️";
}
$cods = "$country$app$operator$add";
if($add == 21 or $add ==26){
$BUYING="Wi-$add";
}else{
$BUYING="Ii-$cods";
}
}
if($statuscode != null and $code1 == null and $sudo == $id and time() - $times >= $finish){
$admin="☑️ - جلب الكود وفك تقييد العضو";
}
if($ordermy == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
❌ - لا يوجد لديك سجل في هذا الحساب!
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($account != $EM or $status_num != $number){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا سجلات أرقام كثيرة لذا تم توزيعها حسب حالة الرقم

👮‍♂ - إختر قائمة العرض عبر الأزرار في الأسفل.* 👇
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'☑️ - المكتملة.','callback_data'=>'Downloads#3#1']],
[['text'=>'⏰ - قيد الإنتظار.','callback_data'=>'Downloads#1#1'],['text'=>'✅ - تم الإيصال.','callback_data'=>'Downloads#2#1']],
[['text'=>'⌛️ - انتهى وقتها.','callback_data'=>'Downloads#-2#1'],['text'=>'⛔️ - المحضورة.','callback_data'=>'Downloads#-1#1']],
[['text'=>'- رجوع.','callback_data'=>'Record']]
]
])
]);
unlink("data/id/$id/step.txt");
}elseif($statuscode != null and mb_strlen("$statuscode") >= 3 and $statuse == 1 and $code1 == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"☑️ - تم وصول الكود بنجاح! رصيدك: ₽ $BALANCE",
'show_alert'=>false,
]);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - جميع معلومات عن عملية الشراء.

☎️ - الرقم : *$number*
💭 - الكود : *$statuscode*
✅ - الحالة : *تم الإيصال ✅*
🎬 - التطبيق : *$APP*
💸 - السعر : *$price*
🏋‍♂ - رقم العملية : *$idnum*
⏰ - الوقت : *$tims*
📆 - التاريخ : *$day*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- إنهاء الحالة ☑️",'callback_data'=>"ending-$idSend"]],
[['text'=>"$agen",'callback_data'=>"AgeCod-$idSend-1"]],
[['text'=>'- رجوع.','callback_data'=>"Downloads#$adds#$con"]]
]
])
]);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ 𝗡𝗨𝗺𝗕𝗘𝗥 : `$number`
💬 𝗖𝗢𝗗𝗘 : `$statuscode`

☑️ - إضغط على الكود او الرقم للنسخ 🙂🖤𖠛
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
bot('sendMessage',[
'chat_id'=>$PAY,
'text'=>"
⚜ تم وصول كود الرقم:

☎️ - الرقم : *$number*
🚸 - الكود : *$statuscode*
🧩 - الدولة : *$name*
🎯 - رمز الدولة : *$country*
🎬 - التطبيق : *$APP*
🎟 - الرصيد: *$BALANCE*
🏋 - الايدي: *$idnumber*
🔥 - السعر : *₽ $price*
🤸‍♂ - الحساب : *$EM*
🔎 - رقم العمل: *$idSend*
🎗 - الموقع: *$Location & $operator*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ - رابط العضو ↖️",'url'=>"tg://openmessage?user_id=$id"]],
[['text'=>"تسجيل الدخول.",'callback_data'=>"emilead-$EM"]],
[['text'=>'دفع المبلغ.','callback_data'=>"Pay_am-$EM-$price"]]
]
])
]);
$BUYSNUM[number][$order][sms][0][code] = $statuscode;
$BUYSNUM[number][$order][status] = 2;
$BUYSNUM[number_my] += 1;
NumbBuys($BUYSNUM,$EM);
$ORDERALL[$idSend][status] = 2;
$ORDERALL[number] +=1;
$ORDERALL[ruble] +=$price;
OrdAll($ORDERALL);
$points = file_get_contents("EMILS/$EM/points.txt");
$as = $points - $price;
file_put_contents("EMILS/$EM/points.txt",$as);
unlink("data/id/$id/restriction.txt");
unlink("data/id/$id/step.txt");
}else{
$key     = [];
$key['inline_keyboard'][] = [['text'=>"$admin",'callback_data'=>"gets-$EM-$statuscode-$idSend"]];
$key['inline_keyboard'][] = [['text'=>"$Repurchase",'callback_data'=>"Ii-$cods-$order"]];
$key['inline_keyboard'][] = [['text'=>"$end",'callback_data'=>"ending-$idSend"]];
$key['inline_keyboard'][] = [['text'=>"$agen",'callback_data'=>"AgeCod-$idSend-$allcod"]];
$key['inline_keyboard'][] = [['text'=>"$cod",'callback_data'=>"Code-$idSend"]];
$key['inline_keyboard'][] = [['text'=>"$ban",'callback_data'=>"Ban-$idSend"]];
if($Repzero!=null){
$key['inline_keyboard'][] = [['text'=>"- شراء نفس الدولة لتطبيق $APP ☑️",'callback_data'=>"$BUYING"]];
}
$key['inline_keyboard'][] = [['text'=>"$MS",'callback_data'=>"$back-"]];
$key['inline_keyboard'][] = [['text'=>'- رجوع.','callback_data'=>"Downloads#$adds#$con"]];
$keyboad      = json_encode($key);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - جميع معلومات عن عملية الشراء.

🚦 - الدولة : *$name*
☎️ - الرقم : *$number*
$newcode
✅ - الحالة : *$status*
🎬 - التطبيق : *$APP*
💸 - السعر : *₽ $price*
🏋‍♂ - رقم العملية : *$idnum*
⏰ - الوقت : *$tims*
📆 - التاريخ : *$day*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>($keyboad),
]);
unlink("data/id/$id/step.txt");
}
}
if($exdata[0] == "gets"){
$EEM = $exdata[1];
$code = $exdata[2];
$idSend = $exdata[3];
$order=$ORDERALL[$idSend][order];
$account=$ORDERALL[$idSend][account];
$idd=$EMILS['emils'][$EEM]['id'];
$BUYSNUM = json_decode(file_get_contents("EMILS/$account/number.json"),true);
if($BUYSNUM[number][$order][sms][0][code] == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"☑️ - تم إضافة الكود وفك تقييد العضو بنجاح",
'show_alert'=>true
]);
$BUYSNUM[number][$order][sms][0][code] = $code;
$BUYSNUM[number][$order][status] = 2;
$BUYSNUM[number_my] += 1;
NumbBuys($BUYSNUM,$account);
$ORDERALL[$idSend][status] = 2;
$ORDERALL[number] +=1;
$ORDERALL[ruble] +=$price;
OrdAll($ORDERALL);
unlink("data/id/$idd/restriction.txt");
unlink("data/id/$id/step.txt");
}
}
#=========={الأرقام الحاهزة}==========#
if($ex_data[0] == "sReady"){
$idSend = $ex_data[1];
$status_num = $ex_data[2];
$con = $ex_data[3];
$order=$ORDERALL[$idSend][order];
$account=$ORDERALL[$idSend][account];
$name = $BUYSNUM[number][$order][name];
$app = $BUYSNUM[number][$order][app];
$number = $BUYSNUM[number][$order][phone];
$code = $BUYSNUM[number][$order][code];
$price = $BUYSNUM[number][$order][price];
$idnumber = $BUYSNUM[number][$order][id];
$DAYS = $BUYSNUM[number][$order][DAY];
$year = substr("$DAYS", 0,4);
$month = substr("$DAYS", 4,2);
$day = substr("$DAYS", 6,2);
$hors = substr("$DAYS", 8,2);
$minute = substr("$DAYS", 10,2);
$second = substr("$DAYS", 12,2);
$when = substr("$DAYS", 14,2);
$day="$day-$month-$year $when";
$when=str_replace(["AM","PM"],["ص","م"],$when);
$tims="$hors:$minute:$second $when";
$APP = str_replace(["Whatsapp","Telegram","Facebook","Instagram","Twitter","TikTok","Google","Imo","Viber","Snapchat","Netflix","Haraj"],["واتسأب","تيليجرام","فيسبوك","انستقرام","تويتر","تيك توك","قوقل","إيمو","فايبر","سناب شات","نيتفلكس","حراج"],$app);
if($readymy == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
❌ - لا يوجد لديك سجل في هذا الحساب!
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($status_num != $number){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا جميع سجلات حسابك وحساب المستخدمين في البوت* 🚀
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'- سجل حسابك الشخصي. 🗂','callback_data'=>'Record2']],
[['text'=>'- سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'- سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'- سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'- سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - جميع معلومات عن عملية الشراء للرقم الجاهز.

🚦 - الدولة : *$name*
☎️ - الرقم : *$number*
💭 - الكود : *$code*
🎬 - التطبيق : *$APP*
💸 - السعر : *₽ $price*
🏋‍♂ - رقم العملية : *$idnumber*
⏰ - الوقت : *$tims*
📆 - التاريخ : *$day*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"Download2#$con"]]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
#=========={الكروت}==========#
if($ex_data[0] == "sCardBuy"){
$order = $ex_data[1];
$status_card = $ex_data[2];
$con = $ex_data[3];
$card = $BUYSCARD[$order][card];
$price = $BUYSCARD[$order][price];
$idcard = $BUYSCARD[$order][id];
$status = $BUYSCARD[$order][status];
$idd = $BUYSCARD[$order]["user_chat-id"];
$api = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$idd.""));
$name =$api->result->first_name;
$iduser =$api->result->username;
if($status == 1){
$statues = "✅ - الحالة : *تم شحن الكرت* 🎟
💠 - الشاحن : *$name*";
$yes="☑️ - رابط العضو ↖️";
}else{
$statues = "✅ - الحالة : *لم يتم شحن الكرت* 🎫";
}
$amount = $BUYSCARD[$order][amount];
$DAYS = $BUYSCARD[$order][DAY];
$year = substr("$DAYS", 0,4);
$month = substr("$DAYS", 4,2);
$day = substr("$DAYS", 6,2);
$hors = substr("$DAYS", 8,2);
$minute = substr("$DAYS", 10,2);
$second = substr("$DAYS", 12,2);
$when = substr("$DAYS", 14,2);
$day="$day-$month-$year $when";
$when=str_replace(["AM","PM"],["ص","م"],$when);
$tims="$hors:$minute:$second $when";
if($cardmy == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
❌ - لا يوجد لديك سجل في هذا الحساب!
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($status_card != $card){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا جميع سجلات حسابك وحساب المستخدمين في البوت* 🚀
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'- سجل حسابك الشخصي. 🗂','callback_data'=>'Record2']],
[['text'=>'- سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'- سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'- سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'- سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - جميع معلومات عن الكرت الذي قمت بشرائة.

💬 - الكرت : *$card*
💸 - السعر : *₽ $price*
🏋‍♂ - رقم العملية : *$idcard*
$statues
💸 - قيمة الكرت : *₽ $amount*
⏰ - الوقت : *$tims*
📆 - التاريخ : *$day*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$yes",'url'=>"tg://openmessage?user_id=$idd"]],
[['text'=>'- رجوع.','callback_data'=>"Download3#$con"]]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
#=========={عمليات التحويل}==========#
if($ex_data[0] == "sSendBuy"){
$order = $ex_data[1];
$status_send = $ex_data[2];
$con = $ex_data[3];
$idSend = $BUYSSEND[$order][id];
$price = $BUYSSEND[$order][amount];
$coun = $BUYSSEND[$order][price];
$rubel = $coun-$price;
$code = $BUYSSEND[$order][code];
$status = $BUYSSEND[$order][status];
$emils = $BUYSSEND[$order][user_emil];
$idd = $BUYSSEND[$order]["user_chat-id"];
$api = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$idd.""));
$name =$api->result->first_name;
$iduser =$api->result->username;
if($status == 2){
$statues = "✅ - الحالة : *تم الإستلام* ☑️
💠 - الشاحن : *$name*";
$yes="☑️ - رابط العضو ↖️";
}elseif($status == 1){
$statues = "✅ - الحالة : *جاري الإنتظار* ⏰";
$no="🚫 - إلغاء العملية";
}elseif($status == 3){
$statues = "✅ - الحالة : *جاري إنتظار إلغاء الطلب* ⏰";
}else{
$statues = "✅ - الحالة : *تم الإلغاء* 🚫";
}
$DAYS = $BUYSSEND[$order][DAY];
$year = substr("$DAYS", 0,4);
$month = substr("$DAYS", 4,2);
$day = substr("$DAYS", 6,2);
$hors = substr("$DAYS", 8,2);
$minute = substr("$DAYS", 10,2);
$second = substr("$DAYS", 12,2);
$when = substr("$DAYS", 14,2);
$day="$day-$month-$year $when";
$when=str_replace(["AM","PM"],["ص","م"],$when);
$tims="$hors:$minute:$second $when";
if($sendmy == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
❌ - لا يوجد لديك سجل في هذا الحساب!
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($status_send != $idSend){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا جميع سجلات حسابك وحساب المستخدمين في البوت* 🚀
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'- سجل حسابك الشخصي. 🗂','callback_data'=>'Record2']],
[['text'=>'- سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'- سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'- سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'- سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ - جميع معلومات عن عملية التحويل.

💬 - رقم العملية : *$idSend*
💸 - الكمية : *₽ $price*
⛔️ - العمولة : *₽ $rubel*
🏋‍♂ - كود التحقق : `$code`
$statues
📋 - المستلم : *$emils*
⏰ - الوقت : *$tims*
📆 - التاريخ : *$day*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$yes",'url'=>"tg://openmessage?user_id=$idd"]],
[['text'=>"$no",'callback_data'=>"CancelTransfer-$order-$idSend"]],
[['text'=>'- رجوع.','callback_data'=>"Download4#$con"]]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
#=========={عمليات الشحن}==========#
if($ex_data[0] == "sSendPric"){
$order = $ex_data[1];
$status_send = $ex_data[2];
$con = $ex_data[3];
$idSend = $BUYSPRIC[$order][id];
$card = $BUYSPRIC[$order][card];
$amount = $BUYSPRIC[$order][amount];
$price = $BUYSPRIC[$order][price];
$status = $BUYSPRIC[$order][status];
$via = $BUYSPRIC[$order][via];
$emils = $BUYSPRIC[$order][user_emil];
$idd = $BUYSPRIC[$order]["user_chat-id"];
$api = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$idd.""));
$name =$api->result->first_name;
if($name == null){
$name = $BUYSPRIC[$order][user_name];
}
$iduser =$api->result->username;
if($status == 2){
$statues = "تم الإستلام ☑️";
$code = $BUYSPRIC[$order][code];
$code = "*$code*";
}elseif($status == 1){
$statues = "العملية تحت الإنتظار ⏰";
$code = "[********]";
}elseif($status == 3){
$statues = "جاري إلغاء العملية ⏳";
$code = "[********]";
}else{
$statues = "العملية ملغية 🚫";
$code = $BUYSPRIC[$order][code];
$code = "*$code*";
}
$DAYS = $BUYSPRIC[$order][DAY];
$year = substr("$DAYS", 0,4);
$month = substr("$DAYS", 4,2);
$day = substr("$DAYS", 6,2);
$hors = substr("$DAYS", 8,2);
$minute = substr("$DAYS", 10,2);
$second = substr("$DAYS", 12,2);
$when = substr("$DAYS", 14,2);
$day="$day-$month-$year $when";
$when=str_replace(["AM","PM"],["ص","م"],$when);
$tims="$hors:$minute:$second $when";
if($via == 1){
$txt="
☑️ -  اليك جميع تفاصيل شحن حسابك.

🚀 - المحول : *$name*
🔗 - رابط المحول : [$idd](tg://openmessage?user_id=$idd)
💸 - المبلغ : *₽ $price*
💬 - رقم المرجع : *$idSend*
⏰ - الوقت : *$tims*
📆 - التاريخ : *$day*
";
}elseif($via == 3){
$txt="
☑️ -  اليك جميع تفاصيل شحن حسابك.

🚀 - المحول : *$name*
🔗 - رابط المحول : [$idd](tg://openmessage?user_id=$idd)
🕹 - حسابة : *$emils*
💸 - المبلغ : *₽ $price*
⭐️ - الحالة : *$statues*
🏋‍♂ - كود التحقق : $code
💬 - رقم المرجع : *$idSend*
⏰ - الوقت : *$tims*
📆 - التاريخ : *$day*
";
}elseif($via == 4){
$txt="
☑️ -  اليك جميع تفاصيل شحن حسابك.

🚀 - مالك الكرت : *$name*
🔗 - رابطة الخاص : [$idd](tg://openmessage?user_id=$idd)
🕹 - حسابة : *$emils*
🎟 - الكرت : *$card*
💸 - فئة الكرت : *₽ $amount*
⛔️ - سعر الكرت : *₽ $price*
💬 - رقم المرجع : *$idSend*
⏰ - الوقت : *$tims*
📆 - التاريخ : *$day*
";
}
if($pricmy == null){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"
❌ - لا يوجد لديك سجل في هذا الحساب!
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
}elseif($status_send != $idSend){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
☑️ *- هنا جميع سجلات حسابك وحساب المستخدمين في البوت* 🚀
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- سجل البوت. ☑️','callback_data'=>'statsbot']],
[['text'=>'- سجل حسابك الشخصي. 🗂','callback_data'=>'Record2']],
[['text'=>'- سجل جميع الأرقام المشترى. 📞','callback_data'=>'Download1']],
[['text'=>'- سجل عمليات التحويل. 🔁','callback_data'=>'Download4#1']],
[['text'=>'- سجل كروت الشحن. 🎟','callback_data'=>'Download3#1']],
[['text'=>'- سجل عمليات شحن حسابك. 💸','callback_data'=>'Download5#1']],
[['text'=>'- رجوع.','callback_data'=>'back']]
]
])
]);
unlink("data/id/$id/step.txt");
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
$txt
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'- رجوع.','callback_data'=>"Download5#$con"]]
]
])
]);
unlink("data/id/$id/step.txt");
}
}
#=========={الوكلاء}==========#
if($data == "gents"){
if(count($agents['gents']) < 1){
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"
❌ - عذرا عزيزي العميل لايوجد وكلاء حاليا
",
'show_alert'=>true
]);
unlink("data/id/$id/step.txt");
exit;
}
$key     = [];
$key['inline_keyboard'][] = [['text'=>"👮🏻 الوكيل.",'callback_data'=>"no"],['text'=>"🛒 الرابط.",'callback_data'=>"no"]];
foreach($agents['gents'] as $zero=>$idgents){
$api = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$idgents.""));
$name =$api->result->first_name;
$key['inline_keyboard'][] = [['text'=>"$name",'callback_data'=>"loggents-$zero"],['text'=>"إضغط 🖱",'url'=>"tg://openmessage?user_id=$idgents"]];
}
$key['inline_keyboard'][] = [['text'=>'- رجوع.','callback_data'=>'back']];
$keyboad      = json_encode($key);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🧑‍✈️ *- أهلا بك عزيزي العميل* في قسم وكلاء البوت الرسميين في بوت *@n_u_m_11* ☑️
",
'parse_mode'=>"MarkDown",
'reply_markup'=>($keyboad),
]);
unlink("data/id/$id/step.txt");
}
if($exdata[0] == "loggents"){
$zero=$exdata[1];
$idgents=$agents['gents'][$zero];
$emil=$zero;
$api = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$idgents.""));
$name =$api->result->first_name;
$users =$api->result->username;
$txusers="@$users";
if($users == null){
$txusers="لا يوجد ♻️";
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🧑‍✈️ - الوكيل: *$name*
🛒 - يوزر الوكيل: *$txusers*
📩 - حسابه: *$emil*

☑️ *- وكيل معتمد من إدارة البوت.*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- رابط الوكيل 🧑‍✈️",'url'=>"tg://openmessage?user_id=$idgents"]],
[['text'=>"- الإبلاغ عنه! ⚠️",'callback_data'=>"super"]],
[['text'=>"- رجوع.",'callback_data'=>"gents"]]
]
])
]);
unlink("data/id/$id/step.txt");
}
#=========={no}==========#
if($data == "no"){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>'هذا الزر فارغ...🌚',
'show_alert'=>true
]);
}
#=========={الدعم}==========#
$message_id           = $update->message->message_id;
$text = $update->message->text;
$chat_id = $update->message->chat->id;
$admin = 8177557473;// Your Id 
if(isset($update->callback_query)){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$first = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$tc = $update->callback_query->message->chat->type;
}
$re = $update->message->reply_to_message;
$re_id = $update->message->reply_to_message->from->id;
$photo = $message->photo;
$video = $message->video;
$sticker = $message->sticker;
$file = $message->document;
$audio = $message->audio;
$voice = $message->voice;
$caption = $message->caption;
$photo_id = $message->photo[0]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$voice_id = $message->voice->file_id;
$video_note = $message->video_note;
$video_note_id = $video_note->file_id;
$tc = $message->chat->type;
$PHPXX = json_decode(file_get_contents("PHPXX.json"),true); 
if($data == "super"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
💬 *- قسم التواصل مع الدعم أونلاين*

⚜ - هنا يمكنك *التواصل معنا* لحل جميع *المشكلات التي قد تواجهك* في البوت. 💛
☑️ - أرسل *رسالتك* الآن وسوف يتم *إيصالها الى الإدارة* مباشرة.

🕰 - متواجدون طوال اليوم. ❄️
❎ - لاترسل الألفاظ البذيئة فضلا. ☺️🖤
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- الغاء التواصل ⛔️",'callback_data'=>"back"]]
]])
]);
file_put_contents("data/id/$id/twas.txt","tw");
file_put_contents("PHPXX.json",json_encode($PHPXX));
}
if($text == "/start" and $twas == 'tw'){
unlink("data/id/$id/step.txt");
unlink("data/id/$id/twas.txt");
exit;
}
if($data == "back" and $twas == 'tw'){
unlink("data/id/$id/step.txt");
unlink("data/id/$id/twas.txt");
exit;
}
if($text != "/start" and $chat_id != $admin and $message and $tc == "private" and $twas == 'tw'){
if($data){
}
$mes= bot('forwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$id,
'message_id'=>$message_id,
]);
$send = $mes->result->message_id;
$PHPXX['tws'][$send]['User'] = $id;
$PHPXX['tws'][$send]['Message'] = $message_id;
file_put_contents("PHPXX.json",json_encode($PHPXX));
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"
☑️ *- تم إرسال رسالتك للمدير بنجاح
♻️ - الرجاء التحلي بالصبر ريثما يتم الرد عليك* 🤙🏻
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- الغاء التواصل ⛔️",'callback_data'=>"back"]]
]])
]);
file_put_contents("PHPXX.json",json_encode($PHPXX));
}
if($chat_id == $admin and $PHPXX['tws'][$message->reply_to_message->message_id] != null and isset($update->message->reply_to_message)){
$messageid = $PHPXX['tws'][$message->reply_to_message->message_id]['Message'];
$Alkhaledi = $PHPXX['tws'][$message->reply_to_message->message_id]['User'];
$Tesaa          = "";
if($text){
bot('sendMessage', [
'chat_id'=>$Alkhaledi,
'text'=>"$Tesaa$text",
'reply_to_message_id'=>$messageid,
]);
}elseif($photo){
bot('sendphoto', [
'chat_id'=>$Alkhaledi,
'photo'=>$photo_id,
'caption'=>$Tesaa.$caption,
'reply_to_message_id'=>$messageid,
]);
}elseif($video){
bot('Sendvideo',[
'chat_id'=>$Alkhaledi,
'video'=>$video_id,
'caption'=>$Tesaa.$caption,
'reply_to_message_id'=>$messageid,
]);
}elseif($video_note){
bot('Sendvideonote',[
'chat_id'=>$Alkhaledi,
'video_note'=>$video_note_id,
]);
}elseif($sticker){
bot('Sendsticker',[
'chat_id'=>$Alkhaledi,
'sticker'=>$sticker_id,
'reply_to_message_id'=>$messageid,
]);
}elseif($file){
bot('SendDocument',[
'chat_id'=>$Alkhaledi,
'document'=>$file_id,
'caption'=>$Tesaa.$caption,
'reply_to_message_id'=>$messageid,
]);
}elseif($music){
bot('Sendaudio',[
'chat_id'=>$Alkhaledi,
'audio'=>$music_id,
'caption'=>$Tesaa.$caption,
'reply_to_message_id'=>$messageid,
]);
}elseif($voice){
bot('Sendvoice',[
'chat_id'=>$Alkhaledi,
'voice'=>$voice_id,
'caption'=>$Tesaa.$caption,
'reply_to_message_id'=>$messageid,
]);
}
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"
☑️ *- تم الرد على المستخدم بنجاح* 🤙🏻
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☑️ - رابط العضو ↖️",'url'=>"tg://openmessage?user_id=$Alkhaledi"]]
]
])
]);
}
#=========={الأوامر الخاصة بالأدمن}==========#
if($id == $sudo){
if($text == '/start'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- اهلا وسهلا مطوري $first ، 🖤

- هذه هي قائمة التحكم الخاصة بك في البوت 💁🏻
",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"حذف دولة 🚫",'callback_data'=>"delnumber"],['text'=>"إضافة دولة ↗️",'callback_data'=>"addnumber"]],
[['text'=>"خصم رصيد 📛",'callback_data'=>"delcoin"],['text'=>"إضافة رصيد ♻️",'callback_data'=>"addcoin"]],
[["text"=>"حذف رقم جاهز ⬆️","callback_data"=>"delreadynumber"],["text"=>"أضف رقم جاهز 📞","callback_data"=>"readynumber"]],
[['text'=>"فتح وقفل الأقسام 🔏",'callback_data'=>"opclo"],['text'=>"إحصائيات البوت 🌚",'callback_data'=>"baluser"]],
[['text'=>"تقييد عضو ⛔️",'callback_data'=>"res"],['text'=>"فك تقييد عضو 🔓",'callback_data'=>'unres']],
[['text'=>"فك تقييد عضو عبر الايدي ☑️",'callback_data'=>"unnum"]],
[['text'=>"عدد المشتركين 👥",'callback_data'=>"members"],['text'=>"إذاعة نشر 📩",'callback_data'=>"set"]],
[['text'=>'رفع وحذف API ⤵️','callback_data'=>'counapi'],['text'=>"تنضيف البوت 🗑",'callback_data'=>"delPHP"]],
[['text'=>'الكشف عن الرصيد 🗃','callback_data'=>'cop'],['text'=>'صنع كروت 💳','callback_data'=>'card']],
[['text'=>'حذف وكيل ⛔️','callback_data'=>'delagent'],['text'=>'إضافة وكيل 🧑‍✈️','callback_data'=>'addagent']]
]
])
]);
unlink("zzz.json");
file_put_contents('data/txt/bc.txt','no');
unlink("data/id/$id/step.txt");
}
#=========={رجوع للقائمة}==========#
if($data == 'c'){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
- اهلا وسهلا مطوري $first ، 🖤

- هذه هي قائمة التحكم الخاصة بك في البوت 💁🏻
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"حذف دولة 🚫",'callback_data'=>"delnumber"],['text'=>"إضافة دولة ↗️",'callback_data'=>"addnumber"]],
[['text'=>"خصم رصيد 📛",'callback_data'=>"delcoin"],['text'=>"إضافة رصيد ♻️",'callback_data'=>"addcoin"]],
[["text"=>"حذف رقم جاهز ⬆️","callback_data"=>"delreadynumber"],["text"=>"أضف رقم جاهز 📞","callback_data"=>"readynumber"]],
[['text'=>"فتح وقفل الأقسام 🔏",'callback_data'=>"opclo"],['text'=>"إحصائيات البوت 🌚",'callback_data'=>"baluser"]],
[['text'=>"تقييد عضو ⛔️",'callback_data'=>"res"],['text'=>"فك تقييد عضو 🔓",'callback_data'=>'unres']],
[['text'=>"فك تقييد عضو عبر الايدي ☑️",'callback_data'=>"unnum"]],
[['text'=>"عدد المشتركين 👥",'callback_data'=>"members"],['text'=>"إذاعة نشر 📩",'callback_data'=>"set"]],
[['text'=>'رفع وحذف API ⤵️','callback_data'=>'counapi'],['text'=>"تنضيف البوت 🗑",'callback_data'=>"delPHP"]],
[['text'=>'الكشف عن الرصيد 🗃','callback_data'=>'cop'],['text'=>'صنع كروت 💳','callback_data'=>'card']],
[['text'=>'حذف وكيل ⛔️','callback_data'=>'delagent'],['text'=>'إضافة وكيل 🧑‍✈️','callback_data'=>'addagent']]
]
])
]);
unlink("zzz.json");
file_put_contents('data/txt/bc.txt','no');
unlink("data/id/$id/step.txt");
}
#=========={المواقع}==========#
include("admin.php");
#=========={اذاعة ازرار}==========#
$ary = array($sudo);
$id = $message->chat->id;
$admins = in_array($id,$ary);
$data = $update->callback_query->data;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$chat_id2 = $update->callback_query->message->chat->id;
$cut = explode("\n",file_get_contents("data/txt/file.txt"));
$users = count($cut)-1;
$modee = file_get_contents("data/txt/bc.txt");
#Start code 
if ($update && !in_array($id, $cut)) {
file_put_contents("data/txt/file.txt", $id."\n",FILE_APPEND);
}
if($data == "set"){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
💬 - أختر نوع الرسالة الذي تريد ان ترسلها 🔰
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💬 رسالة عادية",'callback_data'=>"setNormal"]],
[['text'=>"💬 رسالة ماركدون",'callback_data'=>"setMark"]],
[['text'=>"- رجوع.",'callback_data'=>"c"]]
]
])
]);
file_put_contents("data/txt/bc.txt","no");
unlink("data/id/$id/step.txt");
}
if($data == "setNormal"){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
⚜ - أرسل رسالتك ليتم إرسالها إلى $users مشترك 👥
♻️ - كتابة فقط...🌚
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- رجوع.",'callback_data'=>"set"]]
]
])
]);
file_put_contents("data/txt/bc.txt","yas1");
}
if($text and $text != '/start' and $modee == "yas1"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⚜ - تم قبول رسالتك!
♻️ - ويتم إرسالها إلى $users مشترك 👥
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- رجوع.",'callback_data'=>"c"]]
]
])
]);
for ($i=0; $i < count($cut); $i++) { 
bot('sendMessage',[
'chat_id'=>$cut[$i],
'text'=>"$text",
'disable_web_page_preview'=>true,
]);
file_put_contents("data/txt/bc.txt","no");
} 
}
if($data == "setMark"){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
⚜ - أرسل رسالتك ليتم إرسالها إلى $users مشترك 👥
♻️ - كتابة فقط...🌚
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- رجوع.",'callback_data'=>"set"]]
]
])
]);
file_put_contents("data/txt/bc.txt","yas2");
}
if($text and $text != '/start' and $modee == "yas2"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
⚜ - تم قبول رسالتك!
♻️ - ويتم إرسالها إلى $users مشترك 👥
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- رجوع.",'callback_data'=>"c"]]
]
])
]);
for ($i=0; $i < count($cut); $i++) { 
bot('sendMessage',[
'chat_id'=>$cut[$i],
'text'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
file_put_contents("data/txt/bc.txt","no");
} 
}
if($message->reply_to_message and $text=="رفع" and $message->reply_to_message->document){
$a= $message->reply_to_message->document->file_id;
$get=bot("getfile",[
"file_id"=>$a
])->result->file_path; 
$v="teampro.php";
$file=file_put_contents($v, file_get_contents("https://api.telegram.org/file/bot".API_KEY."/".$get));
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"
تم رفع الملف بنجاح ✅
",
'reply_to_message_id'=>$message_id,
]);
}
}
    ?>