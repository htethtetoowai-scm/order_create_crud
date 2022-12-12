@extends('admin.app')

@section('title', 'Roles Show')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Roles Detail</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <div class="form-group row">
      <label for="name" class="col-md-2 col-form-label">{{ __('Name') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="name" value="{{$role->name}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="date" class="col-md-2 col-form-label">{{ __('Create at') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="date" value="{{$role->created_at}}" readonly>
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
