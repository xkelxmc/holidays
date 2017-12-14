{{ trans('profile.click_here_to_reset') }}: <a href="{{ $link = url('profile/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
