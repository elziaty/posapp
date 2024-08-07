<section class="no-print">
	<nav class="navbar navbar-default bg-white m-4">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{action([\Modules\WeightedAverage\Http\Controllers\WeightedAverageController::class, 'dashboard'])}}"><i class="fa fas fa-warehouse"></i> {{__('WeightedAverage::lang.WeightedAverage_module')}}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	<ul class="nav navbar-nav">
            		<li @if(request()->segment(2) == 'settings') class="active" @endif>
                        <a href="{{action([\Modules\WeightedAverage\Http\Controllers\WeightedAverageController::class, 'index'])}}">
                            {{-- @lang('business.settings') --}} الموظفين
                        </a>
                    </li>
                    <li @if(request()->segment(2) == 'settings') class="active" @endif>
                        <a href="{{action([\Modules\WeightedAverage\Http\Controllers\WeightedAverageController::class, 'index'])}}">
                            {{-- @lang('business.settings') --}}المكاتب والموردين
                        </a>
                    </li>
                    <li @if(request()->segment(2) == 'settings') class="active" @endif>
                        <a href="{{action([\Modules\WeightedAverage\Http\Controllers\WeightedAverageController::class, 'index'])}}">
                            {{-- @lang('business.settings') --}}الشحنات
                        </a>
                    </li>
                    <li @if(request()->segment(2) == 'reports') class="active" @endif>
                    	<a href="{{action([\Modules\WeightedAverage\Http\Controllers\WeightedAverageController::class, 'index'])}}">
                    		@lang('report.reports')
                    	</a>
                	</li>
            		<li @if(request()->segment(2) == 'settings') class="active" @endif>
                        <a href="{{action([\Modules\WeightedAverage\Http\Controllers\WeightedAverageController::class, 'index'])}}">
                            @lang('business.settings')
                        </a>
                    </li>
            	</ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
	</nav>
</section>