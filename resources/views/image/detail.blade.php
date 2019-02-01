@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
              <div class="card pub_image pub_image_detail">
                  <div class="card-header">
                    @if($image->user->image)
                      <div class="container-avatar">
                        <img class="avatar" src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" alt="Avatar">
                      </div>
                    @endif

                    <div class="data-user">
                      {{ $image->user->name." ".$image->user->surname }}
                      <span class="nickname">
                        {{" | @".$image->user->nick}}
                      </span>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="image-container image-detail">
                      <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt="imagen">
                    </div>
                    
                    <div class="description">
                      <span class="nickname">{{ "@".$image->user->nick }}</span>
                      <p>{{ $image->description }}</p>
                    </div>

                    <div class="likes">
                      <img src="{{ asset('img/heart-black.png') }}" alt="like">
                    </div>
                    
                    <div class="clearfix"></div>

                    <div class="comments">
                      <h2 class="btn btn-warning btn-sm btn-comments">Comentarios ( {{ count($image->comments) }} )</h2>
                      <hr>

                      <form action="" method="POST">
                        @csrf

                        <input type="hidden" name="image_id" value="{{ $image->id }}">
                        <p>
                          <textarea name="content" required class="form-control"></textarea>
                        </p>

                        <input type="submit" value="Comentar" class="btn btn-success">

                      </form>
                    </div>
                  </div>
              </div>
        </div>
    </div>
</div>
@endsection
