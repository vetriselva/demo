<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading" > <a href="{{route('admin.registerform.index')}}" > Test App </a> </div>
    <div class="list-group list-group-flush">
        <div class="">
            <a href="{{route('admin.registerform.index')}}" class="{!! (Request::is('admin/registerform*') ? 'active_menu' : '') !!} list-group-item list-group-item-action bg-light">Register Form</a>
        </div>
    </div>
</div>