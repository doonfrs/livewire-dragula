<?php

namespace YourNamespace\LivewireDragula\Http\Livewire;

use Livewire\Component;

class DragulaWidget extends Component
{
    /**
     * IDs of the containers to enable drag and drop
     */
    public $containerIds = [];
    
    /**
     * Options for Dragula
     */
    public $options = [];
    
    /**
     * Initialize the component
     */
    public function mount($containerIds = [], $options = [])
    {
        $this->containerIds = $containerIds;
        $this->options = array_merge(config('livewire-dragula.default_options', []), $options);
    }
    
    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire-dragula::dragula-widget');
    }
    
    /**
     * Handle dragula events
     */
    public function handleDragulaEvent($data)
    {
        // Pass the event up to the parent component
        $this->emitUp('dragulaEvent', $data);
    }
}

