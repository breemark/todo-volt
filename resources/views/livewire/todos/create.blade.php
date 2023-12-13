<?php

use function Livewire\Volt\{state};

//

?>

<div>
    <x-textarea
        label="New Todo"
        wire:model="bio"
        placeholder="What do you have in mind?..."
        hint="Max 100 chars"
        rows="2"
        inline />

    <x-button label="Submit" class="btn-outline float-right" />
</div>
