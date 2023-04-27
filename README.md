# monobank-php-class
Чистый Class PHP для Monobank Acquiring

Рабочий вариант интеграции Monobank API для любой CMS написанной на PHP.
Для подключения класса нужно всего лишь инициализировать его, и поставить данные.

<code>
$monobank = new mMono('Токен');
$monobank->monoRequest($order_id, $order_sum, 'order_name', "https://site.com/complete", "https://site.com/webhook.php");
</code>
<br />
На выходе вы получаете ссылку от Monobank на которую переправляете клиента на оплату. 
