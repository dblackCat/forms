## CatDesign.Forms Plugin for October CMS

**Author:** Semen Kuznetsov (CatDesign Group)

**Author URL:** https://cat-design.ru

## In English

### About the plugin
Allows you to manage forms on the site. Process forms, sends data in mail templates. Integration with the Send Pulse service.

This plugin is intended for developers. Allows you to simplify the implementation of forms on the site, organize the management of forms for the customer.

The plugin uses an Ajax handler via the standard data-attributes-api. All events are managed in the administrative interface.

The plugin provides basic partials for drawing forms. Standard blanks are quite flexible, but in some cases you will have to write your own based on the example of the basic ones.

Integration of forms with SendPulse is available out of the box. To do this, you need to fill in the SendPulse API settings.

> Additional features. Integration of shopaholic orders with SendPulse. Requires the OrdersForShopaholic plugin.

### Installing witch composer

`composer require catdesign/forms-plugin`


> Attention! Do not give customers full root access to the system, otherwise they may disrupt
the plugin by making incorrect settings. The rights are prepared in the plugin. Create a new
user and assign - **Manager permission**.

### Getting forms

First, create a form and the necessary fields. After the form is created, it will be assigned a code.
Throw the Forms component to the desired site pages or layout.

There are 2 ways to get a form in total.

**1. Get By ID**

```
{% set form = Forms.getByID(1) %}
```

I do not recommend this method, since when deleting the form you will have to replace the call
in the code.

**2. Get By code**

```
{% set form = Forms.getByCode('code') %}
```

This method is preferable, because you can always assign a code to the form. (Developer rights are required)

### Render of the page (Macros)

**Import the macro into the template**

```
{% import 'catdesign.forms::macros' as Constructor %}
```
**Get form**

```
{% set form = Forms.getByCode('code') %}
```

**Open form**

```
{{ Constructor.open('css_id', form, 'css_classes', {additional_data_one: value, additional_data_two: value}) }}
```

**Render form title**

```
{{ Constructor.title(form, 'css_title_classes', 'css_description_classes') }}
```

**Render all fields**

```
{{ Constructor.fields(form, 'css_wrapper_classes') }}
```

**Or Render individual field**

```
{{ Constructor.hidden(form, 'field_code', 'css_classes', 'css_field_id') }}

{{ Constructor.text(form, 'field_code', 'css_classes', 'css_wrapper_classes', 'css_field_id') }}

{{ Constructor.select(form, 'field_code', 'css_classes', 'css_wrapper_classes', 'css_field_id') }}

{{ Constructor.number(form, 'field_code', 'css_classes', 'css_wrapper_classes', 'css_field_id') }}

{{ Constructor.checkbox(form, 'field_code', 'css_classes', 'css_wrapper_classes', 'css_field_id') }}

{{ Constructor.radio(form, 'field_code', 'css_classes', 'css_wrapper_classes', 'css_field_id') }}

{{ Constructor.textarea(form, 'field_code', 'css_classes', 'css_wrapper_classes', 'css_field_id') }}
```

**Render submit button**

```
{{ Constructor.submit(form, 'css_classes', 'css_wrapper_classes', 'css_field_id') }}
```

**Close form**

```
{{ Constructor.close() }}
```

### Example of drawing a simple feedback form from 2 fields

```
{% import 'catdesign.forms::macros' as Constructor %}
{% set form= Forms.getByCode('feedback') %}

{{ Constructor.open('feedback', form, 'form', {current_url: this.page.url}) }}
    {{ Constructor.title(form, 'form__title', 'form__description') }}
    {{ Constructor.text(form, 'name', 'form-group__field', 'form__group', 'feedback-name') }}
    {{ Constructor.text(form, 'phone', 'form-group__field', 'form__group', null) }}
    {{ Constructor.submit(form, 'button button__green', 'form__button', null) }}
{{ Constructor.close() }}
```

> Note that macro variables are optional. You can pass null if, for example, you don't need css_classes