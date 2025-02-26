<?php

namespace Morfin60\BoxberryApi;

/**
 * Интерфейс API Boxberry
 */
interface ApiInterface
{

    /**
     * Получить текущий ключ API
     * @return string
     */
    public function getApiKey();

    /**
     * Функция, получающая список городов с пунктами выдачи заказов
     * @param string|null $country_code Код страны для фильтра
     * @return array Список городов в виде массива
     */
    public function listCities($country_code);

    /**
     * Функция, получающая список городов с пунктами выдачи заказов (полный)
     * @param string|null $country_code Код страны для фильтра
     * @return array Список городов в виде массива
     */
    public function listCitiesFull($country_code);

    /**
     * Позволяет получить информацию о всех точках выдачи заказов. При использовании дополнительного параметра
     * ($code код города в boxberry, можно получить методом listCities) позволяет выбрать ПВЗ только в заданном городе.
     * По умолчанию возвращается список точек с возможностью оплаты при получении заказа. Если вам необходимо увидеть
     * точки, работающие с любым типом посылок, передайте параметр $prepaid равный 1.
     * @param int $city_code код города, полученный методом ListCities()
     * @param int $prepaid получать ли пункты выдачи, работающие только с постоплатой
     * @return array список пунктов выдачи заказов
     */
    public function listPoints($city_code = 0, $prepaid = 1);

    /**
     * Позволяет получить список почтовых индексов, для которых возможна курьерская доставка.
     * @return array список почтовых индексов
     */
    public function listZips();

    /**
     * Позволяет получить информацию о возможности осуществления курьерской доставки в заданном индексе.
     * @param int $zip почтовый код, для которого осуществляется проверка
     * @return array информация о возможности осуществления курьерской доставки для индекса
     */
    public function zipCheck($zip);

    /**
     * Позволяет получить информацию о статусах посылки.
     * @param string $im_id трекинг код посылки
     * @return array массив статусов посылки
     */
    public function listStatuses($im_id);

    /**
     * Позволяет получить подробную информацию о статусах посылки.
     * @param string $im_id трекинг код посылки
     * @return array массив статусов посылки
     */
    public function listStatusesFull($im_id);

    /**
     * Позволяет получить перечень и стоимость оказанных услуг по отправлению.
     * @param string $im_id трекинг код посылки
     * @return array массив услуг, оказанных по отправлению
     */
    public function listServices($im_id);

    /**
     * Позволяет получить список городов в которых осуществляется курьерская доставка.
     * @return array массив городов
     */
    public function courierListCities();

    /**
     * Данный метод позволяет узнать стоимость доставки посылки до ПВЗ, включая стоимость постоянных услуг,
     * предусмотренных вашим договором.
     * @param float $weight вес посылки в граммах
     * @param int $target код ПВЗ в пункте назначения
     * @param array $additional_parameters дополнительные параметры
     * @param float $delivery_sum заявленная ИМ стоимость доставки
     * @param float $pay_sum сумма к оплате покупателем
     * @param int $targetstart код пункта приема посылок
     * @param int $zip индекс города для курьерской доставки
     * @param float $width ширина посылки
     * @param float $height высота посылки
     * @param float $depth глубина посылки
     * @return array массив, содержащий полную цену, а также составляющие этой цены
     */
    public function deliveryCosts($parameters = []);

    /**
     * Позволяет получить стоимость доставки заказа с учётом стоимости постоянных услуг, предусмотренных договором.
     * @see https://help.boxberry.ru/pages/viewpage.action?pageId=60096989
     * @param $parameters
     * @return array массив с результатами вычисления
     */
    public function deliveryCalculation($parameters);

    /**
     * Позволяет получить список точек приёма посылок.
     * @return array массив с точками приёма посылок
     */
    public function pointsForParcels();

    /**
     * Метод позволяет получить код ПВЗ из Boxberry по индексу города.
     * @param int zip
     * @return array
     */
    public function pointsByPostCode($zip);

    /**
     * Метод позволяет получить всю информацию по пункту выдачи, включая фотографии.
     * @param int $code код пункта выдачи заказов
     * @param int $photo получать ли фотографии
     * @return array информация о пункте выдачи в виде массива
     */
    public function pointsDescription($code, $photo = 0);

    /**
     * Данный метод позволяет создать / обновить посылку в Личном кабинете. В случае успешного завершения метод вернет
     * массив содержащий присвоенный идентификатор посылки (трекинг-код), ссылку на файл печати этикеток.
     * Кодировка передаваемых и полученых данных строго UTF8!
     * @param array $data параметры посылки
     * @return array массив, содержащий ссылку на печать этикеток и трекинг-код посылки
     */
    public function parselCreate($data);

    /**
     * Позволяет получить ссылку на файл печати этикеток (если таковой доступен).
     * @param string $im_id трекинг-код посылки
     * @return string ссылка для печати этикеток
     */
    public function parselCheck($im_id);
    /**
     * Позволяет получить список всех трекинг кодов посылок которые есть в кабинете но не были сформированы в акт.
     * Формат возвращаемой строки имеет вид, необходимый для передачи в метод parselSend
     * @return string строка, в которой указан список трекинг кодов через запятую
     */
    public function parselList();

    /**
     * Позволяет удалить посылку, но только в том случае, если она не была проведена в акте.
     * @param string $im_id трекинг-код посылки
     * @return array
     */
    public function parselDel($im_id);

    /**
     * Позволяет получить список созданных через API посылок.
     * Если не указывать диапазоны дат, то будет возвращена последняя созданная посылка.
     * Для указания диапазона дат используйте параметры $from (период с) и $to (период до) в формате YYYYMMDD.
     * @param string $from строка даты в формате YYYYMMDD
     * @param string $to строка даты в формате YYYYMMDD
     * @return array список посылок
     */
    public function parselStory($from = '', $to = '');

    /**
     * Формирует акт передачи посылок в boxberry. Необходимо указать список
     * трекинг-кодов через запятую
     * @param string $im_ids список трекинг-кодов посылок через запятую
     * @return array массив, содержащий номер акта и ссылку для получения pdf
     */
    public function parselSend($im_ids);

    /**
     * Позволяет получить список созданных через API актов передачи. Если не указывать диапазоны дат, то будет возвращен
     * последний созданный акт. Для указания диапазона дат используйте параметры $from (период с) и $to (период до) в
     * формате YYYYMMDD.
     * @param string $from строка даты в формате YYYYMMDD
     * @param string $to строка даты в формате YYYYMMDD
     * @return array массив созданных актов передачи за указанный период
     */
    public function parselSendStory($from = '', $to = '');

    /**
     * Метод позволяет получить информацию по заказам, по которым уже сформирован акт, но они еще не доставлены клиенту.
     * @param int @only_postpaid показывать только заказы с наложенным платежом
     * @return array список заказов
     */
    public function ordersBalance($only_postpaid = 0);

    /**
     * Метод позволяет получить информацию по заказам (посылкам). Необходимо указать массив с
     * трекинг кодами либо номерами заказов
     * @param array[] $parcels
     * @return array массив посылок
     */
    public function parcelInfo($parcels);

    /**
     * Отправить запрос к API
     * @param string $method_name имя метода для отправки
     * @param array $parameters список параметров, который будет передан в API
     * @param array options массив доп. опций для выполнения запроса
     */
    public function sendRequest($method_name, $parameters = [], $options = []);
}
