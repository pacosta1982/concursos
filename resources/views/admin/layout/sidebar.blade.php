<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/contact-methods') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.contact-method.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/disabilities') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.disability.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/companies') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.company.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/languages') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.language.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/education-levels') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.education-level.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/call-types') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.call-type.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/positions') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.position.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/calls') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.call.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>