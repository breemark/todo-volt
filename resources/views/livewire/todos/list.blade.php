<?php

use App\Models\Todo;
use function Livewire\Volt\{state, rules, computed, on};


$getTodos = fn() => $this->todos = Todo::all();

state(['todos' => $getTodos]);

on(['todo-created' => $getTodos]);

$completeTodo = function (Todo $todo) {
    $todo->update([
        'completed' => !$todo->completed
    ]);

    $this->getTodos();
};

$deleteTodo = function (Todo $todo) {
    $todo->delete();

    $this->getTodos();
};

?>

<div>

    @foreach($this->todos as $todo)
        <x-list-item :item="$todo" >

            <x-slot:value>
                @if($todo->completed)
                    <div class="line-through decoration-4">
                        {{$todo->title}}
                    </div>
                @else
                    {{$todo->title}}
                @endif
            </x-slot:value>

            <x-slot:actions>
                <x-button icon="o-check" class="text-green-500" wire:click="completeTodo({{$todo->id}})" spinner />
                <x-button icon="o-trash" class="text-red-500" wire:click="deleteTodo({{$todo->id}})" spinner />
            </x-slot:actions>
            
        </x-list-item>
    @endforeach
    
</div>
