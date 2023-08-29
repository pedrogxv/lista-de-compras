<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-xl sm:rounded-lg">
            <div {{ $attributes->class(['p-6 text-white sm:px-20' => true]) }}>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
