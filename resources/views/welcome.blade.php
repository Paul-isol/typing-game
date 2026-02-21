<x-layouts.app>
    <div class="flex items-center justify-center h-screen"> 
        <flux:field>
            <flux:label>Username</flux:label>

            <flux:description>This will be publicly displayed.</flux:description>

            <flux:input name="username" />

            <flux:error name="username" />
        </flux:field>
    </div>
</x-layouts.app>