<meta charset="utf-8">
<meta name="description" content="">
<title>Victory</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
<link href="{{ asset('assets/css/filepond.css') }}" rel="stylesheet"> 
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.28.2/filepond.css" integrity="sha512-8Qc4YZy6b3H7ZkZtpPmnthXpYak+idK9X59WkzmNY97Z8R9Ni1seAyDed6vjipyNH8Q3c3S0V42yqg8p7CKweg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<style>
body {
    overflow-x: hidden;
}

#sidebar-wrapper {
    min-height: 100vh;
    margin-left: -15rem;
    -webkit-transition: margin .25s ease-out;
    -moz-transition: margin .25s ease-out;
    -o-transition: margin .25s ease-out;
    transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
    padding: 0.875rem 1.25rem;
    font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
    width: 15rem;
}

#page-content-wrapper {
    min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
    margin-left: 0;
}

@media (min-width: 768px) {
#sidebar-wrapper {
    margin-left: 0;
}

#page-content-wrapper {
    min-width: 0;
    width: 100%;
}
#wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
}
}
</style>   
@if($errors->any())
    <p class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</p>
@endif
@include('flash::message')