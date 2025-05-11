@extends('layouts.general')
@section('content')
    <div class="blog_cards">

        <div class="search_bar">
            <form class="form_search_bar">
                <div class="fx fx-gap">
                    <div>
                        <input type="text" placeholder="Search" required />
                    </div>
                    <div id="search-icon">
                        <button class="search_bar_blogs" type="submit">
                            <div id="search-icon-circle"></div>
                            <span></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <div class="container">
            @foreach ($blogs as $blog)
                <div class="card blog_card_12">
                    <div class="fav_c">
                        <i class="fa-regular fa-heart " id="regular_11"></i>
                        <div class="like_counter">
                            23
                        </div>
                    </div>
                    <div class="card__header">
                        <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="card__image" class="card__image"
                            width="600">
                    </div>
                    <div class="card__body">
                        <span class="tag tag-blue">{{ $blog->tags }}</span>
                        <h4>{{ $blog->title }}</h4>
                        <p>{{ $blog->description }}</p>
                    </div>
                    <div class="card__footer">
                        <div class="user">
                            <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
                            <div class="user__info">
                                <h5>{{ @$blog->user->name }}</h5>
                                <small>
                                    @if ($blog->published_at == null)
                                        ---
                                    @else
                                        {{ $blog->published_at }}
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="card blog_card_12">
                <div class="fav_c">
                    <i class="fa-regular fa-heart " id="regular_11"></i>
                    <div class="like_counter">
                        23
                    </div>
                </div>
                <div class="card__header">
                    <img src="{{ asset('images/tech.jpeg') }}" alt="card__image" class="card__image" width="600">
                </div>
                <div class="card__body">
                    <span class="tag tag-blue">Technology</span>
                    <h4>What's new in 2022 Tech</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo
                        doloribus. Doloremque, nihil! At ea atque quidem!</p>
                </div>
                <div class="card__footer">
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
                        <div class="user__info">
                            <h5>Jane Doe</h5>
                            <small>2h ago</small>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="card">
                <div class="card__header">
                    <img src="{{ asset('images/tech.jpeg') }}" alt="card__image" class="card__image" width="600">
                </div>
                <div class="card__body">
                    <span class="tag tag-blue">Technology</span>
                    <h4>What's new in 2022 Tech</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo
                        doloribus. Doloremque, nihil! At ea atque quidem!</p>
                </div>
                <div class="card__footer">
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
                        <div class="user__info">
                            <h5>Jane Doe</h5>
                            <small>2h ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card__header">
                    <img src="{{ asset('images/food.jpg') }}" alt="card__image" class="card__image" width="600">
                </div>
                <div class="card__body">
                    <span class="tag tag-brown">Food</span>
                    <h4>Delicious Food</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo
                        doloribus. Doloremque, nihil! At ea atque quidem!</p>
                </div>
                <div class="card__footer">
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=2" alt="user__image" class="user__image">
                        <div class="user__info">
                            <h5>Jony Doe</h5>
                            <small>Yesterday</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card__header">
                    <img src="{{ asset('images/raace.jpg') }}" alt="card__image" class="card__image" width="600">
                </div>
                <div class="card__body">
                    <span class="tag tag-red">Automobile</span>
                    <h4>Race to your heart content</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo
                        doloribus. Doloremque, nihil! At ea atque quidem!</p>
                </div>
                <div class="card__footer">
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=3" alt="user__image" class="user__image">
                        <div class="user__info">
                            <h5>John Doe</h5>
                            <small>2d ago</small>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>


    <script>
        const fav_icon = document.getElementById('regular_11');
        fav_icon.addEventListener('click', function() {
            if (fav_icon.classList.contains('fa-regular')) {
                fav_icon.classList.remove('fa-regular');
                fav_icon.classList.add('fa-solid');
            } else {
                fav_icon.classList.remove('fa-solid');
                fav_icon.classList.add('fa-regular');
            }
        });
    </script>
@endsection
