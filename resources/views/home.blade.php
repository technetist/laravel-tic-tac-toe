@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="profile-picture">
                        <img src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim( $user->email ) ) ) }}?d=retro&s=200" class="img-circle img-responsive" alt="user avatar">
                    </div>
                    <div class="profile-info">
                        <div class="username">{{ $user->name }}</div>
                        <div class="score">{{ $user->score }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-right">
                        <form action="" class="form-inline" method="get">
                            <label>Search:</label>
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="list-group">
                        @foreach($users as $opponent)
                            <a href="" class="list-group-item clearfix">
                                <img src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim( $opponent->email ) ) ) }}?d=retro" alt="user avatar" class="img-circle img-responsive">
                                <span class="opponent-info">
                                    {{ $opponent->name }} <br>
                                    <small>Score: {{ $opponent->score }}</small>
                                </span>
                                <form action="/new-game" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{ $opponent->id }}">
                                    <button type="submit" class="btn btn-primary pull-right">Play</button>
                                </form>
                            </a>
                        @endforeach
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="new-game-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Game Invite</h4>
            </div>
            <div class="modal-body">
                <p><span id="from"></span> invited you to play.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="play-button" type="button">Accept</button>
            </div>
        </div>
    </div>
</div>
<form action="" id="new-game-form" method="get">
    {{ csrf_field() }}
</form>
@endsection

@section('scripts')
    <script language="javascript">
        var pusher = new Pusher('5a2c1546ccbd0ebfa401');
        var gamePlayChannel = pusher.subscribe('new-game-channel');
        gamePlayChannel.bind('App\\Events\\NewGame', function(data) {
            if(data.destinationUserId == '{{ $user->id }}'){
                $('#from').html(data.from);
                $('#new-game-form').attr('action', '/board/' + data.gameId);
                $('#new-game-modal').modal('show');
            }
        });
        $('#play-button').on('click', function(){
           $('#new-game-form').submit();
        });
    </script>
@endsection