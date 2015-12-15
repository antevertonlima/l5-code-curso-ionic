<div id="register" class="animate form">
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<section class="login_content">
		<form method="POST" action="{{ url('/auth/register') }}">
			{!! csrf_field() !!}
			<h1>Criar Conta</h1>
			<div>
				<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Seu Nome" required="" />
			</div>
			<div>
				<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required="" />
			</div>
			<div>
				<input type="password" name="password" class="form-control" placeholder="Password" required="" />
			</div>
			<div>
				<input type="password" name="password_confirmation" class="form-control" placeholder="Password" required="" />
			</div>
			<div>
				<input type="submit" class="btn btn-default submit" value="Criar" />
			</div>
			<div class="clearfix"></div>
			<div class="separator">

				<p class="change_link">Already a member ?
					<a href="#tologin" class="to_register"> Log in </a>
				</p>
				<div class="clearfix"></div>
				<br />
				<div>
					<h1><i class="fa fa-paw" style="font-size: 26px;"></i> CodeDelivery!</h1>

					<p>©2015 All Rights Reserved. CodeDelivery. Privacy and Terms</p>
				</div>
			</div>
		</form>
		<!-- form -->
	</section>
	<!-- content -->