<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<div class="flex w-full h-full">
    <div class="flex flex-col w-60 border-r-2 border-gray-100 dark:bg-gray-900">
        <div class="flex items-center justify-center ">
            <div class="flex items-center">
                <span class="text-2xl font-semibold text-gray-800 dark:text-white">Notes</span>
            </div>
        </div>

        <nav class="flex flex-col px-4 mt-10 text-center">
            <ul>
                @foreach($notes as $note)
                    <li>{{ $note->title }}<li>
                @endforeach
            </ul>
        </nav>

        <x-toggle-switch value="{{ 'Hello' }}">
            AA
        </x-toggle-switch>

    </div>

    <!-- the items i want to put in a 3 grid layout !-->
    <div class="flex flex-col w-full h-full m-0">
        <div class="p-2">
            <h2>Hello!</h2>
        </div>

        <div id="editor">
            <p>Hello World!</p>
            <p>Some initial <strong>bold</strong> text</p>
            <p><br></p>
        </div>
    </div>
</div>


<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>

<script>

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
    });
</script>
