@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-12">
            @component('components.backend.card.card-form')
                @slot('action', Route('master.category.update',$data['category']->id))
                @slot('content')

                    <x-forms.input name="name" id="name" :label="__('field.category_name')" :isRequired="true" value="{{ $data['category']->name }}"/>

                    <x-forms.input name="slug" id="slug" :label="__('field.slug')" :isRequired="true" readonly value="{{ $data['category']->slug }}"/>
                    <x-forms.input type="file" name="thumbnails" id="thumbnails" :label="__('field.thumbnails')" />
                    <p>Leave empty if you do not want to change the thumbnails.</p>

                    <div class="text-right">
                        <a href="{{ Route('master.category.index') }}" class="btn btn-secondary " href="#">{{ __('button.cancel') }}</a>
                        <button type="submit" class="btn btn-primary " href="#">{{ __('button.save') }}</button>
                    </div>

                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).on('keyup', '#name', function() {
            let val = $(this).val();
            let slugformat = val.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $('#slug').val(slugformat);
        });
    </script>
@endpush
