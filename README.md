## CatDesign.Forms Plugin for October CMS

**Author:** Semen Kuznetsov (CatDesign Group)

**Author URL:** https://cat-design.ru

## In English

### About the plugin
Allows you to manage forms on the site. Processes forms, sends data in mail templates. Integration with the Send Pulse service.

This plugin is intended for developers. Allows you to simplify the implementation of forms on the site, organize the management of forms for the customer.

The plugin uses an Ajax handler via the standard data-attributes-api. All events are managed in the administrative interface.

The plugin provides basic partials for drawing forms. Standard blanks are quite flexible, but in some cases you will have to write your own based on the example of the basic ones.

Integration of forms with SendPulse is available out of the box. To do this, you need to fill in the SendPulse API settings.

> Additional features. Integration of shopaholic orders with SendPulse. Requires the OrdersForShopaholic plugin.

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

### Render of the page (Macros)

#### Import the macro into the template

`{% import 'catdesign.forms::macros' as formConstructor %}`

#### Macros

`{% set form_model = Forms.getByCode('code') %}`

1. Open form

`{{ formConstructor.open(css_id, form_model, css_classes, additional_data) }}`

2. Render form title

`{{ formConstructor.title(form_model, css_title_classes, css_description_classes) }}`

3. Render all fields

`{{ formConstructor.fields(form_model, css_wrapper_classes) }}`

3. Render individual field

`{{ formConstructor.hidden(form_model, field_code, css_classes, css_field_id) }}`

`{{ formConstructor.text(form_model, field_code, css_classes, css_wrapper_classes, css_field_id) }}`

`{{ formConstructor.select(form_model, field_code, css_classes, css_wrapper_classes, css_field_id) }}`

`{{ formConstructor.number(form_model, field_code, css_classes, css_wrapper_classes, css_field_id) }}`

`{{ formConstructor.checkbox(form_model, field_code, css_classes, css_wrapper_classes, css_field_id) }}`

`{{ formConstructor.radio(form_model, field_code, css_classes, css_wrapper_classes, css_field_id) }}`

`{{ formConstructor.textarea(form_model, field_code, css_classes, css_wrapper_classes, css_field_id) }}`

4. Render submit button

`{{ formConstructor.submit(form_model, css_classes, css_wrapper_classes, css_field_id) }}`

5. Close form

`{{ formConstructor.close() }}`

### Example of drawing a simple feedback form from 2 fields

```
{% import 'catdesign.forms::macros' as formConstructor %}
{% set form_model = Forms.getByCode('feedback') %}

{{ formConstructor.open('feedback', form_model, 'form', {current_url: this.page.url}) }}
    {{ formConstructor.title(form_model, 'form__title', 'form__description') }}
    {{ formConstructor.text(form_model, 'name', 'form-group__field', 'form__group', 'feedback-name') }}
    {{ formConstructor.text(form_model, 'phone', 'form-group__field', 'form__group', null) }}
    {{ formConstructor.submit(form_model, 'button button__green', 'form__button', null) }}
{{ formConstructor.close() }}
```

Note that macro variables are optional. You can pass null if, for example, you don't need css_classes





