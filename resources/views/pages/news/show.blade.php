@extends("master")
@section('title', $news->title)
@section("description", $news->description)
@section("keywords", $news->keywords)
@section("content")
    <section id="newShow">
        <div class="containers">
            <div class="new-show">
                <div class="breadcrumbs">
                    <div class="breadcrumbs__link">
                        <a href="{{ route("index") }}">Главная</a>
                        <span>/</span>
                    </div>
                    <div class="breadcrumbs__link">
                        <a href="{{ route('news-index') }}">Важная информация</a>
                        <span>/</span>
                    </div>
                    <p class="breadcrumbs__text">{{ $news->title }}</p>
                </div>
                <h1 class="new-show__title">{{ $news->title }}</h1>
                <div class="new-show__content">
                    {!! $news->text !!}
                </div>
            </div>
        </div>
    </section>
    @include("sections.contacts")
@endsection




