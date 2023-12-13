<x-mail::message>
{{-- TODO: Styling mailing message --}}
# testing introduction admission

<h4>Name: {{ $data['learners_name'] }} </h4>
<h4>Email: {{ $data['email'] }} </h4>
<h4>Message: hello po </h4>
<h4>Schedule: {{ $data['schedule'] }} </h4>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
