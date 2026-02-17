@extends('layouts.root') {{--начинаем с того, какой layout расширяем--}}

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
@endsection

@section('body')
    <!-- Навигация -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">TaskBot</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Главный блок -->
    <header class="bg-light py-5">
        <div class="container text-center">
            <h1 class="display-4">Добро пожаловать в TaskBot!</h1>
            <p class="lead mt-3">
                Ваш личный чат-бот для лёгкого управления задачами и событиями.
                Создавайте, отслеживайте и не пропускайте важные дела!
            </p>
            <a href="#features" class="btn btn-primary btn-lg mt-3">Узнать больше</a>
        </div>
    </header>

    <!-- Секция функций -->
    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Что умеет TaskBot</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Создание задач</h5>
                            <p class="card-text">Добавляйте задачи в несколько кликов и следите за их выполнением в реальном времени.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Управление событиями</h5>
                            <p class="card-text">Планируйте встречи и события, чтобы не пропускать важные даты.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Лёгкий контроль</h5>
                            <p class="card-text">Все задачи и события в одном месте, с напоминаниями и быстрым доступом.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Призыв к действию -->
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <h2>Начните использовать TaskBot прямо сейчас!</h2>
            <p class="lead">Создавайте задачи и события быстро, удобно и без лишних усилий.</p>
            <a href="/dashboard" class="btn btn-light btn-lg mt-3">Перейти к боту</a>
        </div>
    </section>
@endsection
