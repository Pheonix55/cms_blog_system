@extends('layouts.admin')
@section('content')
    <main class="window-main">
        <div class="window-main-header">
            <ol class="breadcrumbs">
                <li class="breadcrumbs-item"><a href="#">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V20.4C21 20.7314 20.7314 21 20.4 21H3.6C3.26863 21 3 20.7314 3 20.4V3.6C3 3.26863 3.26863 3 3.6 3Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <path d="M9.75 9.75V21" stroke="currentColor" stroke-width="1.5" />
                            <path d="M3 9.75H21" stroke="currentColor" stroke-width="1.5" />
                        </svg>Blog</a></li>
                <li class="breadcrumbs-item current"><a href="#">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 21.4V2.6C4 2.26863 4.26863 2 4.6 2H16.2515C16.4106 2 16.5632 2.06321 16.6757 2.17574L19.8243 5.32426C19.9368 5.43679 20 5.5894 20 5.74853V21.4C20 21.7314 19.7314 22 19.4 22H4.6C4.26863 22 4 21.7314 4 21.4Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M16 5.4V2.35355C16 2.15829 16.1583 2 16.3536 2C16.4473 2 16.5372 2.03725 16.6036 2.10355L19.8964 5.39645C19.9628 5.46275 20 5.55268 20 5.64645C20 5.84171 19.8417 6 19.6464 6H16.6C16.2686 6 16 5.73137 16 5.4Z"
                                fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M8 10L16 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M8 18L16 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M8 14L12 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        What web designers can learn from arti...</a></li>
            </ol>
            <div class="publish-actions">
                <div class="publish-info">
                    <span>LAST EDITED<br />
                        2 minutes ago</span>
                </div>
                <button class="button button--save">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 19V5C3 3.89543 3.89543 3 5 3H16.1716C16.702 3 17.2107 3.21071 17.5858 3.58579L20.4142 6.41421C20.7893 6.78929 21 7.29799 21 7.82843V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M8.6 9H15.4C15.7314 9 16 8.73137 16 8.4V3.6C16 3.26863 15.7314 3 15.4 3H8.6C8.26863 3 8 3.26863 8 3.6V8.4C8 8.73137 8.26863 9 8.6 9Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path d="M6 13.6V21H18V13.6C18 13.2686 17.7314 13 17.4 13H6.6C6.26863 13 6 13.2686 6 13.6Z"
                            stroke="currentColor" stroke-width="1.5" />
                    </svg>
                    Save
                </button>
                <button class="button button--schedule">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 4V2M15 4V6M15 4H10.5M3 10V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V10H3Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 10V6C3 4.89543 3.89543 4 5 4H7" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 2V6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M21 10V6C21 4.89543 20.1046 4 19 4H18.5" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Schedule
                </button>
                <button class="button button--publish">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M17.4995 6.34835C19.7975 5.80967 21.4447 5.87208 21.8376 6.66002C22.5686 8.12616 18.6797 11.5491 13.1515 14.3053C7.62327 17.0616 2.5492 18.1074 1.81821 16.6413C1.4263 15.8553 2.36234 14.5067 4.16701 13.0001"
                            stroke="currentColor" stroke-width="1.5" />
                    </svg>
                    Publish
                </button>
            </div>
        </div>
        <div class="window-main-body">

            <div> <input id="x" type="hidden" name="content">
                <trix-editor input="x"></trix-editor>
            </div>
            <div class="window-main-body-right">
                <section class="settings-section">
                    <h2 class="section-title">Settings</h2>

                    <div class="input-group">
                        <label class="input-label">Slug</label>
                        <input type="text" class="input-field"
                            value="what-web-designers-can-learn-from-artists-from-van-gogh-to-lloyd-wright" />
                    </div>
                    <div class="input-group">
                        <label class="input-label">Full URL</label>
                        <a href="#"
                            class="input-url">https://bold.io/blog/what-web-designers-can-learn-from-artists-from-van-gogh-to-lloyd-wright</a>
                    </div>
                </section>
                <section class="settings-section">
                    <h2 class="section-title">Social</h2>
                    <div class="input-group">
                        <label class="input-label">Featured Image</label>
                        <button class="input-image">
                            <span class="input-image-wrapper">
                                <img src="https://assets.codepen.io/285131/painting.jpg" />
                            </span>
                            <span class="input-image-meta">
                                <span class="input-image-meta-title">fb-painting.jpg</span>
                                <span class="input-image-meta-action">Change</span>
                            </span>
                        </button>
                    </div>
                    <div class="input-group">
                        <label class="input-label">Meta Title</label>
                        <input type="text" class="input-field"
                            value="What web designers can learn from artists - from Van Gogh to Lloyd Wright" />
                    </div>
                    <div class="input-group">
                        <label class="input-label">Meta Description</label>
                        <textarea class="input-field input-field--textarea">Art in it's classic form, like painting and sculpting, is not that different to the creations of web and UI designers. Even though their purpose is different - as the goal of great web design is to enhance user experiences - there's still a lot to learn from the former.</textarea>
                    </div>
                </section>
                <section class="settings-section">
                    <h2 class="section-title">Byline</h2>
                    <div class="input-group">
                        <label class="input-checkbox">
                            <input type="checkbox" class="input-checkbox-box" checked />
                            <span class="input-checkbox-toggle"></span>
                            <span class="input-checkbox-label">Show author</span>
                        </label>
                        <label class="input-checkbox">
                            <input type="checkbox" class="input-checkbox-box" checked />
                            <span class="input-checkbox-toggle"></span>
                            <span class="input-checkbox-label">Date published</span>
                        </label>
                        <label class="input-checkbox">
                            <input type="checkbox" class="input-checkbox-box" />
                            <span class="input-checkbox-toggle"></span>
                            <span class="input-checkbox-label">Date edited</span>
                        </label>
                    </div>
                </section>
                <section class="settings-section">
                    <h2 class="section-title">Actions</h2>
                    <button class="button button--delete">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 11V20.4C19 20.7314 18.7314 21 18.4 21H5.6C5.26863 21 5 20.7314 5 20.4V11"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M14 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M21 7L16 7M3 7L8 7M8 7V3.6C8 3.26863 8.26863 3 8.6 3L15.4 3C15.7314 3 16 3.26863 16 3.6V7M8 7L16 7"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Move to trash
                    </button>
                </section>
            </div>
        </div>
    </main>
@endsection
