<div class="box">
	<ul class="nav nav-pills nav-stacked">

	  <li role="presentation"
		@if (Request::route()->getName() == 'profile.account.info')
	  	class="active"
	  	@endif
	  	><a href="{{ route('profile.account.info') }}">{{ trans('profile.update_account_info') }}</a></li>

	  <li role="presentation"
		@if (Request::route()->getName() == 'profile.account.password')
	  	class="active"
	  	@endif
	  	><a href="{{ route('profile.account.password') }}">{{ trans('profile.change_password') }}</a></li>

	</ul>
</div>