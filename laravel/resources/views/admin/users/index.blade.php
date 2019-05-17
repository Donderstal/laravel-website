@extends('admin.layouts.master', ['title' => 'Users'])

@section('content')
    <div class="row">
        <div class="col-12">
            @panel(['title' => 'Users'])
                <table class="table table-responsive-sm table-hover table-outline mb-0">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center w-1"><i class="icon-people"></i></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Last Activity</th>
                        <th>Last Login</th>
                        <th class="text-center"><i class="icon-settings"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">
                                <div class="avatar">
                                    <img class="img-avatar" src="{{ $user->avatar ? route('image.avatar', $user->avatar) : asset('img/admin/default-avatar.png') }}"
                                         alt="{{ $user->name }}">
                                    <span class="avatar-status {{ $user->isOnline() ? 'badge-success' : 'badge-danger' }}"></span>
                                </div>
                            </td>
                            <td>
                                <div>{{ $user->name }}</div>
                                <div class="small text-muted">
                                    Registered: {{ Carbon\Carbon::parse($user->created_at)->format('F d, Y') }}
                                </div>
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->last_activity ? \Carbon\Carbon::parse($user->last_activity)->ago() : '--' }}
                            </td>
                            <td>
                                {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->ago() : '--' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                   class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i> Edit</a>
                                @if ($user->id != Auth::id())
                                    @button([
                                        'type' => 'delete',
                                        'route' => ['admin.users.delete', $user->id]
                                    ])@endbutton
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endpanel
        </div>
    </div>
@stop