@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-12">
            @component('components.backend.card.card-form')
                @slot('isfile', true)
                @slot('action', Route('user.store'))
                @slot('method', 'POST')
                @slot('content')
                    <x-forms.input name="name" label="Full Name" :isRequired="true" hintText="Must match the ID card" />

                    <x-forms.select name="gender" label="Gender" :isRequired="true">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </x-forms.select>

                    <x-forms.input name="email" type="email" label="Email" :isRequired="true" />
                    <x-forms.input name="password" type="password" label="Password" :isRequired="true" />
                    
                    <div class="text-right">
                        <a href="{{ Route('user.index') }}" class="btn btn-secondary " href="#">{{ __('button.cancel') }}</a>
                        <button type="submit" class="btn btn-primary " href="#">{{ __('button.save') }}</button>
                    </div>

                @endslot
            @endcomponent
        @endsection
