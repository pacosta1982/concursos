<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Resumen</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/llamados') }}"><i class="nav-icon icon-plane"></i> Resumen LLamados</a></li>
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/contact-methods') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.contact-method.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/disabilities') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.disability.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/companies') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.company.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/languages') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.language.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/education-levels') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.education-level.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/call-types') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.call-type.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/positions') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.position.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/calls') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.call.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/disengagement-reasons') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.disengagement-reason.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/language-levels') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.language-level.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/ethnic-groups') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.ethnic-group.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/requirement-types') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.requirement-type.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/requirements') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.requirement.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/resumes') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.resume.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/academic-states') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.academic-state.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/academic-trainings') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.academic-training.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/language-level-resumes') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.language-level-resume.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/end-reasons') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.end-reason.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/work-experiences') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.work-experience.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/applications') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.application.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/statuses') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.status.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/application-statuses') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.application-status.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/call-statuses') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.call-status.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/disability-resumes') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.disability-resume.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/ethnic-resumes') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.ethnic-resume.title') }}</a></li>
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
