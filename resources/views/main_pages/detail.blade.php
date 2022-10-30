@extends('index')
@section('body')
<style>
    /*CSS for post */
    .post-list{
        margin: 12px -6px;
    }
    .post-items{
        float: left;
        width: 33,33%;
        padding:  6px;
    }
    .post-image{
        padding: 6px;
        width: 100%;
        
    }
    .post-img{
        width: 100%;
        height: 100%;
    }
    .post-padding{
        padding: 12px;
    }
    .post-time{
        padding-top: 6px;
        color: #757575;
    }
    .post-desc{
        padding-top: 6px;
        
    }
    
    /*CSS for follow */
    .follow-list{
        width: 600px;
        margin: 0px auto;
    }
    .follow-items{
        border: solid 1px #ddd;
        margin: 10px 20px;
        overflow: hidden;
    }
    .follow-left{
        float:left;
        width: 200px;
    }
    .follow-image{
        max-width: 100%;
        display: inherit;
    }
    .follow-padding{
        margin-left: 220px;
    }
</style>
<h3>Post list</h3>
<div class="post-list"> 
    <div class="post-items">
        <div class="post-image">
        <img src="https://www.w3schools.com/w3images/newyork.jpg" alt="" class="post-img">
        </div>
        <div class="post-padding">
            <h3 class="post-title">Tiêu đề 1</h3>
            <p class="post-time">Sat 29 Oct 2022</p>
            <p class="post-desc">Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button type="button" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-outline-danger">Delete</button>
        </div>
    </div>
    <div class="post-items">
        <div class="post-image">
        <img src="https://www.w3schools.com/w3images/newyork.jpg" alt="" class="post-img">
        </div>
        <div class="post-padding">
            <h3 class="post-title">Tiêu đề 1</h3>
            <p class="post-time">Sat 29 Oct 2022</p>
            <p class="post-desc">Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button type="button" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-outline-danger">Delete</button>
        </div>
    </div>
    
    <div class="post-items">
        <div class="post-image">
        <img src="https://www.w3schools.com/w3images/newyork.jpg" alt="" class="post-img">
        </div>
        <div class="post-padding">
            <h3 class="post-title">Tiêu đề 1</h3>
            <p class="post-time">Sat 29 Oct 2022</p>
            <p class="post-desc">Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button type="button" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-outline-danger">Delete</button>
        </div>
    </div>
</div>
<h3>List follow</h3>
<div class="follow-list">
    <div class="follow-items">
        <div class="follow-left"><img src="https://www.w3schools.com/w3images/sanfran.jpg" alt="" class="follow-image"></div>
        <div class="follow-padding">
        <h3 class="follow-title">Tiêu đề 1</h3>
        <p class="follow-time">Sat 29 Oct 2022</p>
        <p class="follow-desc">Praesent tincidunt sed tellus ut rutrum sed vitae justo.<a href="#"> See More >></a></p>
        
        </div>
    </div>
    <div class="follow-items">
        <div class="follow-left"><img src="https://www.w3schools.com/w3images/sanfran.jpg" alt="" class="follow-image"></div>
        <div class="follow-padding">
        <h3 class="follow-title">Tiêu đề 1</h3>
        <p class="follow-time">Sat 29 Oct 2022</p>
        <p class="follow-desc">Praesent tincidunt sed tellus ut rutrum sed vitae justo.<a href="#"> See More >></a></p>
        </div>
    </div>
    <div class="follow-items">
        <div class="follow-left"><img src="https://www.w3schools.com/w3images/sanfran.jpg" alt="" class="follow-image"></div>
        <div class="follow-padding">
        <h3 class="follow-title">Tiêu đề 1</h3>
        <p class="follow-time">Sat 29 Oct 2022</p>
        <p class="follow-desc">Praesent tincidunt sed tellus ut rutrum sed vitae justo.<a href="#"> See More >></a></p>
        </div>
    </div>
</div>
@endsection