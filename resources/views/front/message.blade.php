<style>
    .chat-popup-btn {
        background: #6b6b6b;
        position: fixed;
        right: 20px;
        bottom: 20px;
        padding: 12px 24px;
        border-radius: 12px;
        cursor: pointer;
        color: white;
    }

    .chat-popup-btn a {
        font-family: "Quicksand Light Oblique", serif;
        font-size: 22px;
        letter-spacing: 1px;
        text-transform: capitalize;
        text-decoration: none;
        color: white;
    }

    .chat-popup-btn:hover {
        padding: 14px 26px;
        right: 19px;
        bottom: 19px;
    }

    .chat-popup {
        background-color: #dddddd;
        border:1px solid gray;
        width: 300px;
        @guest
        height: 475px;
        @endguest
        @auth
        height: 400px;
        @endauth
        position: fixed;
        display: none;
        border-radius: 16px;
        z-index: 2000;
        right: 10px;
        bottom: 10px;
        padding: 10px;
    }

    .chat-form {
        margin: 2%;
        position: relative;
    }

    .chat-form h1 {
        padding: 0;
        font-size: 28px;
        color: black;
        font-family: "Quicksand Light", serif;
        font-weight: 600;
    }

    .chat-form .close-form {
        position: absolute;
        right: 5px;
        top: 0px;
        color: rgba(0, 0, 0, .7);
        font-weight: 900;
        display: block;
        cursor: pointer;
        /*border: 1px solid rgba(0, 0, 0, .7);*/
        padding: 0 5px;
        margin: 0;
        border-radius: 10px;
    }

    .chat-form .close-form:hover {
        color: rgba(0, 0, 0, 1);
        border-color: rgba(0, 0, 0, 1);
    }

    .chat-form input, .chat-form textarea {
        width: 100%;
        padding-left: 10px;
        border-radius: 5px;
        border-color: lightgrey;
    }

    .chat-form input:focus, .chat-form textarea:focus {
        outline: none;
        border-color: grey;
    }

    .chat-send-btn {
        width: 96%;
        margin:2%;
        border-radius: 10px;
        outline: none;
        border: none;
        background-color: #18cd18;
        opacity: 1;
        color: white;
    }

    .chat-send-btn:hover {
        opacity: 1;
        outline: none;
        background-color: transparent;
        border: 2px solid #18cd18;
        color: black;
    }

    .chat-popup button {
        height: 35px;
    }
</style>

<div class="chat-popup-btn" onclick="openChat()">
    <a>let's chat</a>
</div>
<div class="chat-popup" id="chat">
    <form action="{{route('message')}}" method="post">
        @csrf
        <div class="chat-form">
            <h1>Chat Form</h1>
            <h1 class="close-form" onclick="closeChat()">x</h1>

            @auth
                <h4 style="margin-top: 30px; text-align: center">Hi {{Auth::user()->name}}</h4>
            @endauth
            @guest
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="email" required>
                </div>
            @endguest
            @auth
                <div style="display: none">
                    <input type="text" name="name" value="{{Auth::user()->name}}" >
                    <input type="email" name="email" value="{{Auth::user()->email}}">
                </div>
            @endauth
            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" placeholder="subject">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea style="resize: none" name="message" placeholder="your message"></textarea>
            </div>
        </div>
        <button type="submit" class="chat-send-btn">Send</button>
    </form>
</div>

<script>
    function openChat() {
        document.getElementById("chat").style.display = "block";
    }

    function closeChat() {
        document.getElementById("chat").style.display = "none";
    }
</script>
