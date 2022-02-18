<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Questions') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- <h2><a href="./addquestion" :active="request()->routeIs('/addquestion/'" >Add New Question</a></h2></br> -->
                    <h1>All {{$sub}} Question list</h1>
                    <!-- <x-nav-link :href="route('admin.userlist')" :active="request()->routeIs('admin.userlist')">
                        {{ __('User List') }}
                    </x-nav-link> -->
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <!-- <td class="p-6">Question</td> -->
                                <!-- <td class="p-6">Time</td> -->
                            </tr>
                            
                            @foreach($data as $i)
                            <tr>
                                <td class="p-6 label-font">{{$i->question}}</td>
                                <!-- <td class="p-6">{{$i->time}}</td> -->
                                <form>
                                    <input type="hidden" value="{{$i->time}}" id="timer" name="timer"/>
                                </form>
                                <script>
                                    let x = document.getElementById('timer').value;
                                    // console.log(x);
                                </script>
                                    
                            </tr>
                          
                            @endforeach

                        </table>
                        <a href="../../userquestions/{{$i->subject}}/{{$next_id}}" id="next_btn" style="display: block"> Skip Question</a>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="timer_display"></div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
var interval;

$( document ).ready(function() {
    clearInterval(interval);
    var coutdown = 1 * x, $timer = $('.timer'); 
    $timer.text(coutdown);
    interval = setInterval(function () {
        $timer.text(--coutdown);
        // console.log(coutdown);  
        var timer = document.getElementById("timer_display");
        timer.innerHTML = "The next question will appear in " + coutdown + " seconds.";;

        if (coutdown === 0) {
            var click_btn = document.getElementById('next_btn');
            click_btn.click();
        }

    }, 1000);
});

</script>
