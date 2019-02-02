@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($users as $user)
              <div class="profile-user">
                @if($user->image)
                  <div class="container-avatar">
                    <img src="{{ route('user.avatar', ['filename' => $user->image]) }}" alt="Avatar">
                  </div>
                @endif
    
                <div class="user-info">
                  <h1>{{ "@".$user->nick }}</h1>
                  <h2>{{ $user->name." ".$user->surname }}</h2>
                  <p>{{ "Se unió: ".\FormatTime::LongTimeFilter($user->created_at) }}</p>
                </div>
                
                <div class="clearfix"></div>
                <hr>
              </div>
            @endforeach
            
            <!-- Paginación -->
            <div class="clearfix"></div>

            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
