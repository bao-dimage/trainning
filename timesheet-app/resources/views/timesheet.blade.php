<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timesheet') }}

            <x-primary-button >Create Timesheet</x-primary-button>
            
        </h2>
    </x-slot>

    @yield('content')




    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <x-primary-button>
                        SSSS
                    </x-primary-button>
</div>
</div>
        </div>
    </div> -->

    
</x-app-layout>
