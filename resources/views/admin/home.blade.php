@extends('templates.admin')
@section('title', 'Página Inicial')
@section('breadcrumb')
    <vstack-breadcrumb :items="[{
        route: '/admin',
        title: 'Página Inicial'
    }, ]">
    </vstack-breadcrumb>
@endsection
@section('content')
    @php
        $user = Auth::user();
    @endphp
    <div class="flex my-4">
        <div class="w-full">
            <h1 class="text-5xl text-neutral-800 font-bold dark:text-neutral-200">Olá, {{ $user->name }}!</h1>
        </div>
    </div>
    <hr class="dark:border-gray-800">
    <div class="flex mt-5">
        <div class="w-full">
            <div class="flex">
                <div class="w-full md:w-6/12">
                    <h4 class="dark:text-neutral-500">Deseja ver as métricas da sua conta ?</h4>
                    <p>
                        <a href="/admin/dashboard" class="vstack-link">
                            <i class="el-icon-data-line mr-1"></i>
                            Acesse o dashboard de sistema
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
