@extends('theme.master')

@section('second-title','Login')

@section('content')

 <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-6 mx-auto">
          <form action="{{ route('login') }}" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="form-group">
              <input class="form-control border" name="email" placeholder="Enter email address" value="{{ old('email') }}" >
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="form-group">
              <input class="form-control border" name="password" type="password" placeholder="Enter your password">
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <a href="{{ route('theme.register') }}" class="mx-3"> Sing Up instead </a>
              <button type="submit" class="button button--active button-contactForm">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

@endsection