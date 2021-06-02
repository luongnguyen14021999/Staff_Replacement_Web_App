@component('mail::message')
# Vacancy for class

#There is a vacancy for the class: ['timetable_id'].

@component('mail::button', ['url' => route('accept')])
Accept/Reject
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
