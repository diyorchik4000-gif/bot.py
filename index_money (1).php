<?php
$admin = '659030842';
$kanal = '@Koderchik';
$token = 'Token';
/*Bot kodi @Koderchik ga tegishli
Manba bilan olilar*/
function bot($method,$datas=[]){
global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$data = $update->callback_query->data;
$type = $message->chat->type;
$text = $message->text;
$cid = $message->chat->id;
$uid= $message->from->id;
$gname = $message->chat->title;
$left = $message->left_chat_member;
$new = $message->new_chat_member;
$name = $message->from->first_name;
$repid = $message->reply_to_message->from->id;
$repname = $message->reply_to_message->from->first_name;
$newid = $message->new_chat_member->id;
$leftid = $message->left_chat_member->id;
$newname = $message->new_chat_member->first_name;
$leftname = $message->left_chat_member->first_name;
$username = $message->from->username;
$cmid = $update->callback_query->message->message_id;
$cusername = $message->chat->username;
$repmid = $message->reply_to_message->message_id; 
$ccid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$cqid = $update->callback_query->id;

$photo = $update->message->photo;
$gif = $update->message->animation;
$video = $update->message->video;
$music = $update->message->audio;
$voice = $update->message->voice;
$sticker = $update->message->sticker;
$document = $update->message->document;
$for = $message->forward_from;
$forc = $message->forward_from_chat;

$cont = $message->contact;
$number = $message->contact->phone_number;
$name = $message->contact->first_name;

mkdir("pul");
mkdir("odam");
mkdir("qiwi");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🤑 Pul ishlash"]],
[['text'=>"📑 Yordam"],['text'=>"💰 Balans"]],
[['text'=>"📝Botga shikoyat qilish"]],
]
]);

$shik = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"Aldoqchilik"]],
[['text'=>"Fikrimnan qaytdim"]],
]
]);

$key3 = json_encode([
'inline_keyboard'=>[
[['text'=>"Hovalani ulashish",'switch_inline_query'=>"-"]],
]
]);

$bekor = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"◀️ Orqaga"]],
]
]);

$key2 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"💵 Pulni chiqarish"]],
[['text'=>"Raqamni yuborish📲",'request_contact' =>true]],
[['text'=>"◀️ Orqaga"]],
]
]);
$keyy2 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"◀️ Orqaga"]],
]
]);

