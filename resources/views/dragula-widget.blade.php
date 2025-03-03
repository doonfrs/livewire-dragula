<div>
    {{-- We only include scripts and initialize Dragula --}}
    <div wire:ignore>
        <script src="https://cdn.jsdelivr.net/npm/dragula@3.7.3/dist/dragula.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/dragula@3.7.3/dist/dragula.min.css" rel="stylesheet">
        
        <script>
            document.addEventListener('livewire:load', function () {
                // Get container elements from their IDs
                const containerIds = @json($containerIds);
                const containers = containerIds.map(id => document.getElementById(id)).filter(el => el !== null);
                const options = @json($options);
                
                // Initialize Dragula
                const drake = dragula(containers, options);
                
                // Handle drag event
                drake.on('drag', function (el, source) {
                    @this.call('handleDragulaEvent', {
                        event: 'drag',
                        item: el.id,
                        source: source.id
                    });
                });
                
                // Handle drop event
                drake.on('drop', function (el, target, source, sibling) {
                    let siblingId = sibling ? sibling.id : null;
                    let position = siblingId ? Array.from(target.children).indexOf(sibling) : target.children.length - 1;
                    
                    @this.call('handleDragulaEvent', {
                        event: 'drop',
                        item: el.id,
                        source: source.id,
                        target: target.id,
                        sibling: siblingId,
                        position: position
                    });
                });
                
                // Handle cancel event
                drake.on('cancel', function (el, container, source) {
                    @this.call('handleDragulaEvent', {
                        event: 'cancel',
                        item: el.id,
                        container: container.id,
                        source: source.id
                    });
                });
                
                // Handle remove event
                drake.on('remove', function (el, container, source) {
                    @this.call('handleDragulaEvent', {
                        event: 'remove',
                        item: el.id,
                        container: container.id,
                        source: source.id
                    });
                });
                
                // Handle shadow event
                drake.on('shadow', function (el, container, source) {
                    @this.call('handleDragulaEvent', {
                        event: 'shadow',
                        item: el.id,
                        container: container.id,
                        source: source.id
                    });
                });
                
                // Handle over event
                drake.on('over', function (el, container, source) {
                    @this.call('handleDragulaEvent', {
                        event: 'over',
                        item: el.id,
                        container: container.id,
                        source: source.id
                    });
                });
                
                // Handle out event
                drake.on('out', function (el, container, source) {
                    @this.call('handleDragulaEvent', {
                        event: 'out',
                        item: el.id,
                        container: container.id,
                        source: source.id
                    });
                });
                
                // Clean up when component is destroyed
                return function () {
                    drake.destroy();
                };
            });
        </script>
    </div>
</div>
