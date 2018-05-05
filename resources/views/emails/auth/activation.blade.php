@component('mail::message')
# Activation your account

Thank for signing up, please activate your account.

@component('mail::button', ['url' => route ('auth.activate',[
                                    'token' => $user->activation_token,
                                    'email' => $user->email
                                    ])
                            ]
          )
 Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
