<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReCaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->request_pass( $value );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Recaptcha couldn\'t be solved.');
    }

    public function request_pass( $token )
    {
        $recaptcha = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($recaptcha, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($recaptcha, CURLOPT_POST, 1);
        curl_setopt($recaptcha, CURLOPT_POSTFIELDS,
            "secret=6LeY3c0UAAAAAGb5G6bbHjgitvh9go33g0ndLspa&response=".$token);

        $response = curl_exec($recaptcha);
        curl_close($recaptcha);

        $response = json_decode($response);

        return $response->success;
    }
}
