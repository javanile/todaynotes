@props(['value'])

<div wire:click="$emit('{{ 'toggle1' }}', event)" class="toggle-switch toggle-off">
    <input wire:model="value" type="hidden"/>
    <div class="toggle-wrap">
        <div class="toggle-bg-on"></div>
    </div>
    <div class="toggle-handler"></div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('toggle1', (event) => {
            let button = event.target;
            if (button.className == 'toggle-handler') {
                button = button.parentNode;
            }
            if (button.className.includes('toggle-off')) {
                button.className = 'toggle-switch toggle-on';
            } else {
                button.className = 'toggle-switch toggle-off';
            }
        })
    })
</script>

{{--
{{ $attributes->merge(['class' => 'ciao']) }}

{{ $value }}

<div class="toggle-switch toggle-on">
    <div class="toggle-wrap">
        <div class="toggle-bg-on"></div>
    </div>
    <div class="toggle-handler"></div>
</div>


    <script>
        /*
            (function($) {
                $.fn.extend({
                    toggleSwitch: function(){


                        $('.toggle-switch').on('click',function(){
                            if($(this).hasClass('toggle-off')){
                                $(this).removeClass('toggle-off').addClass('toggle-on')
                            }else{
                                $(this).removeClass('toggle-on').addClass('toggle-off')
                            }

                        })


                    }
                })
            })(jQuery)
            $(document).ready(function(){
                $('.toggle-switch').toggleSwitch();
            });*/
    </script>


--}}
