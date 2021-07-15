


<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}"><i class="nav-icon fa fa-plus-circle"></i> {{ trans('admin.applicant.usuarioapplicant') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/applications') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.applicant.applications') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/calls') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.applicant.calls') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/resume') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.applicant.resume') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/reports') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.applicant.reports') }}</a></li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
