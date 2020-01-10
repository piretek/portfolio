@component('mail::message')

Witaj, pewna osoba chciała się z tobą skontaktować poprzez formularz na stronie.

---

**Imię i nazwisko:** {{ $data['name'] }}<br>
**Email:** [ {{ $data['email'] }} ](mailto:{{ $data['email'] }})

**Wiadomość:**<br>
{{ $data['details'] }}

@endcomponent
