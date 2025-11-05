@extends('layouts.master1')


@section('content')
<div class="d-flex justify-content-center mt-4">
    <div class="card shadow-lg rounded-3 overflow-hidden" style="width: 480px; height: 640px; border: none;">
        
        <!-- Header -->
        <div class="chat-header d-flex align-items-center px-3 py-2">
            <div class="icon bg-white text-success d-flex align-items-center justify-content-center me-2 rounded-circle shadow-sm" style="width: 36px; height: 36px; font-size: 18px;">
                🤖
            </div>
            <h6 class="mb-0 fw-bold text-white">ChatBot Kasir</h6>
            <small class="ms-auto text-light fst-italic">Toko Tiga Putra</small>
        </div>

        <!-- Chat body -->
        <div id="chat-box" class="card-body bg-light" style="height: 400px; overflow-y: auto;">
            <div class="chat-bot">Halo, ada yang bisa saya bantu?</div>
        </div>

        <!-- Footer -->
        <div class="card-footer p-2 bg-white">
            <div class="input-group">
                <input id="message" type="text" class="form-control border-0 shadow-sm" placeholder="Tulis pesan...">
                <button id="send-btn" class="btn btn-success shadow-sm px-3">➤</button>
            </div>
        </div>
    </div>
</div>

<style>
    .chat-header {
        background: linear-gradient(135deg, #28a745, #20c997);
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }
    .chat-header h6 {
        font-size: 15px;
        letter-spacing: 0.5px;
    }
</style>


<style>
    /* bubble chat bot */
    .chat-bot {
        background: #f1f1f1;
        padding: 8px 12px;
        border-radius: 12px;
        margin-bottom: 6px;
        max-width: 80%;
        display: block;
        color: #333;
        word-wrap: break-word;
    }

    /* bubble chat user */
    .chat-user {
        background: #D3E1F2FF;
        padding: 8px 12px;
        border-radius: 12px;
        margin-bottom: 6px;
        max-width: 80%;
        margin-left: auto;
        display: block;
        text-align: right;
        color: #000;
        word-wrap: break-word;
    }
</style>

<script>
    document.getElementById('send-btn').addEventListener('click', sendMessage);
    document.getElementById('message').addEventListener('keypress', function(e){
        if(e.key === 'Enter') sendMessage();
    });

    function sendMessage() {
        let input = document.getElementById('message');
        let text = input.value.trim();
        if(text === '') return;

        let chatBox = document.getElementById('chat-box');

        // tampilkan pesan user
        let userMsg = document.createElement('div');
        userMsg.className = "chat-user";
        userMsg.innerText = text;
        chatBox.appendChild(userMsg);
        chatBox.scrollTop = chatBox.scrollHeight;

        // kosongkan input
        input.value = '';

        // efek mengetik...
        let typingMsg = document.createElement('div');
        typingMsg.className = "chat-bot";
        typingMsg.setAttribute("id", "typing");
        typingMsg.innerText = "🤖 Sedang mengetik";
        chatBox.appendChild(typingMsg);
        chatBox.scrollTop = chatBox.scrollHeight;

        // animasi titik-titik ...
        let dots = 0;
        let typingInterval = setInterval(() => {
            dots = (dots + 1) % 4;
            typingMsg.innerText = "🤖 Sedang mengetik" + ".".repeat(dots);
        }, 500);

        // kirim ke server
        fetch("{{ route('kasir.chatBoot.ask') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ question: text })
        })
        .then(res => res.json())
        .then(data => {
            setTimeout(() => {
                clearInterval(typingInterval);
                let typing = document.getElementById('typing');
                if(typing) typing.remove();

                // tampilkan balasan bot
                let botMsg = document.createElement('div');
                botMsg.className = "chat-bot";
                botMsg.innerHTML = data.answer; 
                chatBox.appendChild(botMsg);
                chatBox.scrollTop = chatBox.scrollHeight;
            }, 1500);
        })
        .catch(err => {
            clearInterval(typingInterval);
            let typing = document.getElementById('typing');
            if(typing) typing.remove();

            let errMsg = document.createElement('div');
            errMsg.className = "chat-bot";
            errMsg.innerText = "❌ Error: tidak bisa terhubung ke server.";
            chatBox.appendChild(errMsg);
        });
    }
</script>

@endsection

