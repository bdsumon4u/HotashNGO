@extends('translation::layout')

@section('body')
    <form action="{{ route('languages.translations.index', ['language' => $language]) }}" method="get">
        <div class="panel bg-white m-0 p-2">
            <div class="panel-header">
                <div class="flex flex-col md:flex-row flex-grow justify-end items-center">
                    <div class="py-1">{{ __('translation::translation.translations') }}</div>
                    <div class="py-1 flex flex-col md:flex-row items-center">
                        @include('translation::forms.search', ['name' => 'filter', 'value' => Request::get('filter')])
                        {{--                        @include('translation::forms.select', ['name' => 'language', 'items' => $languages, 'submit' => true, 'selected' => $language])--}}
                    </div>
                    <div class="py-1 flex flex-col md:flex-row items-center">
                        {{--                        @include('translation::forms.select', ['name' => 'group', 'items' => $groups, 'submit' => true, 'selected' => Request::get('group'), 'optional' => true])--}}
                        <a href="{{ route('languages.translations.create', $language) }}" class="button">
                            {{ __('translation::translation.add') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                @if(count($translations))
                    <table>
                        <thead>
                        <tr>
                            <th class="w-1/5 uppercase font-thin">{{ __('translation::translation.group_single') }}</th>
                            <th class="w-1/5 uppercase font-thin">{{ __('translation::translation.key') }}</th>
                            <th class="uppercase font-thin">{{ config('app.locale') }}</th>
                            <th class="uppercase font-thin">{{ $language }}</th>
                            <th class="uppercase font-thin" width="120">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($translations as $type => $items)
                            @foreach($items as $group => $translations)
                                @foreach($translations as $key => $value)
                                    @php($locale = $value[config('app.locale')] ?? null)
                                    @php($lang = $value[$language] ?? null)
                                    @if(!is_array($locale) && !is_array($lang))
                                        <tr>
                                            <td>{{ $group }}</td>
                                            <td>{{ $key }}</td>
                                            <td>{{ $locale }}</td>
                                            <td>
                                                <translation-input
                                                    initial-translation="{{ $lang }}"
                                                    language="{{ $language }}"
                                                    group="{{ $group }}"
                                                    translation-key="{{ $key }}"
                                                    route="{{ config('translation.ui_url') }}">
                                                </translation-input>
                                            </td>
                                            <td style="text-align: center">
                                                <form action="{{ route('languages.translations.remove') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="key" value="{{ $key }}">
                                                    <button type="submit" style="color: red;">x</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </form>
@endsection
