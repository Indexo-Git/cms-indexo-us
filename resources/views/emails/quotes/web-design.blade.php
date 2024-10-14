@extends('layouts.email')

@section('content')
    <tr>
        <td class="bg_white">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="bg_white email-section">
                        <div class="heading-section" style="text-align: center; padding: 0 30px;">
                            <h2>Download Your Quote</h2>
                            <p>We have automatically generated the quote you requested. You can download it at the following link: <a href="{{ route('show-web-design-quote', [$id, $email]) }}">Download</a></p>
                            <p>Please note that this quote is for informational purposes and does not represent any professional commitment on the part of our team. If you wish to discuss more details or have any questions, we will be happy to talk with you over the phone or in person.</p>
                            <p>We hope to be able to help you soon.</p>
                            <p>Sincerely,</p>
                            <p><i>The indexo team</i></p>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
