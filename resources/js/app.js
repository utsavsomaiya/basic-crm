import './bootstrap'
import '../css/app.css'

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm'
import alpineUi from '@alpinejs/ui'

document.addEventListener('alpine:init', () => {
    Alpine.plugin(alpineUi)
})

Livewire.start()
