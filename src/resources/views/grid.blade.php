<div class="grid">

    @section('header')
    @if(isset($add_url))
        <div class="float-left">
            <a class="btn btn-secondary btn-add" href="{{ $add_url }}">
                <i class="fa fa-plus"></i>
                {{ $add_label ?: 'Nowy' }}
            </a>
        </div>

        <div class="float-right">{{ $pagination }}</div>
    @else
        {{ $pagination }}
    @endif
    @show

    @section('table')
    <form method="get" id="filter-form">
        <table class="table table-striped responsive">
            <thead>
                <tr>
                    @foreach($columns as $column)
                        @unless($column->isVisible())
                            {{ grid_column($column) }}
                        @endunless
                    @endforeach
                </tr>
                @if($is_filterable)
                    <tr>
                        @foreach($columns as $column)
                            @if($column->isVisible())
                                {{ grid_filter($column) }}
                            @endif
                        @endforeach
                    </tr>
                @endif
            </thead>
            <tbody>
                @if($rows)
                    @foreach($rows as $row)
                        {{ grid_row($row) }}
                    @endforeach
                @else
                    <tr>
                        {{ grid_empty($grid) }}
                    </tr>
                @endif
            </tbody>
            @if($has_footer)
                <tfoot>
                    @foreach($columns as $column)
                        {{ grid_footer($column) }}
                    @endforeach
                </tfoot>
            @endif
        </table>

        <input type="submit" style="visibility: hidden; height: 1px" />
    </form>
    @show

    @section('footer')
    @if(isset($add_url))
        <div class="float-right">{{ $pagination }}</div>
    @else
        {{ $pagination }}
    @endif
    @show
</div>