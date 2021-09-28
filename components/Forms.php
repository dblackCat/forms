<?php namespace Catdesign\Forms\Components;

use Catdesign\Forms\Models\Form;
use Catdesign\Forms\Models\Settings;
use Cms\Classes\ComponentBase;
use Lang;
use Mail;
use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\Storage\FileStorage;
use ValidationException;

/**
 * Component - Forms
 * Author: Semen Kuznetsov (CatDesign Group)
 * Author url: http://cat-design.ru
 */
class Forms extends ComponentBase
{
    /**
     * Form data
     * @var mixed
     */
    private $request;


    /**
     * List of recipients
     * @var mixed
     */
    private $recipient;


    /**
     * Component information
     * @return array
     */
    public function componentDetails(): array
    {
        return [
            'name'        => 'catdesign.forms::lang.components.forms.name',
            'description' => 'catdesign.forms::lang.components.forms.description'
        ];
    }


    /**
     * Get form by id
     * @param $form_id
     * @return mixed
     */
    public function getByID($form_id)
    {
        return Form::active()->find($form_id);
    }


    /**
     * Get form by Code
     * @param $code
     * @return mixed
     */
    public function getByCode($code)
    {
        return Form::active()->code($code)->first();
    }


    /**
     * Parse email string as array
     * @param $emails_string
     * @return array
     */
    private function parseEmails($emails_string) : array
    {
        return explode(',', str_replace(' ', '', $emails_string));
    }


    /**
     * Prepare form data and send mail
     * @throws ValidationException
     */
    public function onSend()
    {
        $this->request = input();
        $manager_emails = Settings::get('manager_emails');
        $recipients = $this->parseEmails($manager_emails);

        if (!isset($this->request['form_id'])) {
            throw new ValidationException(['message' => Lang::get('catdesign.forms::lang.validation.forms_component.form_id')]);
        }

        $form = Form::find($this->request['form_id']);

        // Prepare forward email
        if ($form->is_forward) {
            $recipients = $this->parseEmails($form->forward_email);
        }

        // Send answer for managers
        if (is_array($recipients)) {
            foreach ($recipients as $email) {
                $this->recipient = $email;
                Mail::send($form->admin_template->code, $this->request, function($message) {
                    $message->to($this->recipient);
                });
            }
        } else {
            throw new ValidationException(['message' => Lang::get('catdesign.forms::lang.validation.forms_component.forward_email')]);
        }

        // Send answer for user
        $this->recipient = $form->getEmailFieldValue() ?? null;

        if ($form->is_answer and $this->recipient) {
            Mail::send($form->user_template->code, $this->request, function($message) {
                $message->to($this->recipient);
            });
        }

        // Send contact in sendpulse
        if ($form->is_sendpulse and $this->recipient) {
            $this->sendContactInSendPulse($form->sendpulse_address_list_id, $this->recipient, null, null);
        }
    }


    /**
     * Send contact in SenPulse
     * @param $address_book_id
     * @param $email
     * @param null $phone
     * @param null $name
     * @throws ValidationException
     */
    public function sendContactInSendPulse($address_book_id, $email, $phone = null, $name = null)
    {
        $api_user_id = Settings::get('api_user_id');
        $api_secret  = Settings::get('api_secret');

        if (!$api_user_id) {
            throw new ValidationException(['message' => Lang::get('catdesign.forms::lang.validation.forms_component.api_user_id')]);
        }

        if (!$api_secret) {
            throw new ValidationException(['message' => Lang::get('catdesign.forms::lang.validation.forms_component.api_secret')]);
        }

        $sendpulse_client = new ApiClient($api_user_id, $api_secret, new FileStorage());

        $emails_list = [
            [
                'email'     => $email,
                'variables' => [
                    'phone' => $phone,
                    'name'  => $name,
                ]
            ]
        ];

        $sendpulse_client->addEmails($address_book_id, $emails_list);
    }
}
