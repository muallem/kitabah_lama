<style>
    .chat-box {
      position: relative;
      border: 1px solid #ccc;
      padding: 10px;
      height: 300px;
      overflow-y: scroll;
    }
  
    .message {
    margin: auto;
      margin-bottom: 10px;
      padding: 5px;
      border-radius: 5px;
      max-width: 90%;
    }
  
    .message.friend {
      background-color: #f2f2f2;
      /* align-self: flex; */
    }
  
    .message.owner {
      background-color: #d4edda;
      /* align-self: flex-start; */
      /* margin-left: auto; Add this line */
    }
  
    .chat-messages {
      overflow-y: auto;
      max-height: 100%;
    }
  
    .chat-input {
      position: absolute;
      bottom: 10px;
      left: 0;
      right: 0;
    }
  </style>
  

  <div class="container mt-4">
    <div class="row">
        <div class="mx-auto col-md-10 offset-md-3">
            <div class="chat-box">
            <div class="chat-messages pb-5" id="chatMessages">
                <!-- Friend's chat messages -->
                <div class="message friend">
                <div class="message-content">
                    Friend: Hello!
                </div>
                </div>

                <!-- Me's chat messages -->
                <div class="message owner">
                <div class="message-content">
                    Me: Hi there!
                </div>
                </div>
                <!-- Friend's chat messages -->
                <div class="message friend">
                <div class="message-content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Error minus delectus odio sed fuga nihil autem laudantium aspernatur? Iure delectus enim perferendis consequatur doloribus non neque. Labore, facere expedita. Tempora, sunt. Tempore soluta assumenda sapiente mollitia fuga voluptatem dolore ullam.
                </div>
                </div>

                <!-- Me's chat messages -->
                <div class="message owner">
                <div class="message-content">
                    Me: Hi there!
                </div>
                </div>
                <!-- Friend's chat messages -->
                <div class="message friend">
                <div class="message-content">
                    Friend: Hello!
                </div>
                </div>

                <!-- Me's chat messages -->
                <div class="message owner">
                <div class="message-content">
                    Me: Hi there!
                </div>
                </div>
                <!-- Friend's chat messages -->
                <div class="message friend">
                <div class="message-content">
                    Friend: Hello!
                </div>
                </div>

                <!-- Me's chat messages -->
                <div class="message owner">
                <div class="message-content">
                    Me: Hi there!
                </div>
                </div>
                <!-- Friend's chat messages -->
                <div class="message friend">
                <div class="message-content">
                    Friend: Hello!
                </div>
                </div>

                <!-- Me's chat messages -->
                <div class="message owner">
                <div class="message-content">
                    Me: Hi there!
                </div>
                </div>
                <!-- Friend's chat messages -->
                <div class="message friend">
                <div class="message-content">
                    Friend: Hello!
                </div>
                </div>

                <!-- Me's chat messages -->
                <div class="message owner">
                <div class="message-content">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio voluptatibus assumenda natus pariatur earum? Rerum laboriosam, omnis sed dolorem obcaecati ab unde officia quibusdam perferendis!
                </div>
                </div>

                <!-- Add more chat messages as needed -->

            </div>

            <!-- Chat input form -->
            <form class="chat-input px-3">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Type your message">
                <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
{{-- <div wire:ignore.self class="modal fade" id="discussModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Diskusi</h5>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="chat-box">
                        <div class="chat-messages pb-5" id="chatMessages">
                            <!-- Friend's chat messages -->
                            <div class="message friend">
                            <div class="message-content">
                                Friend: Hello!
                            </div>
                            </div>
                
                            <!-- Me's chat messages -->
                            <div class="message owner">
                            <div class="message-content">
                                Me: Hi there!
                            </div>
                            </div>
                            <!-- Friend's chat messages -->
                            <div class="message friend">
                            <div class="message-content">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error minus delectus odio sed fuga nihil autem laudantium aspernatur? Iure delectus enim perferendis consequatur doloribus non neque. Labore, facere expedita. Tempora, sunt. Tempore soluta assumenda sapiente mollitia fuga voluptatem dolore ullam.
                            </div>
                            </div>
                
                            <!-- Me's chat messages -->
                            <div class="message owner">
                            <div class="message-content">
                                Me: Hi there!
                            </div>
                            </div>
                            <!-- Friend's chat messages -->
                            <div class="message friend">
                            <div class="message-content">
                                Friend: Hello!
                            </div>
                            </div>
                
                            <!-- Me's chat messages -->
                            <div class="message owner">
                            <div class="message-content">
                                Me: Hi there!
                            </div>
                            </div>
                            <!-- Friend's chat messages -->
                            <div class="message friend">
                            <div class="message-content">
                                Friend: Hello!
                            </div>
                            </div>
                
                            <!-- Me's chat messages -->
                            <div class="message owner">
                            <div class="message-content">
                                Me: Hi there!
                            </div>
                            </div>
                            <!-- Friend's chat messages -->
                            <div class="message friend">
                            <div class="message-content">
                                Friend: Hello!
                            </div>
                            </div>
                
                            <!-- Me's chat messages -->
                            <div class="message owner">
                            <div class="message-content">
                                Me: Hi there!
                            </div>
                            </div>
                            <!-- Friend's chat messages -->
                            <div class="message friend">
                            <div class="message-content">
                                Friend: Hello!
                            </div>
                            </div>
                
                            <!-- Me's chat messages -->
                            <div class="message owner">
                            <div class="message-content">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio voluptatibus assumenda natus pariatur earum? Rerum laboriosam, omnis sed dolorem obcaecati ab unde officia quibusdam perferendis!
                            </div>
                            </div>
                
                            <!-- Add more chat messages as needed -->
                
                        </div>
                
                        <!-- Chat input form -->
                        <form class="chat-input px-3">
                            <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type your message">
                            <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}

@push('js')
    <script>
        $("#detailModal").on('hide.bs.modal', function() {
            @this.call('resetInput');
        });
        // JavaScript code to scroll to the last message
        var chatMessages = document.getElementById('chatMessages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
  </script>
@endpush