<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/applications') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.applications.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/workflows') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.workflow.title') }}</a></li>
           <!--<li class="nav-item"><a class="nav-link" href="{{ url('admin/workflow-states') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.workflow-state.title') }}</a></li>-->
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tasks') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.task.title') }}</a></li>
           <!--<li class="nav-item"><a class="nav-link" href="{{ url('admin/tasks') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.task.rejected') }}</a></li>-->
           <!--<li class="nav-item"><a class="nav-link" href="{{ url('admin/workflow-navigations') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.workflow-navigation.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/application-statuses') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.application-status.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/categories') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.category.title') }}</a></li>-->
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.role.title') }}</a></li>
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
