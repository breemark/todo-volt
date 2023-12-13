<?php

use App\Models\Todo;
use function Livewire\Volt\{state, rules, computed};

state(['title' => '']);

rules(['title' => 'required']);

$todos = computed(fn() => Todo::all());

?>

<div>

    @foreach($this->todos as $todo)
        <x-list-item :item="$todo" >

            <x-slot:value>
                {{$todo->title}}
            </x-slot:value>

            <x-slot:actions>
                <x-button icon="o-check" class="text-green-500" wire:click="check(1)" spinner />
                <x-button icon="o-trash" class="text-red-500" wire:click="delete(1)" spinner />
            </x-slot:actions>
            
        </x-list-item>
    @endforeach
    
</div>
