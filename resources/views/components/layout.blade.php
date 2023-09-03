<div>
    <x-navigation />

    <!-- Page Content -->
    <main class="m-10">
        {{ $slot }}
    </main>

    @stack('script')
</div>
