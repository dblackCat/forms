## CatDesign.Forms Plugin for October CMS

**Author:** Semen Kuznetsov (CatDesign Group)

**Author URL:** https://cat-design.ru

## In English

### About the plugin
It is used for simple creation of forms in the administrative interface
and displaying them on the site pages. The plugin is intended exclusively for developers, which would facilitate
the commissioning of sites.

For developers, it represents a ready-made backend for storing form configurations,
processing them and delivering them. It also provides ready-made fragments for use
as flexibly as possible in combat situations.

For users (customers), this plugin provides simple basic settings.
For example, the user can change the form headers, field names, text on the button, comments,
and the most important thing is to assign mail templates and configure additional sending functions.

The plugin does not provide a form design. Only the basic markup. The stylization of the form is
on your shoulders. The plugin has a built-in form handler that supports all the functions from the backend.

The plugin has built-in integration with the SendPulse mailing service. Additionally
, SendPulse integration with the Lovata.OrdersForShopaholic plugin is built in.

**Attention!** Do not give customers full root access to the system, otherwise they may disrupt
the plugin by making incorrect settings. The rights are prepared in the plugin. Create a new
user and assign - **Manager permission**.

### Installing witch composer

`composer require catdesign/forms-plugin`

### Getting forms

First, create a form and the necessary fields. After the form is created, it will be assigned a code.
Throw the Forms component to the desired site pages or layout.

There are 2 ways to get a form in total.

**1. By ID**

`{% set form = Forms.getByID(1) %}`

I do not recommend this method, since when deleting the form you will have to replace the call
in the code.

**2. By code**

`{% set form = Forms.getByCode('code') %}`

This method is preferable, because you can always assign a code to the form. (Developer rights are required)

### Render on the page

The plugin has ready-made fragments for use. They are as unified
as possible and should be suitable for most sites.

**1. You can print the entire form by calling the form fragment**

`{% set form = Forms.getByCode('code') %}`

`{% partial 'Forms::form' id='test' form=form %}`

If necessary, you can **pass additional data to the form**.

`{% partial 'Forms::form' id='test' form=form additional_data=[{key: value}, {key: value}] %}`

They will be printed in hidden fields.

Important! It is necessary to pass the mandatory parameter **id="html_id"** it is necessary to avoid conflicts
if several identical forms are called on the same page. You can pass
any string that matches the name of the html identifier.

**2. You can only print the fields**

`{% partial 'Forms::fields' id='test' form=form %}`

Sometimes such a call is necessary if your form requires to be increased customization.
With such a call, you need to independently implement events and pass basic
data in the handler, such as`form_id'.

You can see how the fragments are arranged and change them for yourself by creating copies in
/themes/theme/partitions.

### Printing fields individually

This plugin can be used as a constructor. For example, you can make
an order form for Shopaholic. Then the customer will be able to change the data of the fields.

To do this, you can print only the fields. So that you can collect everything that your heart desires.

The plugin has ready-made fragments for printing all available field types.
And additionally, the Form model has a method for getting a field by its name.
Here is an example:

`{% set form = Forms.getByCode('code') %}`

`{% partial 'Forms::text' id='test' form=form.getFieldByName('email') %}`

This is the way you can print a field with the email name without printing the entire form.

## На русском
### О плагине
Используется для простого создания форм в административном интерфейсе
и вывода их на страницы сайта. Плагин предназначен исключительно для разработчиков, что бы облегчить
пуско-наладочные работы на сайтах.

Для разработчиков он представляет готовый бекенд для хранения конфигураций форм,
их обработки и доставки. Так же он предоставляет готовые фрагменты для использования
настолько гибко, насколько это возможно в боевых ситуациях.

Для пользователей (заказчиков) данный плагин предоставляет простые базовые настройки.
Например, пользователь может менять заголовки форм, названия полей, текст на кнопке, комментарии,
а самое важное это назначать почтовые шаблоны и настраивать дополнительные функции отправки.

Плагин не предоставляет дизайн форм. Только базовую разметку. Стилизация формы лежит
на ваших плечах. В плагине встроен обработчик форм, который поддерживает все функции из бекенда.

В плагине встроена интеграция с сервисом рассылки SendPulse. Дополнительно встроена
интеграция SendPulse с плагином Lovata.OrdersForShopaholic.

**Внимание!** Не отдавайте заказчикам полный root доступ к системе, иначе они могут нарушить
работу плагина внеся некорректные настройки. В плагине подготовлены права. Создайте нового
пользователя и назначьте - **Разрешение менеджера**.

### Установка через composer

`composer require catdesign/forms-plugin`

### Получение форм

Для начала создайте форму и необходимые поля. После создания формы ей будет присвоен код.
Выбросите компонент Forms на нужные страницы сайта или в layout.

Всего есть 2 способа получения формы.

**1. По идентификатору**

`{% set form = Forms.getByID(1) %}`

Я не рекомендую этот способ, так как при удалении формы вам придется заменить вызов
в коде.

**2. По коду**

`{% set form = Forms.getByCode('code') %}`

Этот способ предпочтительнее, тк вы всегда можете назначить форме код. (Требуются права разработчика)

### Рендер на странице

В плагине есть готовые фрагменты для использования. Они максимально унифицированы
и должны подойти к большинству сайтов.

**1. Вы можете распечатать всю форму вызвав фрагмент form**

`{% set form = Forms.getByCode('code') %}`

`{% partial 'Forms::form' id='test' form=form %}`

Если необходимо форме можно **передать дополнительные данные**.

`{% partial 'Forms::form' id='test' form=form additional_data=[{key: value}, {key: value}] %}`

Они будут распечатаны в hidden полях.

Важно! Необходимо передать обязательный параметр **id='html_id'** он необходим, что бы избежать конфликтов
если будет вызвано несколько одинаковых форм на одной странице. Передать можно
любую строку, которая будет соответствовать имени идентификатора html.

**2. Вы можете распечатать только поля**

`{% partial 'Forms::fields' id='test' form=form %}`

Иногда такой вызов необходим, если ваша форма требует повышенной кастомизации.
При таком вызове вам необходимо самостоятельно реализовать события и передачу базовых
данных в обработчике таких как `form_id`.

Вы можете посмотреть как устроены фрагменты и изменить их под себя, создав копии в
/themes/theme/partials.

### Печать полей по отдельности

Данный плагин можно использовать как конструктор. Например вы можете сделать форму
заказа для Shopaholic. Тогда заказчик сможет менять данные полей.

Для этого предусмотрена печать только полей. Что бы вы могли собрать все что душе угодно.

В плагине есть готовые фрагменты для печати всех доступных типов полей.
И дополнительно модель Form имеет метод для получения поля по его имени.
Вот пример:

`{% set form = Forms.getByCode('code') %}`

`{% partial 'Forms::text' id='test' form=form.getFieldByName('email') %}`

Вот таким способом вы можете распечатать поле с именем email не печатая всей формы.