$key4 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"Bajarildi✅"]],
]
]);
/*Bot kodi @Koderchik ga tegishli
Manba bilan olilar*/
if($text=="/start"){
$pul = file_get_contents("pul/$cid.txt");
$mm=$pul+0;
file_put_contents("pul/$cid.txt","$mm");
$odam = file_get_contents("odam/$cid.dat");
$kkd=$odam+0;
file_put_contents("odam/$cid.dat","$kkd");
bot('SendPhoto',[
'chat_id'=>$cid,
'photo'=>"t.me/botkoders/5",
'caption'=>"100 mingdan ortiq odam biz bilan pul ishlashyapti.
*Siz ham boshlang!*",
'parse_mode'=>"markdown",
    'reply_markup'=>$key
    ]);
}
if(mb_stripos($text,"/start $cid")!==false){
bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"📋 Bosh menyu!",
      'parse_mode'=>'html',
      'reply_markup'=>$key,
      ]);
}else{
      $idref = "pul/$ex.db";
      $idref2 = file_get_contents($idref);
      $id = "$cid\n";
      $handle = fopen($idref, 'a+');
      fwrite($handle, $id);
      fclose($handle);
if(mb_stripos($idref2,$cid) !== false ){
}else{
$pub=explode(" ",$text);
$ex=$pub[1];
$pul = file_get_contents("pul/$ex.txt");
$a=$pul+200;
file_put_contents("pul/$ex.txt","$a");
$odam = file_get_contents("odam/$ex.dat");
$b=$odam+1;
file_put_contents("odam/$ex.dat","$b");
bot('SendPhoto',[
'chat_id'=>$cid,
'photo'=>"t.me/botkoders/5",
'caption'=>"100 mingdan ortiq odam biz bilan pul ishlashyapti.
*Siz ham boshlang!*",
'parse_mode'=>"markdown",
    'reply_markup'=>$key
    ]);
bot('sendmessage',[
'chat_id'=>$ex,
'text'=>"🔔 Yangi foydalanuvchi sizning havolangiz bo'yicha ro'yxatdan o'tdi!
Sizning hisobingizga <b>200 so'm o'tdi.</b>

💲 Sizning joriy balansingiz <b>$pul so'm</b>
👤 Siz <b>$odam odamni</b> taklif qildingiz",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}
/*Bot kodini @Uz_Coderlar kanali admini @Koderchik tarqatdi!*/
if($text=="◀️ Orqaga"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Nima qilamiz?",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}

if($text=="📝Botga shikoyat qilish"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Shikoyat turini tanlang:",
'parse_mode'=>'html',
'reply_markup'=>$shik,
]);
}

if($text=="Aldoqchilik"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Sizning shikoyatingiz qo'llab-quvvatlash uchun yuborildi.",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}

if($text=="Fikrimnan qaytdim"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Mayli o'zingiz bilasiz!",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
/*Bot kodini @Uz_Coderlar kanali admini @Koderchik tarqatdi!*/
if($text=="💰 Balans"){
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Hozirgi paytda sizning hisobingiz <b>$pul so’m</b>
Jami ishlandi <b>$pul so'm</b>
Siz <b> $odam odamni</b> taklif qildingiz

Raqamni kiritish uchun bosing👇",
'parse_mode'=>'html',
'reply_markup'=>$key2,
]);
}

if($cont){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"*Raqamingiz kiritildi!*

📲*Raqam:* $number",
    'parse_mode'=>"markdown",
	'reply_markup'=>$keyy2,	
        ]);
}
/*Bot kodini @Uz_Coderlar kanali admini @Koderchik tarqatdi!*/
if($text=="📑 Yordam"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>Biz nima uchun sizga pul to'laymiz?</b>
Bizga hamkorlarimiz va o'zining telegramdagi kanallarini rivojlantirish va obunachilar sonini ko'paytirishga qiziqgan reklama beruvchilar to'laydilar. Biz esa, to'liq summadan 20% xizmatni qo'llab-quvvatlash maqsadida o'zimizga olib qolib, o'znavbatida sizga to'laymiz.

<b>Qanday qilib pulni botdan chiqarish mumkin?</b>
Chiqarish to'g'ridan-to'g'ri sizning mobil telefoningizning hisobiga amalga oshiriladi: Beeline,Ucell,Uzmobile,Ums,Perfectum

<b>Qanday qilib pulga ega bo'lish?</b>
O'zingizning yo'llantiruvchi havolangiz orqali do'stlaringizni taklif qiling. Va har biri uchun pulli mukofotlarga ega bo'ling.

<b>5 do'st = 1000 so'm</b>
To'lovlar soni cheklanmagan, xohlaganingizcha taklif qiling va pul ishlang!",
'parse_mode'=>'html',
'reply_markup'=>$bekor,
]);
}

if($text=="Bajarildi✅"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Nima qilamiz?",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
if($text=="🤑 Pul ishlash"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>Ajoyib!</b> Ishning yarimi bajarildi. Sizga yo'llantiruvchi havolangiz orqali do'stlaringizni taklif etish qoldi xolos!

Yo'llantiruvchi havola: https://t.me/MixObmenBot?start=$cid

📬 Uni tanishlaringiz orasida tarqating. Buning uchun ulashish tugmasini bo'sing va yuborish uchun chat yoki guruhni tanlang",
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
} 

if($text=="💵 Pulni chiqarish"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>Biz pul o'tkazishimiz kerak bo'lgan Paynet raqamni yozib yuboring bizga! Hech qanday qo'shimchalarsiz</b>
   <B>Namuna:</b> <code>998911234567</code>",
'parse_mode'=>'html',
'reply_markup'=>$key2,
]);
}

