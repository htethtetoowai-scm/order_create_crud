@extends('admin.app')

@section('title', 'User Show')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit"></i>
      </div>
      <div>User Detail</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <div class="form-group row">
      <label for="username" class="col-md-2 col-form-label">{{ __('UserName') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="name" value="{{$user->username}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="role" class="col-md-2 col-form-label">{{ __('Role') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="role" value="{{$user->role->name}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-md-2 col-form-label">{{ __('Email') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="description" value="{{$user->email}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-md-2 col-form-label">{{ __('Phone Number') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="phone" value="{{$user->phone}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="address" class="col-md-2 col-form-label">{{ __('Address') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="address" value="{{$user->address}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="status" class="col-md-2 col-form-label">{{ __('Activate Status') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="status" value="{{$user->status == 0 ? 'Deactivate' : 'Activate'}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="date" class="col-md-2 col-form-label">{{ __('Create at') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="date" value="{{$user->created_at->format('Y-m-d')}}" readonly>
      </div>
    </div>
    <div class="form-group row mb-0">
      <div class="col-md-2"></div>
      <div class="col-md-10">
        <a href="#" class="btn btn-secondary back-btn">Back</a>
      </div>
    </div>
  </div>
</div>

@endsection
