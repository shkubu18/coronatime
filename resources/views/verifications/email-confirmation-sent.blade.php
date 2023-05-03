<x-layout>
    <div class="w-fit flex flex-col items-center py-6 m-auto">
        <x-header.logo/>

        <div class="flex flex-col items-center mt-28 sm:mt-44">
            <img src="{{ asset('assets/images/checkmark.gif') }}" alt="confirmation icon">
            <p class="mt-2 text-lg text-center">{{ __('sending-emails.email_confirmation_send') }}</p>
        </div>
    </div>
</x-layout>
