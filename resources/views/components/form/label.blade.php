@props(['inputName', 'labelName'])

<label for="{{ $inputName }}" class="font-semibold block mb-1">
    {{ __($labelName) }}
</label>
