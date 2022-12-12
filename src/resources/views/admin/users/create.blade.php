@extends('admin.app')

@section('title', 'User Create')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-users-cog icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Create new user</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('users.store') }}" autocomplete="off">
      @csrf
      <div class="form-group row">
        <label for="username" class="col-md-2 col-form-label">{{ __('UserName') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{old('username')}}">
          @error('username')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="role" class="col-md-2 col-form-label">{{ __('Choose Role') }}</label>
        <div class="col-md-10">
          <select class="form-control" name="role" value="{{ old('role') }}">
            @foreach ($roles as $role)
              <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
          </select>
          @error('role')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label">{{ __('Email Address') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-md-2 col-form-label">{{ __('Password') }}</label>
        <div class="col-md-10">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}">
          @error('password')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="password_confirmation" class="col-md-2 col-form-label">{{ __('Confirm Password') }}</label>
        <div class="col-md-10">
          <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{old('password')}}">
          @error('password')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="phone" class="col-md-2 col-form-label">{{ __('Phone Number') }}</label>
        <div class="col-md-10">
          <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
          @error('phone')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="col-md-2 col-form-label">{{ __('Address') }}</label>
        <div class="col-md-10">
          <textarea class="form-control @error('address') is-invalid @enderror" style="height:60px" name="address">{{ old('address') }}</textarea>
          @error('address')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-2"></div>
        <div class="col-md-10">
          <a href="#" class="btn btn-secondary back-btn">Cancel</a>
          <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
