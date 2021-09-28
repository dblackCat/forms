<?php

return [
    'plugin' => [
        'name' => 'Forms',
        'description' => 'Plugin for managing forms'
    ],
    'components' => [
        'forms' => [
            'name'        => 'Forms',
            'description' => 'Managing forms on a page'
        ]
    ],
    'permissions' => [
        'tab'      => 'Forms',
        'forms'    => 'Manager permissions: Manage basic settings, assign mail templates and recipients for forms.',
        'settings' => 'Additional permissions: Manage general settings. The ability to add global addressees-managers.',
        'fields'   => 'Additional permissions: The ability to edit the composition of the form fields, edit the field settings, except for the developer settings.',
        'dev'      => 'Developer permissions: Editing events and CSS classes. Deleting and creating fields and forms. Configuring SendPulse integration.'
    ],
    'navigation' => [
        'forms'    => 'Forms',
        'settings' => 'Settings'
    ],
    'settings' => [
        'label'       => 'Form settings',
        'description' => 'Managing form settings and their integrations',
        'keywords'    => 'forms setting up forms managing forms sendpulse send pulse mailing email email'
    ],
    'controllers' => [
        'forms' => [
            'field_item'            => 'field',
            'list_title'            => 'Managing forms',
            'item_name'             => 'Form',
            'create_toolbar_button' => 'Create form',
        ]
    ],
    'tabs' => [
        'general'     => 'General',
        'events'      => 'Events',
        'integration' => 'Integration',
        'sendpulse'   => 'SendPulse',
        'fields'      => 'Form fields',
        'value_list'  => 'Value list'
    ],
    'columns' => [
        'forms' => [
            'title' => [
                'label' => 'Title',
            ],
            'code' => [
                'label' => 'Code',
            ],
            'is_active' => [
                'label' => 'Active',
            ],
            'is_answer' => [
                'label' => 'Response to the user',
            ],
            'is_sendpulse' => [
                'label' => 'Send to SendPulse',
            ],
            'is_forward' => [
                'label' => 'Specific recipients',
            ]
        ],
        'fields' => [
            'label' => [
                'label' => 'Title',
            ],
            'name' => [
                'label' => 'Code',
            ],
            'required' => [
                'label' => 'Required',
            ],
            'type' => [
                'label' => 'Type',
            ]
        ]
    ],
    'fields' => [
        'settings' => [
            'manager_emails' => [
                'label'       => 'E-mail addresses of administrators',
                'comment'     => 'Enter it separated by commas. This is a global setting for all forms. Data from the forms will be sent to these addresses.'
            ],
            'sendpulse_section' => [
                'label'       => 'SendPulse integration',
                'comment'     => 'You can send contacts to SendPulse. To do this, you need to fill in this authorization data. You can create a form and set the function-Send a contact in SendPulse.'
            ],
            'api_user_id' => [
                'label'       => 'API USER ID - SendPulse'
            ],
            'api_secret' => [
                'label'       => 'API SECRET - SendPulse'
            ],
            'enable_sendpulse_shopaholic' => [
                'label'       => 'Enable integration with Shopaholic orders',
                'comment'     => 'When this option is activated, all orders will be transferred to the SendPulse contact list.'

            ],
            'sendpulse_shopahilic_address_book_id' => [
                'label'       => 'ID of the address book for orders',
                'comment'     => 'You can find out the id by opening the address book in the SendPulse personal account. There will be an ID in the browser`s search bar. Copy it here.'
            ],
            'section_sendpulse_data' => [
                'label'       => 'Contact data SendPulse',
                'comment'     => 'Which order data should be sent to the SendPulse contact list. The required field is email. Important! If you do not specify it, the contact will not be sent. The data is selected from the order properties.'
            ],
            'sendpulse_name' => [
                'label'       => 'Contact name SendPulse'
            ],
            'sendpulse_phone' => [
                'label'       => 'Phone number of the SendPulse contact'
            ],
            'sendpulse_email' => [
                'label'       => 'SendPulse contact`s e-mail'
            ]
        ],
        'forms' => [
            'title' => [
                'label'       => 'Form Title',
            ],
            'code' => [
                'label'       => 'Code',
                'placeholder' => 'Generated after creation',
            ],
            'is_hide_title' => [
                'label'       => 'Hide the form title',
            ],
            'admin_template' => [
                'label'       => 'Mail template for the administrator',
                'comment'     => 'The template content will be sent to the administrator.'
            ],
            'user_template' => [
                'label'       => 'Mail template for the user',
                'comment'     => 'The template content will be sent to the user.'
            ],
            'forward_email' => [
                'label'       => 'E-mail addresses of administrators',
                'comment'     => 'Enter it separated by commas. Data from the forms will be sent to these addresses.'
            ],
            'sendpulse_address_list_id' => [
                'label'       => 'SendPulse Address Book ID',
                'comment'     => 'You can find out the id by opening the address book in the SendPulse personal account. There will be an ID in the browser`s search bar. Copy it here.'
            ],
            'description' => [
                'label'       => 'Comment for the user',
            ],
            'button_text' => [
                'label'       => 'The content of the button-send',
                'default'     => 'Send',
                'comment'     => 'Text, HTML (For example: svg icon)'
            ],
            'fields_section' => [
                'label'       => 'How does it work?',
                'comment'     => 'You can access the data in the mail templates. The variables in the template will correspond to the code of the fields in this form.'
            ],
            'fields_helper' => [
                'title'   => 'Variables are available in the mail template',
                'copy'    => 'Copied',
                'empty'   => 'Add the fields to the form and refresh the page to see the additional variables.',
                'message' => 'Click on the variable to copy its key and paste it into your',
                'link'    => 'mail template.',
            ],
            'fields_toolbar' => [
                'create_button' => 'Create field',
                'remove_button' => 'Remove'
            ],
            'events_loading' => [
                'label'       => 'CSS selector for the preloader (request-loading)',
                'comment'     => 'If you don`t want to show the preloader, leave it empty.'
            ],
            'is_wrapper' => [
                'label'       => 'Wrap fields in a div',
                'comment'     => 'Disable it if you don`t need wrappers. For example, in cases where the design does not provide for them.'
            ],
            'form_classes' => [
                'label'       => 'Form classes'
            ],
            'field_classes' => [
                'label'       => 'Classes of form fields'
            ],
            'button_classes' => [
                'label'       => 'CSS classes of the button'
            ],
            'wrapper_classes' => [
                'label'       => 'Wrapper classes for form fields'
            ],
            'events_ajax_section' => [
                'label'       => 'Sending via the built-in AJAX handler',
                'comment'     => 'The events correspond to the data-request API October CMS.'
            ],
            'events_native_section' => [
                'label'       => 'Sending via a third-party handler',
                'comment'     => 'Only native events. You need to develop a handler for this form yourself.'
            ],
            'events_request' => [
                'label'       => 'Name of the handler method',
                'comment'     => 'You can specify your own AJAX handler instead of the built-in one and use the suggested events. In this case, you will have to implement the sending yourself.'
            ],
            'events_redirect' => [
                'label'       => 'Redirect after sending',
                'comment'     => 'If you don`t want to redirect the user, leave it empty'
            ],
            'events_action' => [
                'label'       => 'The URL of the handler',
                'comment'     => 'You don`t have to specify it if you will use JS.'
            ],
            'events_onsubmit' => [
                'label'       => 'Form onsubmit event (Native)',
                'comment'     => 'Enter a valid JS code.'
            ],
            'events_reset' => [
                'label'       => 'Form onreset event (Native)',
                'comment'     => 'Введите валидный JS код.'
            ],
            'events_success' => [
                'label'       => 'Request-success event of the form (October AJAX)',
                'comment'     => 'Enter a valid JS code.'
            ],
            'events_complete' => [
                'label'       => 'Request-complete event of the form (October AJAX)',
                'comment'     => 'Enter a valid JS code.'
            ],
            'events_error' => [
                'label'       => 'Request-error event of the form (October AJAX)',
                'comment'     => 'Enter a valid JS code.'
            ],
            'events_before_update' => [
                'label'       => 'Request-before-update event of the form (October AJAX)',
                'comment'     => 'Enter a valid JS code.'
            ],
            'events_update' => [
                'label'       => 'Request-update event of the form (October AJAX)',
                'comment'     => 'Введите в формате: partial:#element, partial:#element'
            ],
            'submit_section' => [
                'label'       => 'Sending Parameters',
                'comment'     => 'Enter it separated by commas. This is a global setting for all forms. Data from the forms will be sent to these addresses.'
            ],
            'is_active' => [
                'label'       => 'Available on the website',
                'comment'     => 'You can deactivate the form to hide it from the site pages.'
            ],
            'is_answer' => [
                'label'       => 'Send a response to the user',
                'comment'     => 'A response email will be sent to the user. Important! The form must have a field with the email type.'
            ],
            'is_sendpulse' => [
                'label'       => 'Send a contact to SendPulse',
                'comment'     => 'The form data will be sent to the SendPulse mailing service. Important! The form must have a field with the email type.'
            ],
            'is_forward' => [
                'label'       => 'Specify the addresses of the administrators',
                'comment'     => 'Add recipient addresses for this form. Important! The contacts specified in the settings will not receive emails.'
            ],
            'is_not_send' => [
                'label'       => 'Sending via your own handler',
                'comment'     => 'Important! You will have to develop a handler for this form yourself.'
            ],
        ],
        'fields' => [
            'label' => [
                'label'       => 'Field name',
            ],
            'name' => [
                'label'       => 'Code',
                'placeholder' => 'Will be generated after creation'
            ],
            'required' => [
                'label'       => 'Required to fill in',
                'comment'     => 'The user will not be able to submit the form if the field is not filled in.'
            ],
            'disable_label' => [
                'label'       => 'Disable label',
                'comment'     => 'Do not use the field name, a placeholder will be used instead.'
            ],
            'type' => [
                'label'       => 'Field type',
                'comment'     => 'Choose what the field will look like in the form.'
            ],
            'attribute_value' => [
                'label'       => 'Value',
                'comment'     => 'Default value'
            ],
            'attribute_boolean_value' => [
                'label'       => 'Active',
                'comment'     => 'Activate the checkbox'
            ],
            'attribute_min' => [
                'label'       => 'Minimum value',
            ],
            'attribute_max' => [
                'label'       => 'Maximum value',
            ],
            'attribute_placeholder' => [
                'label'       => 'Placeholder',
                'comment'     => 'Text inside the field'
            ],
            'comment' => [
                'label'       => 'Comment under the field',
            ],
            'classes' => [
                'label'       => 'CSS classes fields',
                'comment'     => 'These classes will be additionally added to the classes specified in the form.'
            ],
            'wrapper_classes' => [
                'label'       => 'CSS classes wrappers fields',
                'comment'     => 'These classes will be additionally added to the classes specified in the form.'
            ],
            'value_list' => [
                'label'       => 'List of values',
                'comment'     => 'Specify an array of values for the select field',
                'prompt'      => 'Add a value',
                'fields'      => [
                    'key' => [
                        'label' => 'Key'
                    ],
                    'value' => [
                        'label' => 'Value'
                    ],
                    'active' => [
                        'label'   => 'Active',
                        'comment' => 'Only one element can be active'
                    ]
                ]
            ],
            'events_native_section' => [
                'label'       => 'Field Events',
                'comment'     => 'Native events only'
            ],
            'events_onclick' => [
                'label'       => 'Onclick',
                'comment'     => 'Enter a valid JS code'
            ],
            'events_onkeyup' => [
                'label'       => 'Onkeyup',
                'comment'     => 'Enter a valid JS code'
            ],
            'events_oninput' => [
                'label'       => 'Oninput',
                'comment'     => 'Enter a valid JS code'
            ],
            'events_onchange' => [
                'label'       => 'Onchange',
                'comment'     => 'Enter a valid JS code'
            ]
        ]
    ],
    'validation' => [
        'form_model' => [
            'title'                     => 'The form header field must be filled in.',
            'button_text'               => 'The field-The content of the button is required to be filled in.',
            'is_forward'                => 'Recipients are not filled in in the settings section! Specify them or activate the function-Specify the addresses of administrators for this form.',
            'is_answer'                 => 'You need to add a field with the email type to the form! Since you have activated the function-Send a response to the user. Disable the function or add the required field.',
            'sendpulse_address_list_id' => 'The - ID field of the SendPulse address book is mandatory, since you have activated the Send Contact to SendPulse function.',
            'forward_email'             => 'The field-Emails of administrators must be filled in, since you have activated the function-Specify the addresses of administrators.',
            'user_template'             => 'The field-Mail template for the user must be filled in, since you have activated the function-Send a response to the user.'
        ],
        'field_model' => [
            'label' => 'Field - The name of the field must be filled in.'
        ],
        'forms_component' => [
            'api_user_id'   => 'The API_USER_ID for sending the contact to SendPulse is not specified.',
            'api_secret'    => 'API_SECRET is not specified for sending the contact to SendPulse.',
            'form_id'       => 'form_id was not passed. It is impossible to get the data for filling out the form!',
            'forward_email' => 'Recipients from administrators are not specified. Check the settings!'
        ],
        'settings_model' => [
            'empty_dropdown'                       => 'Not selected',
            'sendpulse_email'                      => 'The field-E-mail of the SendPulse contact is mandatory, since you have activated the function-Enable integration with Shopaholic orders.',
            'manager_emails'                       => 'The field-E-mail addresses of administrators must be filled in.',
            'sendpulse_shopahilic_address_book_id' => 'The - ID field of the address book for orders is mandatory, since you have activated the function-Enable integration with Shopaholic orders.'
        ]
    ]
];
