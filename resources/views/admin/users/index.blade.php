@extends('layouts.admin')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <form method="post" action="{{ route('admin.users.update') }}" id="usersForm">
        <div class="table-responsive mb-5">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Имя</th>
                        <th>E-mail</th>
                        <th>Администратор</th>
                        <th>Дата регистрации</th>
                    </tr>
                </thead>
                @isset($items)
                    <tbody>
                        @foreach($items as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <input class="form-check-input js-check"
                                           type="checkbox"
                                           value="{{ $user->id }}"
                                           @checked($user->is_admin)
                                           @disabled($user->id === Auth::id())
                                    >
                                </td>
                                <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                @endisset
            </table>
        </div>

        <button type="reset" class="btn btn-outline-secondary me-3">Отменить</button>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/users.js') }}"></script>
@endpush
