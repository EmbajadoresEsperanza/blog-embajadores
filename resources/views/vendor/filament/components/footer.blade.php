{{ \Filament\Facades\Filament::renderHook('footer.before') }}

<div class="flex items-center justify-center filament-footer">
    {{ \Filament\Facades\Filament::renderHook('footer.start') }}

    @if (config('filament.layout.footer.should_show_logo'))
        <a
            href="https://eeici.com"
            target="_blank"
            rel="noopener noreferrer"
            class="text-gray-300 transition hover:text-primary-500"
        >


        </a>
    @endif

    {{ \Filament\Facades\Filament::renderHook('footer.end') }}
</div>

{{ \Filament\Facades\Filament::renderHook('footer.after') }}
