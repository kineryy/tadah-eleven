@extends('layouts.app')

@section('title')
{{ $category->name }}
@endsection

@section('content')
<div class="container">
    @if (!$category->admin_only)
            <div class="mb-2">
                <a class="btn btn-success" href="{{ route('forum.createthread', $category->id) }}"><i class="fas fa-plus" aria-hidden="true"></i> New Post</a>
            </div>
    @else
        @if (Auth::user()->admin)
            <div class="mb-2">
                <a class="btn btn-success" href="{{ route('forum.createthread', $category->id) }}"><i class="fas fa-plus" aria-hidden="true"></i> New Post</a>
            </div>
        @else
            <p class="mb-2 text-muted"><small>You can't post here.</small></p>
        @endif
    @endif
	
    <div class="card border-0">
        <div class="card-header text-white bg-primary"><a class="text-white" href="{{ route('forum.index') }}">{{ config('app.name') }} Forum</a> / <a class="text-white" href="{{ route('forum.category', $category->id) }}">{{ $category->name }}</a></div>
        <table class="table table-hover mb-0">
            <thead">
                <th class="p-1 pl-2" style="width: 70%">Title</th>
                <th class="p-1 text-center">Author</th>
                <th class="p-1 text-center">Replies</th>
                <th class="p-1 text-center">Last Post</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="pt-3 pb-3">
                            <a class="text-decoration-none" href="{{ route('forum.getthread', $post->id) }}">
                                <div class="@if ($post->stickied) text-success @else text-dark @endif">
                                    <p class="mb-0">@if ($post->stickied) <i class="fas fa-thumbtack"></i> @endif @if ($post->locked) <i class="fas fa-lock"></i> @endif {{ $post->title }}</p>
                                </div>
                            </a>
                        </td>
                        <td class="pt-3 pb-3 align-middle text-center"><a href="{{ route('users.profile', $post->user->id) }}">{{ $post->user->username }}</a></td>
                        <td class="pt-3 pb-3 align-middle text-muted text-center">{{ $post->replies()->count() }}</td>
                        <td class="pt-3 pb-3 align-middle text-muted text-center">{{ $post->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
