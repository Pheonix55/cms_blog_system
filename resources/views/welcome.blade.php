@extends('layouts.general')
@section('content')
    <style>
        .cards_section {
            display: grid;
            /* place-items: center; */
            /* grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); */
            grid-template-columns: repeat(3, 350px);
            width: 70%;
            margin: 0 auto;
            column-gap: 5px;
            row-gap: 20px;

        }

        .cards_section .blog_cards_wrapper {
            height: auto;
            width: 100%;
            padding-block: 5px;
            padding-inline: 10px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: start;
        }

        .blog_cards_wrapper {
            /* background: rgba(255, 255, 255, 0.1); */
            /* translucent white */
            border-radius: 16px;
            padding: 20px;
            color: white;
            backdrop-filter: blur(12px);
            /* main glass effect */
            -webkit-backdrop-filter: blur(12px);
            /* border: 1px solid rgba(255, 255, 255, 0.2); */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .blog_cards_wrapper:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 40px rgba(0, 0, 0, 0.6);
        }



        .cards_section .blog_cards_wrapper .image_section {
            width: 100%;
            /* height: 150px; */

        }

        .cards_section .blog_cards_wrapper .image_section .image_card {
            width: 100%;
            height: 200px;
            /* or any fixed height you want */
            border-radius: 5%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        .flex_space_between {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding-inline: 10px
        }

        .flex_space_start {
            justify-content: flex-start !important;
            gap: 10px;
        }

        .flex_space_end {
            justify-content: flex-end !important;
            gap: 10px;
        }

        .blog_cards_wrapper a {
            color: #fff;
        }

        .blog_cards_wrapper .partials_section {
            color: #fff;
            font-size: 10px;
            padding-top: 5px;
        }

        .discription_section {
            display: flex;
            padding-top: 15px;
            flex-direction: column;
            gap: 15px;
            line-height: 20px;
        }

        .discription_section .title {
            font-size: 20px;
        }

        .discription_section .discription {
            font-size: 12px;
        }

        .user_section {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: flex-start;
        }

        .user_section .user_avatar {
            height: auto;
            width: 30px;
        }

        .user_section .user_avatar img {
            border-radius: 15%;
        }

        .user_section .user_name {
            font-size: 12px;
        }
    </style>
    <div class="cards_section">

        @foreach ($blogs as $blog)
            <div class="blog_cards_wrapper">
                <div class="image_section">
                    <div class="image_card" style="background-image: url('{{ asset('storage/' . $blog->featured_image) }}')">
                    </div>

                </div>
                <div class="partials_section flex_space_between">
                    <div class="tags flex_space_between flex_space_start">
                        @foreach (collect(json_decode($blog->tags))->take(6) as $tag)
                            <a href="#{{ $tag }}">{{ $tag }}</a>
                        @endforeach
                    </div>
                    <div class="time_views flex_space_between flex_space_end">
                        <p>{{ $blog->published_at ?? '--' }}</p>
                        <p>30 views</p>
                    </div>
                </div>
                <div class="discription_section">
                    <p class="title">{{ $blog->title }}</p>
                    <p class="discription">{{ $blog->description }}</p>

                </div>
                <div class="user_section">
                    <div class="user_avatar">
                        <img src="{{ asset('storage/' . ($blog->user->profile_image ?? 'images/avatar_default.png')) }}"
                            alt="User Avatar">


                    </div>
                    <div class="user_name">
                        <p>{{ @$blog->user->name }}</p>
                    </div>
                </div>
            </div>
        @endforeach



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
