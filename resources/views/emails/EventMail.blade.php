@component('mail::message')
### Bonjour ! L'événement {{ $event->event->name }} a été annoncé !  
Il aura lieu le {{ date("d/m/Y", strtotime($event->event->date)) }} à {{ date("H:i", strtotime($event->event->heure)) }} et se déroulera à l'adresse suivante: {{ $event->event->lieu }}  



Pour plus d'informations, vous pouvez nous contacter à l'adresse [links text](mailto:impro.orsay@gmail.com)

On espère vous y voir, et que vous passerez un bon moment si vous y venez !  
La TIPS
@endcomponent
