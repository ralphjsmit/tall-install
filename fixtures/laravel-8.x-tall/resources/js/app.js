import Alpine from 'alpinejs';
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm';
import ToastComponent from '../../vendor/usernotnull/tall-toasts/dist/js/tall-toasts'

Alpine.plugin(FormsAlpinePlugin);

Alpine.data('ToastComponent', ToastComponent);

window.Alpine = Alpine;
Alpine.start();