if(mb_stripos($text,"99")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=1000){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"👩‍💼 💰 $pul so'm
<code>---------------</code>
📥 Paynet: $qiwi
<code>---------------</code>
✅ To'lov qabul qilindi biz siz foydalanuvchilardan yuborilgan vakansiyalarni 48 soat ichida amalga oshiramiz !
<code>---------------</code>",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"<b>Diqqat⁉️</b>
<b>$name</b> zayavka tashladi!

👤Useri: <code>@$username</code>

🆔ID Raqami: <code>$cid</code>

☎️Raqami: <b>$qiwi</b>

💰Balansi: <b>$pul so'm</b>

👥Taklif qilgan odamlari: <b>$odam ta</b>",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"❌ <b>Siz shartni bajarmadingiz:</b>

Pullarni chiqarish uchun minimal miqdori <b>1000 so'm,</b> hozirgi paytda hisobingizda <b>$pul so'm.</b> Siz yana 5 do'stingizni taklif qilishingiz lozim.",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}

if((mb_stripos($text,"/add")!==false) and $cid==$admin){
$exx=explode(" ",$text);
$ex1=$exx[1];
$ex2=$exx[2];
$pul = file_get_contents("pul/$ex1.txt");
$rr=$pul+$ex2;
file_put_contents("pul/$ex1.txt","$rr");
$pul = file_get_contents("pul/$ex1.txt");
$odam = file_get_contents("odam/$ex1.dat");
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"❗️DIQQAT❗️
<b$name (ex1)</b> ga <b>$ex2 SO'M</b> qo'shildi❕
💰Balansi: <b>$pul SO'M</b>
🆔ID Raqami: <code>$ex1</code>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$ex1,
'text'=>"❕Saxiy <b>ADMIN</b>imiz tomonidan sizga <b>$ex2 SO'M</b> berildi❕
💰Balansingiz: <b>$pul SO'M</b>",
'parse_mode'=>'html',
]);
}
if((mb_stripos($text,"/minus")!==false) and $cid==$admin){
$exxx=explode(" ",$text);
$ex3=$exxx[1];
$ex4=$exxx[2];
$pul = file_get_contents("pul/$ex3.txt");
$rr=$pul-$ex4;
file_put_contents("pul/$ex3.txt","$rr");
$pul = file_get_contents("pul/$ex3.txt");
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"❗️DIQQAT❗️
<b>$name ($ex1)</b> dan <b>$ex2 SO'M</b> olib tashlandi⚠️
💰Balansi: <b>$pul SO'M</b>
🆔ID Raqami: <code>ex1</code>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$ex1,
'text'=>"⭕️Qoida buzarlik qilganingiz uchun sizdan <b>$ex2 SO'M</b> olib tashlandi⚠️
💰Balansingiz: <b>$pul SO'M</b>",
'parse_mode'=>'html',
]);
}
$lichka = file_get_contents("lichka.txt");
if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("lichka.txt","$lichka\n$cid");
}
} 
$reply = $message->reply_to_message->text;
$rpl = json_encode([
           'resize_keyboard'=>false,
            'force_reply' => true,
            'selective' => true
        ]);
if($text=="/send" and $cid==$admin){
    bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"Yozing...✏️",'parse_mode'=>"html",'reply_markup'=>$rpl
]);
}
    if($reply=="Yozing...✏️"){
        $lich = file_get_contents("lichka.txt");
        $lichka = explode("\n",$lich);
foreach($lichka as $uid){
    bot("sendmessage",[
        'chat_id'=>$uid,
        'text'=>"$text"]);
}
}
$sum=file_get_contents("tolandi.txt");
if($text=="/stat" and $cid==$admin){
$soat = date('H:i', strtotime('5 hour'));
$sana = date('d-M Y',strtotime('5 hour'));
$sum=file_get_contents("tolandi.txt");
$lich = substr_count($lichka,"\n");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"📊<b>Botimiz statistikasi:</b> $lich
<code>Hozir soat $soat</code>
<code>Bugungi sana $sana</code>",
'parse_mode'=>'html',
]);
}

if(isset($text)){
  $gett = bot('getChatMember',[
  'chat_id' =>$kanal,
  'user_id' => $cid,
  ]);
  $gget = $gett->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator"){
}else{
    bot('sendMessage',[
      'chat_id'=>$cid,
   'message_id'=>$mid, 
      'parse_mode'=>'markdown', 
'text'=>"*Botdan to'liq foydalanishdan avval* $kanal *kanaliga azo bo'ling!*
_Yana qaytib_ /start _buyruģini bering!_",
  'reply_markup'=>json_encode([ 
   'inline_keyboard'=>[  
[['text'=>'Kirish💰','url'=>'https://t.me/Koderchik']] 
]  
])  
]);  
}
}

//inline

$iuid = $update->inline_query->from->id;
$iid = $update->inline_query->id;
$icid = $update->inline_query->chat->id;
$imid = $update->inline_query->message->id;
$bot = '@MixObmenBot'.bot('getme',['bot'])->result->username;
$query = $update->inline_query->query;

if(mb_stripos($query,"-")!==false){
  bot('answerInlineQuery',[
    'inline_query_id'=>$iid,
    'cache_time'=>1,
    'results'=>json_encode([[
    'type'=>'article',
    'id'=>base64_encode(1),
    'title'=>"Ustiga bosing!",
    'input_message_content'=>[
    'disable_web_page_preview'=>true,
    'parse_mode'=>'MarkDown',
    'message_text'=>"Mobil telefoningizga pul o'tkazishdan charchadingizmi? Endi telefonga pulni telegramda shu bot orqali ishlang!

[Shu yerni bosib botga kiring](t.me/MixObmenBot?start=$iuid)",
  ],
    'reply_markup'=>[
            'inline_keyboard'=>[
 [['text'=>"Bosing",'url'=>"t.me/MixObmenBot?start=$iuid"]],
        ]],
        ]
        ])
]);
}
?>