@extends('app')

@section('content')
	<div id="login" class="animate form">
		<section class="login_content">
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
			<form method="POST" action="{{ url('/auth/login') }}">
				{!! csrf_field() !!}
				<h1>Identifique-se!</h1>
				<div>
					<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="seuemail@seuemail.com" required="" />
				</div>
				<div>
					<input type="password" name="password" class="form-control" placeholder="Password" required="" />
				</div>
				<div>
					<input type="submit" class="btn btn-default submit" value="Logar" />
					<a class="reset_pass" href="{{ url('/password/email') }}">Perdeu sua senha?</a>
				</div>
				<div class="clearfix"></div>
				<div class="separator">

					<p class="change_link">E novo por aqui?
						<a href="#toregister" class="to_register"> Crie uma Conta! </a>
					</p>
					<div class="clearfix"></div>
					<br />
					<div>
						<h1><i class="fa fa-paw" style="font-size: 26px;"></i> CodeDelivery</h1>

						<p>©2015 All Rights Reserved. CodeDelivery. Privacy and Terms</p>
					</div>
				</div>
			</form>
			<!-- form -->
		</section>
	<!-- content -->
	</div>
@include('auth.register')

@endsection
