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
                      <span class="nickname date">| {{ \FormatTime::LongTimeFilter($image->created_at) }}</span>
                      <p>{{ $image->description }}</p>
                    </div>

                    <div class="likes">
                      <img src="{{ asset('img/heart-black.png') }}" alt="like">
                    </div>
                    
                    <div class="clearfix"></div>

                    <div class="comments">
                      <h2>Comentarios ( {{ count($image->comments) }} )</h2>
                      <hr>

                      <form action="{{ route('comment.save') }}" method="POST">
                        @csrf

                        <input type="hidden" name="image_id" value="{{ $image->id }}">
                        <p>
                          <textarea name="content" required class="form-control {{ $errors->has('content') ? 'is-invalid': '' }}"></textarea>
                          @if($errors->has('content'))
                            <span class="invalid-feedback" role="alert"><b>{{ $errors->first('description') }}</b></span>
                          @endif
                        </p>

                        <input type="submit" value="Comentar" class="btn btn-success">

                      </form>

                      <hr>

                      @foreach($image->comments as $comment)
                        <div class="comment">
                          <span class="nickname">{{ "@".$comment->user->nick }}</span>
                          <span class="nickname date">| {{ \FormatTime::LongTimeFilter($comment->created_at) }}</span>
                          <p>{{ $comment->content }}</p>
                        </div>
                      @endforeach
                    </div>
                  </div>
              </div>
        </div>
    </div>
</div>
@endsection
