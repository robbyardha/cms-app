@extends('public-blog.layouts.main-landing')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center">

                <div class="row">
                    <form method="GET" action="{{ route('public.blog.index') }}">
                        <div class="d-flex justify-content-between align-items-center">
                            <select class="form-select w-50" name="tag" onchange="this.form.submit()">
                                <option value="">All</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->name }}"
                                        {{ request('tag') == $tag->name ? 'selected' : '' }}>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>

            </div>

            <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                @if ($posts && $posts->isNotEmpty())
                    @foreach ($posts as $post)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('public.blog.show', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h5>


                                    <!-- Like Button -->
                                    <form action="{{ route('public.blog.like', $post->id) }}"
                                        method="POST"onsubmit="return {{ Auth::check() ? '' : 'window.location.href=\'/login\'; return false;' }}">
                                        @csrf

                                        <button type="submit"
                                            class="btn {{ Auth::check() && Auth::user()->hasLiked($post) ? 'btn-danger' : 'btn-outline-primary' }}">
                                            <i class="bi bi-heart"></i> Like ({{ $post->likes->count() }})
                                        </button>
                                    </form>


                                    <hr>

                                    <!-- Comments Section -->
                                    <h6>Comments</h6>
                                    @foreach ($post->comments as $comment)
                                        <div class="mb-3">
                                            <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                                        </div>
                                    @endforeach

                                    @auth
                                        <!-- Comment Form -->
                                        <form action="{{ route('public.blog.comment', $post->id) }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <textarea name="content" class="form-control" rows="3" placeholder="Add a comment"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Post Comment</button>
                                        </form>
                                    @else
                                        <p class="text-muted">Please log in to comment.</p>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="feature-box red">
                            <i class="bi bi-shield-check"></i>
                            <h4>No Post</h4>
                        </div>
                    </div>
                @endif

            </div>

        </div>

    </section>

@section('content')
