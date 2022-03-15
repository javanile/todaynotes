
<div  class="flex w-full h-full">

    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <div class="flex flex-col w-60 border-r-2 border-gray-100 dark:bg-gray-900">

        <nav class="flex flex-col p-0 mt-4 mr-0 ml-4 text-center sticky top-20">
            <input id="nid" wire:model="nid">

            <ul>
                <li class="pr-4 bg-gray-50 font-bold border-2 border-r-0 border-gray-100 rounded-l-md">16/10/1981 {{ $total }}<li>
                @foreach($notes as $note)
                    <li>{{ $note->title }}<li>
                @endforeach
            </ul>
            <button wire:click="increment">Ciao</button>

            {{ $tagline }}
        </nav>

        {{--
        <x-toggle-switch value="{{ 'Hello' }}">
            AA
        </x-toggle-switch>
        --}}
    </div>

    <!-- the items i want to put in a 3 grid layout !-->
    <div class="flex flex-col w-full h-full m-0 ml-4">
        <div class="pt-6 pb-4 px-4">
            <h2 class="text-gray-400 -ml-0.5 text-4xl font-bold font-italic">
                Monday, March 14, 2022 - Personal Notes

                <x-toggle-switch></x-toggle-switch>
            </h2>
            <div class="text-sm text-gray-400">
                Last update 12312312 by Fradasdas - added line "asdasdasd"
            </div>
        </div>

        <div wire:ignore>
            <div id="editor" class="py-0 m-0">
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br></p>
            </div>
        </div>

        <textarea id="buffer"></textarea>
    </div>

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                keyboard: {
                    bindings: {
                        custom: {
                            key: 13,
                            handler: function(range, context) {
                                setTimeout(function () {
                                    let caret = document.getSelection().anchorNode;
                                    if (caret.nodeType != 1) {
                                        caret = caret.parentNode;
                                    }
                                    if (caret.getBoundingClientRect().bottom >= window.innerHeight) {
                                        caret.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                    }
                                }, 100)
                                return true;
                            }
                        }
                    }
                }
            }
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById('buffer').value = quill.root.innerHTML;
        });

        setInterval(function () {
            Livewire.emit('sync', {
                nid: document.getElementById('nid').value,
                content: document.getElementById('buffer').value
            });
        }, 2500);

    </script>

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
</div>
