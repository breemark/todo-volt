<?php

use App\Models\Todo;
use function Livewire\Volt\{state, rules};

state(['title' => '']);

rules(['title' => 'required|min:3|max:99']);

$saveTodo = function () {
    $validated = $this->validate();
    
    Todo::create($validated);

    $this->title = '';
};

?>

<div>
    @if(session('status'))
    <x-alert icon="o-information-circle" class="alert-success mb-5">
        {{session('status')}}
    </x-alert>
    @endif
    <form wire:submit="saveTodo">
        <x-textarea
            label="New Todo"
            wire:model="title"
            placeholder="What do you have in mind?..."
            hint="Max 100 chars"
            rows="2"
            inline />

        <x-button type="submit" label="Submit" class="btn-outline float-right" />
    </form>
    <div>
        @error('name')<span class="text-danger">{{$message}}</span>@enderror
    </div> 
</div>
