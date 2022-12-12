@extends('admin.app')

@section('title', 'Users edit')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-users-cog icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Edit user</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('users.update', $user->id) }}">
      @csrf
      @method('PATCH')
      <input type="hidden" name="id" value="{{$user->id}}">
      <div class="form-group row">
        <label for="username" class="col-md-2 col-form-label">{{ __('UserName') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username}}">
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
              @if ($role->id == $user->role_id)
                <option value="{{$role->id}}" selected>{{$role->name}}</option>
              @else
                <option value="{{$role->id}}">{{$role->name}}</option>
              @endif
            @endforeach
          </select>
          @error('category')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label">{{ __('Email Address') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="phone" class="col-md-2 col-form-label">{{ __('Phone Number') }}</label>
        <div class="col-md-10">
          <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}">
          @error('phone')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="col-md-2 col-form-label">{{ __('Address') }}</label>
        <div class="col-md-10">
          <textarea class="form-control @error('address') is-invalid @enderror" style="height:60px" name="address">{{ $user->address }}</textarea>
          @error('address')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-md-2 col-form-label">{{ __('Status') }}</label>
        <div class="col-md-10">
          <div class="custom-control custom-radio custom-control-inline pt-2">
            <input type="radio" id="customRadioInline1" name="status" value="1" class="custom-control-input" {{ $user->status == 1 ? 'checked' : ''}}>
            <label class="custom-control-label" for="customRadioInline1">Activate</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="status" value="0" class="custom-control-input" {{ $user->status == 0 ? 'checked' : ''}}>
            <label class="custom-control-label" for="customRadioInline2">Deactivate</label>
          </div>
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
