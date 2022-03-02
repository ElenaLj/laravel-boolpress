@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{$post->title}}</h4>
                </div>

                <div class="card-body">
                    <div class="mb-2">
                        @if ($post->image)
                            <img src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}" class="w-100">
                        @endif
                    </div>
                    <div class="mb-2">
                        @if ($post->published)
                            <p>Status</p>
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-warning">Draft</span>
                        @endif 
                    </div>

                    <div class="mb-2">
                        @if ($post->category)
                            <p>Category</p>
                            <span class="badge badge-info">{{$post->category->name}}</span>
                        @else
                            <span class="badge badge-secondary">No category</span>
                        @endif 
                        {{-- @dd($post); --}}
                        {{-- @dd($post->category)--}}
                    </div>

                    <div class="mb-2">
                        @if(count($post->tags) > 0)
                            <p>Tags</p>
                            @foreach($post->tags as $tag)
                                {{-- @dd($tag) --}}
                                <span class="badge badge-primary"> {{$tag->name}}</span>
                            @endforeach
                        @endif
                    </div>

                    <p>Post Content:</p>
                    <p>{{$post->content}}</p>
                    <a href="{{route("posts.index")}}" class="mt-2">
                        <button type="button" class="btn btn-dark">Go back</button>
                    </a>

                    @if(count($post->comments) > 0)
                    <div class="mt-5">
                        <h5>Comments</h5>
                        <table class="table">
                            <tbody>
                                @foreach ($post->comments as $comment)
                                <tr>
                                    <td>{{$comment->content}}</td>

                                    {{-- approve button --}}
                                    <td>
                                        @if(!$comment->approved)
                                            <form action="{{route('comments.update', $comment->id)}}" method="POST">
                                                @csrf
                                                @method("PATCH")
                                                <input type="hidden" name="approved" value="1">
                                                <button type="submit" class="btn btn-success">Accept</button>
                                            </form>
                                        @else
                                            Approved &check;
                                        @endif
                                    </td>

                                    {{-- deny button --}}
                                    <td>
                                        <form action="{{route("comments.destroy", $comment->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">Deny</button>
                                        </form>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection