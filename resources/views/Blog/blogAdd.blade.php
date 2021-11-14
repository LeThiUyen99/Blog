{{--<form method="post" action="{{route('Blog.blogSave')}}" enctype="multipart/form-data">--}}
{{--    @csrf--}}
{{--    <div>--}}
{{--        <label>Create date</label>--}}
{{--        <input type="date"  name="createDate">--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <label>Blog</label>--}}
{{--        <input type="text" name="blogName">--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <label>Info</label>--}}
{{--        <input type="text" name="blogInf">--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <label>Picture</label>--}}
{{--        <input type="file" name="blogPicture">--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <label>Content</label>--}}
{{--        <input type="text" name="blogContent">--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <label>author</label>--}}
{{--        <select name="userId">--}}
{{--            <option value="">------</option>--}}
{{--            @foreach($users as $user)--}}
{{--                <option value="{{ $user['userId'] }}">{{ $user['userName'] }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <label>Category</label>--}}
{{--        <select name="categoryId">--}}
{{--            <option value="">------</option>--}}
{{--            @foreach($categories as $category)--}}
{{--                <option value="{{ $category['categoryId'] }}">{{ $category['categoryName'] }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <input type="submit" value="Submit">--}}
{{--</form>--}}
@extends('main-dashboard')
@section('content')
    <div class="container">
        <div class="form-add-blog">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('Blog.blogSave')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-row row">
                    <div class="col-md-3 col-xs-12">
                        <label for="name">Tên bài viết:</label>
                    </div>
                    <div class="form-group col-md-9">
                        <input type="text" class="form-control" id="name" placeholder=""
                               name="blogName" value="" required
                               oninvalid="this.setCustomValidity('Tên bài viết không được để trống')"
                               oninput="this.setCustomValidity('')">
                    </div>

                </div>
                <div class="form-row row">
                    <div class="col-md-3 col-xs-12">
                        <label for="name">Ngày tạo bài viết:</label>
                    </div>
                    <div class="form-group col-md-9">
                        <input type="date" class="form-control" id="name" placeholder=""
                               name="createDate" value="" required
                               oninvalid="this.setCustomValidity('Tên bài viết không được để trống')"
                               oninput="this.setCustomValidity('')">
                    </div>

                </div>
                <div class="form-row row">
                    <div class="col-md-3 col-xs-12">
                        <label for="description">Thông tin bài viết:</label>
                    </div>
                    <div class="form-group col-md-9">
                        <textarea class="ckeditor" id="description" rows="5"
                                  name="blogInf">{{old('description', @$blog->description)}}</textarea>
                    </div>
                </div>

                <div class="form-row row">

                    <div class="col-md-3 col-xs-12">
                        <label for="name" class="font-color">account:</label>
                    </div>
                    <div class="wrap-input-create col-md-9 col-xs-12">
                        <label>
                            <select name="userId">
                                @foreach($account as $item)
                                    <option value="{{$item->id}}">{{$item->userName}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="col-md-3">
                        <label for="content" class="font-color"> Nội dung<span
                                class="text-danger"> *</span>:</label>
                    </div>
                    <div class="form-group col-md-9">
                        <textarea class="ckeditor" id="content_blog" name="blogContent" rows="6" cols=""
                                  style="width: 100%">{{old('content', @$blog->content)}}</textarea>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-3">
                        <label>
                            Category</label>
                    </div>
                    <div class="form-group col-md-9">
                        <label>
                            <select name="category">
                                @foreach($categories as $item)
                                    <option value="{{$item->id}}">{{$item->categoryName}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>

                <div class="form-row row">
                    <div class="col-md-3">
                        <label>
                            Ảnh bài viết
                        </label>
                    </div>
                    <div class="form-group col-md-9">
                        <input type="file" name="blogPicture">
                        {{--                        @if($blog && $blog->image)--}}
                        {{--                            <img src="{{  asset($blog->image)}}" width="150px" alt="">--}}
                        {{--                        @endif--}}
                    </div>
                </div>

                <div class="text-center btn-register">
                    <button type="submit" class="btn btn-primary">Đăng bài viết</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('style-js')
    <!-- bootstrap -->
    {{--    <script src="{{asset('assets/js/lib/nestable/jquery.nestable.js')}}"></script>--}}
    <!-- scripit init-->
    <script src="{{asset('backend/package/ckfinder/ckfinder.js')}}"></script>
    <script src={{ asset('backend/package/ckeditor/ckeditor.js') }}></script>
    <script>

        {{--        select 2--}}

        // $(window).on('load', function (){
        //     $( '#content' ).ckeditor();
        // });
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ asset('package/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('package/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('package/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('package/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('package/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('package/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('content_blog', {
            filebrowserBrowseUrl: '{{ asset('package/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('package/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('package/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('package/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('package/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('package/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>

@endsection
