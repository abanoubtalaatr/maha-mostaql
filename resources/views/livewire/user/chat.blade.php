<div class="container-fluid current-msg mt-5">
    <style>
        .messages-container {
            overflow: hidden;
            padding: 10px;
            overflow-y: scroll;
            max-height: 350px;
            min-height: 350px;
        }

        .custom-file-upload {
            display: block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #e9ecef;
            color: #333;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .custom-file-upload i {
            margin-right: 5px;
        }

        #progressBar {
            width: 100%;
            height: 10px;
            background-color: #f1f1f1;
        }

        #progressBar div {
            height: 100%;
            background-color: #4caf50;
        }

        @keyframes heartbeat {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .recording {
            animation: heartbeat 1s infinite;
            color: red;
            /* Apply the heartbeat animation */
        }
    </style>
    <div class="text-right">
        <h4 class="card-title">الرسائل</h4>
    </div>
    <div class="row row-cols-1 row-cols-md-2 text-right">
        <div class="col-md-4 mb-4">
            <div class="card descripe-project-msg my-1">
                @foreach ($users as $user)
                    <div class="card-body cursor-pointer" style="cursor: pointer"
                        wire:click="setReceiver({{ $user->id }})">
                        @if ($user->avatar)
                            <img height="40" width="40" class="rounded-circle"
                                src="{{ asset('uploads/pics/' . $user->avatar) }}" alt="">
                        @else
                            <img height="40" width="40" class="rounded-circle"
                                src="{{ asset('website/assets/images/Avatar wrap.png') }}" alt="">
                        @endif
                        <h5 class="card-title d-inline-block">{{ $user->first_name . ' ' . $user->last_name }}</h5>

                        <span class="text-white d-block">{{ \App\Models\Chat::unRead($user->id, auth()->id()) }}</span>
                        {{--                        @if ($user->isOnline()) --}}
                        {{--                            <div class="online-user"></div> --}}
                        {{--                        @else --}}
                        {{--                            <div class="offline-user"></div> --}}
                        {{--                        @endif --}}
                    </div>

                    <hr style="margin: 1px">
                @endforeach
            </div>

            {{--            <button type="button" class="btn extra-purple" data-toggle="modal" data-target="#exampleModal"> --}}
            {{--                تسليم الصفقه --}}
            {{--            </button> --}}
        </div>


        <div class="col-md-8 mb-4">
            @if (count($messages) > 0 && $receiver)
                <div class="card available-msg border my-3">
                    @foreach ($messages as $message)
                        @if ($message['sender_id'] != auth()->id())
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        @if ($message['sender']['avatar'])
                                            <img height="50" width="50" class="rounded-circle"
                                                src="{{ asset('uploads/pics/' . $message['sender']['avatar']) }}"
                                                alt="">
                                        @else
                                            <img height="50" width="50" class="rounded-circle"
                                                src="{{ asset('website/assets/images/Avatar wrap.png') }}"
                                                alt="">
                                        @endif

                                        <strong>{{ $message['sender']['first_name'] . ' ' . $message['sender']['last_name'] }}</strong>
                                    </div>
                                </div>
                                <!-- Customer message -->
                                <p class="card-text mt-2">{{ $message['message'] }}</p>
                                @if (isset($message['file']) && !empty($message['file']))
                                    @foreach (explode('|', $message['file']) as $filePath)
                                        <i class="fas fa-file"></i>
                                        <a target="_blank" href="{{ url('uploads/pics/' . $filePath) }}">ملف</a>
                                    @endforeach
                                @endif
                        @if (isset($message['audio']))
                            <audio controls>
                                <source src="{{ url('uploads/pics/' . $message['audio']) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        @endif
                </div>
                <hr>
            @else
                {{-- sender --}}
                <div class="card-body ">
                    <div class="d-flex justify-content-between">
                        <div>
                            @if ($message['sender']['avatar'])
                                <img height="50" width="50" class="rounded-circle"
                                    src="{{ asset('uploads/pics/' . $message['sender']['avatar']) }}" alt="">
                            @else
                                <img height="50" width="50" class="rounded-circle"
                                    src="{{ asset('website/assets/images/Avatar wrap.png') }}" alt="">
                            @endif
                            <strong>{{ $message['sender']['first_name'] . ' ' . $message['sender']['last_name'] }}</strong>
                        </div>
                    </div>
                    <!-- freelancer resbonse -->
                    <p class="card-text mt-2">{{ $message['message'] }}</p>
                    <div>
                    @if (isset($message['file']) && !empty($message['file']))
                        @foreach (explode('|', $message['file']) as $filePath)
                            <i class="fas fa-file"></i>
                            <a target="_blank" href="{{ url('uploads/pics/' . $filePath) }}">ملف</a>
                        @endforeach
                    @endif
                    </div>
                    @if (isset($message['audio']))
                        <audio controls>
                            <source src="{{ url('uploads/pics/' . $message['audio']) }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    @endif
                </div>
                <hr>
            @endif
            @endforeach
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="send">
                    <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-2">

                        <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                            <label for="">رسالتك</label>
                            <textarea wire:model.defer="message" class="form-control text-right" id="" rows="3"></textarea>
                            @error('message')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            @error('receiver')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                            <label for="">اضافه ملفات</label>
                            <input type="file" wire:model="files" multiple>
                            @error('file')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if ($files)
                        <p class="text-danger">تم رفع الملف </p>
                    @endif

                    <div wire:loading wire:target="file"> <i class="fas fa-spinner fa-spin"></i> </div>
                    <div class="d-flex gap-2">
                        <i id="recordButton" class="fa fa-microphone" style="line-height: 4; cursor: pointer"
                            title="سجل"></i>
                        <i id="stopButton" disabled class="fa fa-stop" style="line-height: 4; cursor: pointer"
                            title="ايقاف"></i>


                        <audio id="audioPlayback" controls class="hidden"></audio>
                        <i id="deleteButton" class="fa fa-trash" style="line-height: 4; cursor: pointer"></i>
                    </div>
                    <button type="submit" class="btn btn-primary">ارسال الان</button>
                </form>
                <ul class="alert-warning p-2 rounded mt-3">
                    <li class="mb-1">
                        حتى تحافظ على حقوقك الماليه والفنيه لاتتواصل خارج نطاق المنصة.
                    </li>
                    <li class="mb-1">
                        طلبك للتواصل او كتابة ارقام تواصل او اي وسيلة اخرى يعرض عضويتك للحظر الكلي دون ابداء
                        الاسباب.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    document.addEventListener('livewire-upload-progress', event => {
        @this.progress = Math.floor(event.detail.progress);
    });
</script>

<script>
    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true
    });


    var channel = pusher.subscribe('chat');
    channel.bind('message', function(data) {
        Livewire.emit('messageReceived', data);
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script>
    $(document).ready(function() {
        let audioStream;
        let recorder;
        let recordedAudio;

        const recordButton = $("#recordButton");
        const stopButton = $("#stopButton");
        const sendButton = $("#sendButton");
        const audioPlayback = $("#audioPlayback");
        const deleteButton = $("#deleteButton");

        recordButton.on("click", function() {
            recordButton.addClass('recording');

            recordButton.prop("disabled", true);
            stopButton.prop("disabled", false);

            navigator.mediaDevices.getUserMedia({
                    audio: true
                })
                .then(function(stream) {
                    audioStream = stream;
                    const audioContext = new AudioContext();
                    const input = audioContext.createMediaStreamSource(stream);
                    recorder = new Recorder(input, {
                        numChannels: 1
                    });
                    recorder.record();
                })
                .catch(function(err) {
                    console.error("Error accessing microphone:", err);
                });
        });

        stopButton.on("click", function() {
            recordButton.removeClass('recording');

            recordButton.prop("disabled", false);
            stopButton.prop("disabled", true);

            recorder.stop();
            audioStream.getAudioTracks()[0].stop();

            recorder.exportWAV(function(blob) {
                recordedAudio = blob;
                @this.upload('audio', blob)

                audioPlayback.attr("src", URL.createObjectURL(blob));
            });
        });

        deleteButton.on("click", function() {
            recordButton.removeClass('recording');

            recordedAudio = null;
            audioPlayback.attr("src", "");
            deleteButton.prop("disabled", true);
        });
        document.addEventListener('deleteRecord', function() {
            // Invoke the JavaScript function when the event is triggered
            recordedAudio = null;
            recordButton.removeClass('recording');

            audioPlayback.attr("src", "");
            deleteButton.prop("disabled", true);
        });
    });
</script>
</div>
