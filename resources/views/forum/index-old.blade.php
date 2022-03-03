@extends('layouts.app')

@section('title')
Forum
@endsection

@section('content')
<div class="container">
    <div class="card border-0">
        <div class="card-header text-white bg-primary"><a class="text-white" href="{{ route('forum.index') }}">{{ config('app.name') }} Forum</a></div>
        <table class="table table-hover mb-0">
            <thead>
                <th class="p-1 pl-2" style="width: 70%">Category</th>
                <th class="p-1 text-center">Threads</th>
                <th class="p-1 text-center">Posts</th>
                <th class="p-1 text-center">Last Post</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            <a class="text-decoration-none" href="{{ route('forum.category', $category->id) }}">
                                <div class="text-dark">
                                    <h4 class="mb-0">{{ $category->name }}</h4>
                                    <p class="mb-0">{{ $category->description }}</p>
                                </div>
                            </a>
                        </td>
                        <td class="align-middle text-muted text-center">{{ $category->threads()->count() }}</td>
                        <td class="align-middle text-muted text-center">{{ $category->threads()->count() + $category->posts()->count() }}</td>
                        <td class="align-middle text-muted text-center"><small>{{ $category->updated_at->diffForHumans() }}</small></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
