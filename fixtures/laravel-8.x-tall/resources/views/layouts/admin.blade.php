<x-layouts.app>
    <x-slot name="htmlClass">
        bg-gray-100
    </x-slot>
    <!-- Include header -->
    
    <div class="w-screen">
        <x-admin.layouts.header />
        
        <section>
            <!-- Include header -->
            {{ $slot }}
        </section>
    </div>
    
    <!-- Footer (if applicable) -->
</x-layouts.app>
