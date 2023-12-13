<?php

use App\Models\Todo;
use function Livewire\Volt\{state, rules};

state(['title' => '']);

rules(['title' => 'required|min:3|max:99']);

$createTodo = function () {
    $validated = $this->validate();
    
    Todo::create($validated);

    $createTodoMessage = "Todo created: {$this->title}";

    $this->title = '';

    $this->dispatch('todo-created');

    session()->flash('status', $createTodoMessage);

};

$closeAlert = function () {
    session()->forget('status');
}


?>

<div>
    @if(session('status'))
    <x-alert icon="o-information-circle" class="alert-success mb-5">
        {{session('status')}}
        <x-slot:actions>
            <form wire:submit="closeAlert"> 
                <x-button type="submit" label="Dismiss" />
            </form>

        </x-slot:actions>
    </x-alert>
    @endif
    <form wire:submit="createTodo">
        <x-textarea
            id="title"
            for="title"
            wire:model="title"
            placeholder="What do you need to do?..."
            hint="Max 100 chars"
            rows="2"
            inline />

        <x-button type="submit" label="Submit" class="btn-outline float-right" />
    </form>
    <div>
        @error('name')<span class="text-danger">{{$message}}</span>@enderror
    </div> 
</div>
