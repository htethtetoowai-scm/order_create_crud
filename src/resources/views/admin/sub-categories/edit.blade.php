@extends('admin.app')

@section('title', 'SubCategory Edit')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Edit SubCategory</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('subCategories.update', [$subCategory->id]) }}" autocomplete="off" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <input type="hidden" name="id" value="{{$subCategory->id}}">
      <div class="form-group row">
        <label for="title" class="col-md-2 col-form-label">{{ __('Title') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$subCategory->title}}">
          @error('title')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-md-2 col-form-label">{{ __('Description') }}</label>
        <div class="col-md-10">
          <textarea class="form-control" style="height:100px" name="description">{{ $subCategory->description }}</textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="category" class="col-md-2 col-form-label">{{ __('Choose Category') }}</label>
        <div class="col-md-10">
          <select class="form-control" name="category_id" value="{{ old('category') }}">
            @foreach ($categories as $category)
              @if ($category->id == $subCategory->category_id)
                <option value="{{$category->id}}" selected>{{$category->title}}</option>
              @else
                <option value="{{$category->id}}">{{$category->title}}</option>
              @endif
            @endforeach
          </select>
          @error('category')
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
