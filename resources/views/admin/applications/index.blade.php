@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applications.actions.index'))

@section('body')

<applications-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/applications') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.applications.actions.index') }}
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="text-center" is='sortable' :column="'SEOBId'">{{ trans('admin.applications.columns.NroExp') }}</th>
                                        <th is='sortable' :column="'project_id'">{{ trans('admin.applications.columns.NroExpsol') }}</th>
                                        <th is='sortable' :column="'project_id'">{{ trans('admin.applications.columns.NroExpFch') }}</th>
                                        <td class="text-center" is='sortable' :column="'project_id'">{{ trans('admin.applications.columns.Status') }}</td>
                                        <th class="text-center" is='sortable' :column="'project_id'">{{ trans('admin.applications.columns.NroExpPer') }}</th>
                                        <th class="text-center" is='sortable' :column="'project_id'">{{ trans('admin.applications.columns.user') }}</th>
                                        <th></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="text-center">@{{ item.NroExp }}</td>
                                        <td>@{{ item.NroExpsol }}</td>
                                        <td>@{{ item.NroExpFch }}</td>
                                        <td class="text-center"><span class="badge" v-bind:style="item.task ?  { backgroundColor: item.task.status.status.color } : 'backgroundColor:#f5f5f4'">@{{ item.task ? item.task.status.status.name : 'N/A' }}</span></td>
                                        <td class="text-center">@{{ item.NroExpPer }}</td>
                                        <td class="text-center">@{{ item.NUsuNombre }}</td>
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/show'" title="{{ trans('brackets/admin-ui::admin.btn.show') }}" role="button"><i class="fa fa-search"></i></a>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <!--<i class="icon-magnifier"></i>-->
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <!--<p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/visits/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.visit.actions.create') }}</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </applications-listing>

@endsection
