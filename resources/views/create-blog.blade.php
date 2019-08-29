@extends('template')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/blog/create/submit"
        style="width: 500px;margin:auto" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="col-6">
                <div class="form-group">
                    <label for="formTitle">Title</label>
                    <input id="formTitle" type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="formPicture">Picture</label>
                    <input id="formPicture" type="text" name="picture" class="form-control @error('picture') is-invalid @enderror">
                    @error('picture')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="formBody">Body</label>
                    <textarea id="formBody" name="body" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="formExcerpt">Excerpt</label>
                    <textarea id='formExcerpt' name="excerpt" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="formAuthor">Author</label>
                    <input id="formAuthor" type="text" name="author" class="form-control">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="formSlug">Slug</label>
                    <input id="formSlug" type="text" name="slug" class="form-control">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="formFile">File</label>
                    <input id="formFile" type="file" name="image" class="form-control">
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
