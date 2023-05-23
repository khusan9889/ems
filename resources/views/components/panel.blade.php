<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                {{-- @dd($attributes) --}}
                <h4 class="panel-title">{{ $attributes['title'] }}</h4>
                <div class="panel-heading-btn">
                    @isset($attributes['add-url'])
                    <a href="{{ $attributes['add-url'] }}" class="btn btn-xs btn-success"><i class="fa fa-plus"> Add</i></a>
                    @endisset
                    <a href="{{ route('acs.full-table', ['department' => request('department'), 'search' => request('search')]) }}" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-eye"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                        data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <div class="panel-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>