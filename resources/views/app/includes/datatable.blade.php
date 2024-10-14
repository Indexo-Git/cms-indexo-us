<div class="datatables-header-footer-wrapper">
    <div class="datatable-header">
        <div class="row align-items-center mb-3">
            @isset($routeNew)
                <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                    <a href="{{ route($routeNew) }}" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ {{ __($newTranslation) }}</a>
                </div>
            @endisset
            <div class="col-8 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">
                <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                    <label for="filter-by" class="ws-nowrap me-3 mb-0">{{ __('datatables.filter-by') }}:</label>
                    <select id="filter-by" class="form-control select-style-1 filter-by" name="filter-by">
                        <option value="all" selected>{{ __('datatables.all') }}</option>
                        @foreach($filterBy as $fBy)
                            <option value="{{ $loop->iteration }}">{{ __($fBy) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4 col-lg-auto ps-lg-1 mb-3 mb-lg-0">
                <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                    <label for="results-per-page" class="ws-nowrap me-3 mb-0">{{ __('datatables.show') }}:</label>
                    <select id="results-per-page" class="form-control select-style-1 results-per-page" name="results-per-page">
                        <option value="12" selected>12</option>
                        <option value="24">24</option>
                        <option value="36">36</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-auto ps-lg-1">
                <div class="search search-style-1 search-style-1-lg mx-lg-auto">
                    <div class="input-group">
                        <label for="search-term" class="sr-only"></label>
                        <input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="{{ __('datatables.search') }}">
                        <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table id="{{ $tableID }}" class="table table-ecommerce-simple table-hover mb-0">
        <thead>
        <tr>
            @isset($actions)
                <th class="w-5">
                    <label for="select-all" class="sr-only"></label>
                    <input id="select-all" type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2">
                </th>
            @endisset
            @foreach($columns as $key => $column)
                <th class="w-{{ $columnSize[$key] }}">{{ __($column) }}</th>
            @endforeach
            @isset($options)
                <th class="w-10">{{ __('datatables.options') }}</th>
            @endisset
        </tr>
        </thead>
        <tbody>
        @foreach($records as $record)
            <tr @isset($rowLink) @class([$rowLink['class']['result'] => $record->{$rowLink['class']['property']} == $rowLink['class']['equals']]) @endisset>
                @isset($actions)
                    <td>
                        <label for="checkbox-{{ __($modelTranslation) }}-{{ $record->id }}" class="sr-only"></label>
                        <input id="checkbox-{{ __($modelTranslation) }}-{{ $record->id }}" type="checkbox" name="{{ __($modelTranslation) }}Checkbox[]" value="{{ $record->id }}" class="checkbox-style-1 {{ __($modelTranslation) }}-checkbox p-relative top-2">
                    </td>
                @endisset
                @foreach($properties as $property)
                    <td @isset($rowLink) class="clickable-row" data-href='{{ route($rowLink['href'], $record->id) }}' @endisset>
                        @if($property['type'] == 'property')
                            {{ $record->{$property['property']} }}
                        @elseif($property['type'] == 'function')
                            {{ call_user_func_array($property['function'], array_merge([$record->{$property['variable']}], $property['params'])) }}
                        @elseif($property['type'] == 'switch')
                            @foreach($property['conditions'] as $condition => $html)
                                @if($record->{$property['property']} == $condition)
                                    {!! $html !!}
                                @endif
                            @endforeach
                        @elseif($property['type'] == 'image')
                            <picture>
                                <source srcset="{{ asset('storage/'. $property['imagePath'] .'/'.$record->id.(isset($property['imageNumber']) ? '-'.$property['imageNumber'] : '').'.webp') }}" type="image/webp">
                                <img class="img-thumbnail img-fluid" src="{{ asset('storage/'. $property['imagePath'] .'/'.$record->id.(isset($property['imageNumber']) ? '-'.$property['imageNumber'] : '').'.jpg') }}" alt="{{ $record->title }}">
                            </picture>
                        @elseif($property['type'] == 'url')
                            <a href="{{ route($property['route'], isset($property['param']) ? $record->{$property['param']} : null) }}" target="_blank"><i class="fa fa-external-link-alt fa-sm me-2"></i>
                                {{ $record->{$property['anchor']} }}
                            </a>
                        @elseif($property['type'] == 'relation')
                            @isset($property['relations'])
                                <ul class="list-unstyled">
                                    @foreach($record->{$property['relations']} as $relation)
                                        <li>{{ $relation->{$property['column']} }}</li>
                                    @endforeach
                                </ul>
                            @elseif($record->{$property['relation']})
                                {{ $record->{$property['relation']}->{$property['column']} }}
                            @endisset
                        @elseif($property['type'] == 'price')
                            @isset($property['sale_price'])
                                {{ number_format($record->{$property['sale_price']}, 0,'.', ',') }}
                            @else
                                {{ number_format($record->{$property['regular_price']}, 0, '.', ',') }}
                            @endisset
                            {{ $settings['priceCurrency']->value }}
                        @elseif($property['type'] == 'phoneNumber')
                            <b class="fs-6">{{ formatPhoneNumber($record->{$property['number']}, $record->{$property['country']}) }}</b>
                        @elseif($property['type'] == 'timer')
                            {{ formatMinutesSeconds($record->{$property['time']}) }}
                        @elseif($property['type'] == 'timezone')
                            {{ setTimezone($record->{$property['property']})->format($settings['call_tracking_date_format']->value. ' H:i:s') }}
                        @elseif($property['type'] == 'count')
                            @isset($property['relation'])
                                {{ $record->{$property['relation']}->count() }}
                            @endisset
                        @elseif($property['type'] == 'datetime')
                            {{ $record->{$property['property']}->format($property['format']) }}
                        @endif
                    </td>
                @endforeach
                @isset($options)
                    <td>
                        @foreach($options as $option)
                            <a id="{{ $record->id }}" href="{{ $option['href'] != '#' ?  route($option['href'], $record->id) : '#' }}" @isset($option['class']) class="{{ $option['class'] }}" @endisset>
                                <button type="button" class="btn btn-sm {{ $option['button'] }}"><i class="bx {{ $option['icon'] }}"></i></button>
                            </a>
                        @endforeach
                    </td>
                @endisset
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr class="solid mt-5 opacity-4">
    <div class="datatable-footer">
        <div class="row align-items-center justify-content-between mt-3">
            @isset($actions)
                <div class="col-md-auto order-1 mb-3 mb-lg-0">
                    <form id="{{ $routeActions }}" method="POST" action="{{ route($routeActions) }}" class="d-flex align-items-stretch">
                        @csrf
                        <div class="d-grid gap-3 d-md-flex justify-content-md-end me-4">
                            <label for="action-type" class="sr-only"></label>
                            <select id="action-type" class="form-control select-style-1 bulk-action" name="action">
                                <option disabled selected>{{ __('datatables.bulk-actions') }}</option>
                                @foreach($actions as $key => $option)
                                <option value="{{ $key }}">{{ __($option) }}</option>
                                @endforeach
                            </select>
                            <button id="submit-actions" type="button" class="bulk-action-apply btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">{{ __('datatables.apply') }}</button>
                        </div>
                    </form>
                </div>
            @endisset
            <div class="col-lg-auto text-center order-3 order-lg-2">
                <div class="results-info-wrapper"></div>
            </div>
            <div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
                <div class="pagination-wrapper"></div>
            </div>
        </div>
    </div>
</div>
