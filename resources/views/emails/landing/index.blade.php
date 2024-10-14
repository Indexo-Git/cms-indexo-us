@extends('layouts.email')

@section('content')
    <h2>¿Cuál es el beneficio de trabajar con nosotros?</h2>
    <p>Hemos generado identificado las siguientes necesidades <span class="text-primary">basado en tus respuestas</span>:  </p>
    @php
        $titles = [
            '01' => '1.- Goals.',
            '02' => '2.- Considerations.',
            '03' => '3.- Qualities.',
            '04' => '4.- Expectations.',
        ];
    @endphp
    @php
        $currentCategory = null;
    @endphp
    @foreach($selectedValues as $value)
        @php
            $categoryPrefix = explode('-', $value)[0];
        @endphp

        @if($categoryPrefix !== $currentCategory)
            @php
                $currentCategory = $categoryPrefix;
            @endphp
            <h3>{{ $titles[$currentCategory] }}</h3> <!-- Use descriptive titles from the array -->
        @endif
        @if(isset($answers[$value]))
            <p>{!! $answers[$value] !!}</p>
        @endif
    @endforeach
    <h4>No dudes en contactarnos</h4>
    <p>Quedamos atentos a cualquier inquietud o comentario respecto a las respuestas recibidas. Nos preocupa mucho que te sientas escuchado y estamos aquí para ayudarte en todo lo que necesites. Esperamos tener la oportunidad de trabajar juntos y llevar tu proyecto al siguiente nivel.</p>
    <table cellpadding="0" cellspacing="0" border="0" style="margin: 30px 0;">
        <tr>
            <td align="center" style="border: none; background-color: #EBAC26; font-size: 15px; box-shadow: 0 5px 15px rgba(16, 30, 54, 0.15); font-weight: normal; color: #fff; padding: 0 20px; min-width: 180px; height: 50px; line-height: 48px; cursor: pointer; border-radius: 50px; mso-padding-alt: 10px 20px;">
                <a href="{{ route('contact') }}" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; line-height: 48px; width:100%; display:inline-block">Contáctanos</a>
            </td>
        </tr>
    </table>
    <hr>
    <p>Atentamente,</p>
    <p><i>El equipo de indexo</i></p>
@endsection
