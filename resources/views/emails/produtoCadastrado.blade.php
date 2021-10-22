@component('mail::message')
    # Olá !

    <p>O produto {!! $produto->nome !!}  foi cadastrado com sucesso! =D</p>

{{--    @component('mail::button', ['url' => $url])--}}
{{--        Visite o nosso site--}}
{{--    @endcomponent--}}

    Obrigado,<br>
    {{ config('app.name') }}
@endcomponent
