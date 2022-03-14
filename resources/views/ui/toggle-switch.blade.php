@props(['value'])

{{ $attributes->merge(['class' => 'ciao']) }}

<div class="toggle-switch toggle-off">
    <div class="toggle-wrap">
        <div class="toggle-bg-on"></div>
    </div>
    <div class="toggle-handler"></div>
</div>

{{ $value }}

<div class="toggle-switch toggle-on">
    <div class="toggle-wrap">
        <div class="toggle-bg-on"></div>
    </div>
    <div class="toggle-handler"></div>
</div>
