@extends('errors::illustrated-layout')

@section('code', '403')
@section('title', __('Forbidden'))

@push('styles')
    <style>
        body {
            background: url(errors/src/publish/svg/parallax/403-background.svg);
            margin:0px;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .items {
            display: flex;
            align-items: flex-end;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        .items__inner {
            width: 100%;
            height: 100vh;

        }

        .layer > div {
            left:-5vw;
            position: absolute;
            display: flex;
            align-items: flex-end;
            width: 110vw;
            height: 100vh;
            background-repeat: no-repeat;
        }

        .desert-front {
            bottom: -105vh;
            background: url(errors/src/publish/svg/parallax/403-desert-front.svg) no-repeat bottom;
        }

        .desert-middle {
            background: url(errors/src/publish/svg/parallax/403-desert-middle.svg) no-repeat bottom;
        }

        .desert-back {
            background: url(errors/src/publish/svg/parallax/403-desert-back.svg) no-repeat bottom;
        }

        .clouds {
            top: 40vh;
            background: url(errors/src/publish/svg/parallax/403-clouds.svg) no-repeat top;
        }

        .stars {
            background: url(errors/src/publish/svg/parallax/403-stars.svg) no-repeat top;
        }
    </style>
@endpush

@section('image')
    @if(!env('PARALLAX_ERRORS', false))
        <div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
        </div>
    @else
        <div class="items">
            <div class="items__inner" id="js-scene">
                <div class="items__layer layer" data-hover-only data-depth="0.00"><div class="stars" data-title="no.1"></div></div>
                <div class="items__layer layer" data-hover-only data-depth="0.05"><div class="clouds" data-title="no.2"></div></div>
                <div class="items__layer layer" data-hover-only data-depth="0.20"><div class="desert-back" data-title="no.3"></div></div>
                <div class="items__layer layer" data-hover-only data-depth="0.10"><div class="desert-middle" data-title="no.4"></div></div>
                <div class="items__layer layer" data-hover-only data-depth="0.05"><div class="desert-front" data-title="no.5"></div></div>
            </div>
        </div>
    @endif
@endsection

@section('message', __($exception->getMessage() ?: __('Sorry, you are forbidden from accessing this page.')))

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>

    <script>
        var scene = document.getElementById('js-scene');
        var parallax = new Parallax(scene);
    </script>
@endpush
