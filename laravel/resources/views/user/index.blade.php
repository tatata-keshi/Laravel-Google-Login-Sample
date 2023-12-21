<x-layout>
    <x-slot name="title">
        ユーザー一覧
    </x-slot>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('logout')}}">ログアウト</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>アイコン</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><img src="{{ $user->avatar }}" alt="icon"></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
