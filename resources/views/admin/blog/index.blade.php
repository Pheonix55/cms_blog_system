@extends('layouts.general')
<link rel="stylesheet" href="/admin/blog/table.css">
@section('content')
    <div class="body_area">
        <p>Sort Table Rows by Clicking on the Table Headers - Ascending and Descending</p>
        <div class="container">

            <div class="table">
                <div class="table-header">
                    <div class="header__item"><a id="no" class="filter__link" href="#">#</a></div>
                    <div class="header__item"><a id="name" class="filter__link" href="#">Auther</a></div>
                    <div class="header__item"><a id="wins" class="filter__link filter__link--number"
                            href="#">title</a></div>
                    <div class="header__item"><a id="draws" class="filter__link filter__link--number"
                            href="#">slug</a></div>
                    <div class="header__item"><a id="losses" class="filter__link filter__link--number"
                            href="#">tags</a></div>
                    <div class="header__item"><a id="total" class="filter__link filter__link--number"
                            href="#">category</a></div>
                    <div class="header__item"><a id="rt" class="filter__link filter__link--number"
                            href="#">Reading Time</a></div>
                    <div class="header__item"><a id="view" class="filter__link filter__link--number"
                            href="#">views</a></div>

                    <div class="header__item"><a id="likes" class="filter__link filter__link--number"
                            href="#">likes</a></div>
                </div>
                {{-- </div> --}}
                {{-- </div> --}}
                <div class="table-content">
                    @foreach ($blogs as $blog)
                        <div class="table-row">
                            <div class="table-data">{{ $blog->id }}</div>
                            <div class="table-data">{{ @$blog->user->name }}</div>
                            <div class="table-data">{{ $blog->title }}</div>
                            <div class="table-data">{{ $blog->slug }}</div>
                            <div class="table-data">{{ $blog->tags }}</div>
                            <div class="table-data">{{ @$blog->category->name }}</div>
                            <div class="table-data">{{ $blog->getReadingTime() }}</div>
                            <div class="table-data">12</div>
                            <div class="table-data">2</div>
                        </div>
                    @endforeach
                    {{-- 
                    
                    <div class="table-row">
                        <div class="table-data">Dick</div>
                        <div class="table-data">1</div>
                        <div class="table-data">1</div>
                        <div class="table-data">2</div>
                        <div class="table-data">3</div>
                    </div>
                    <div class="table-row">
                        <div class="table-data">Harry</div>
                        <div class="table-data">0</div>
                        <div class="table-data">2</div>
                        <div class="table-data">2</div>
                        <div class="table-data">2</div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var properties = [
            'no',
            'name',
            'wins',
            'draws',
            'losses',
            'total',
            'rt',
            'view',
            'likes'
        ];

        $.each(properties, function(i, val) {

            var orderClass = '';

            $("#" + val).click(function(e) {
                e.preventDefault();
                $('.filter__link.filter__link--active').not(this).removeClass('filter__link--active');
                $(this).toggleClass('filter__link--active');
                $('.filter__link').removeClass('asc desc');

                if (orderClass == 'desc' || orderClass == '') {
                    $(this).addClass('asc');
                    orderClass = 'asc';
                } else {
                    $(this).addClass('desc');
                    orderClass = 'desc';
                }

                var parent = $(this).closest('.header__item');
                var index = $(".header__item").index(parent);
                var $table = $('.table-content');
                var rows = $table.find('.table-row').get();
                var isSelected = $(this).hasClass('filter__link--active');
                var isNumber = $(this).hasClass('filter__link--number');

                rows.sort(function(a, b) {

                    var x = $(a).find('.table-data').eq(index).text();
                    var y = $(b).find('.table-data').eq(index).text();

                    if (isNumber == true) {

                        if (isSelected) {
                            return x - y;
                        } else {
                            return y - x;
                        }

                    } else {

                        if (isSelected) {
                            if (x < y) return -1;
                            if (x > y) return 1;
                            return 0;
                        } else {
                            if (x > y) return -1;
                            if (x < y) return 1;
                            return 0;
                        }
                    }
                });

                $.each(rows, function(index, row) {
                    $table.append(row);
                });

                return false;
            });

        });
    </script>
@endsection
