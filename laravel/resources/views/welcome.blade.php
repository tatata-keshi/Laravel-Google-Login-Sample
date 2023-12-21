<x-layout>
    <x-slot name="title">
        Welcome
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    <div class="mt-5">
        <div class="container">
            <h3>
                Laravel10のGoogleログインサンプルです
            </h3>
            <a href="{{ route('login.redirect') }}" class="btn btn-primary">ログイン画面へ進む</a>
        </div>
    </div>
</x-layout>
