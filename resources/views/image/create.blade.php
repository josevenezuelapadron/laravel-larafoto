@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Subir nueva imagen</div>

        <div class="card-body">
          <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right" for="image_path">Sube tu imagen</label>
              <div class="col-md-7">
                <input required type="file" id="image_path" name="image_path" class="form-control {{ $errors->has('image_path') ? 'is-invalid': '' }}">
                @if($errors->has('image_path'))
                  <span class="invalid-feedback" role="alert"><b>{{ $errors->first('image_path') }}</b></span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right" for="description">Sube tu imagen</label>
              <div class="col-md-7">
                <textarea type="text" id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid': '' }}"></textarea>
                @if($errors->has('description'))
                  <span class="invalid-feedback" role="alert"><b>{{ $errors->first('description') }}</b></span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-3">
                <input class="btn btn-primary" type="submit" value="Publicar imagen">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
