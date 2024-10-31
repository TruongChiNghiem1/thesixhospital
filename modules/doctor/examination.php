
    <div class="container mt-4">
        <h2 class="text-center mb-4">KHÁM BỆNH </h2>
        <div class="video-container mb-3">
            <video id="remote-video" autoplay></video>
            <video id="local-video" autoplay muted></video>
            <div class="control-panel">
                <button class="btn btn-light" id="mute-btn" title="Tắt/Bật mic">
                    <i class="bi bi-mic-mute-fill"></i>
                </button>
                <button class="btn btn-light" id="camera-btn" title="Tắt/Bật camera">
                    <i class="bi bi-camera-video-off-fill"></i>
                </button>
                <button class="btn btn-danger" id="end-call-btn" title="Kết thúc cuộc gọi">
                    <i class="bi bi-telephone-fill"></i>
                </button>
            </div>
        </div>
    </div>



    <script>
        document.getElementById("mute-btn").addEventListener("click", function() {
            const icon = this.querySelector("i");
            icon.classList.toggle("bi-mic-mute-fill");
            icon.classList.toggle("bi-mic-fill");
            console.log("Mic toggled");
        });

        document.getElementById("camera-btn").addEventListener("click", function() {
            const icon = this.querySelector("i");
            icon.classList.toggle("bi-camera-video-off-fill");
            icon.classList.toggle("bi-camera-video-fill");
            console.log("Camera toggled");
        });

        document.getElementById("end-call-btn").addEventListener("click", function() {
            alert("Cuộc gọi đã kết thúc");
        });
    </script>
