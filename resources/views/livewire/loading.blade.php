<div>
    <div wire:loading wire:target="{{ $target ?? '' }}" class="loading-spinner">
        Loading...
    </div>

    <style>
        .loading-spinner {
            font-weight: bold;
            color: #3490dc;
            /* Add spinner styles or animation if you like */
        }
    </style>

</div>
