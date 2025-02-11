<template>
    <div class="recorder-container">
                                <canvas ref="visualizer" class="visualizer-canvas"></canvas>
                                <div class="button-container">
                                    <button class="record-button start" @click="startRecording"
                                        :disabled="loading">Start
                                        Recording</button>
                                    <button class="record-button stop" @click="stopRecording" :disabled="loading">Stop
                                        Recording</button>
                                </div>

                                <div class="or-container">
                                    <span class="or-text">OR</span>
                                </div>

                                <div class="upload-container">
                                    <label class="upload-label">
                                        Upload Audio
                                        <input type="file" @change="handleFileUpload" accept="audio/*"
                                            :disabled="loading" class="upload-input" />
                                    </label>
                                    <p class="upload-instructions">Upload an audio file (MP3, OGG, WAV, etc.) or record
                                        your voice.
                                    </p>
                                </div>

                                <div v-if="loading" class="spinner-container">
                                    <div class="spinner"></div>
                                    <p class="loading-text">Processing, please wait...</p>
                                </div>
                                <p v-if="transcript" class="transcript-text">Transcript: {{ transcript }}</p>
                                <textarea v-if="transcript" v-model="description" placeholder="Add a description..."
                                    class="description-input"></textarea>
                                <button v-if="transcript" class="calculate-button" @click="sendToCompletion"
                                    :disabled="loading">Calculate</button>
                                <div class="response-text" v-if="response">
                                    <p>Result: </p>
                                    <div v-html="convertMarkdown(response)"></div>
                                </div>

                            </div>
</template>
<script>
export default{
    data(){
        return {
            mediaRecorder: null,
            audioChunks: [],
            transcript: '',
            description: '', // Add description input state
            user_description:"",
            loading: false, // Add loading state

            response: '',
            audioContext: null,
            analyser: null,
            dataArray: null,
            animationFrameId: null,
        }
    },
    methods:{
        convertMarkdown(markdown) {
            // Convert headers
            markdown = markdown.replace(/^# (.+)$/gm, "<h1>$1</h1>");
            markdown = markdown.replace(/^## (.+)$/gm, "<h2>$1</h2>");
            markdown = markdown.replace(/^### (.+)$/gm, "<h3>$1</h3>");

            // Convert bold text
            markdown = markdown.replace(/\*\*(.+?)\*\*/g, "<strong>$1</strong>");

            // Convert italic text
            markdown = markdown.replace(/\*(.+?)\*/g, "<em>$1</em>");

            // Convert links
            markdown = markdown.replace(/\[(.+?)\]\((.+?)\)/g, '<a href="$2">$1</a>');

            // Convert unordered lists
            markdown = markdown.replace(/^- (.+)$/gm, "<li>$1</li>");
            markdown = markdown.replace(/(<li>.*<\/li>)/g, "<ul>$1</ul>");

            // Convert newlines to <br>
            markdown = markdown.replace(/\n/g, "<br>");

            return markdown;
        },
        async startRecording() {
            this.audioChunks = [];
            const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            this.audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const source = this.audioContext.createMediaStreamSource(stream);
            this.analyser = this.audioContext.createAnalyser();
            source.connect(this.analyser);
            this.analyser.fftSize = 256;
            this.dataArray = new Uint8Array(this.analyser.frequencyBinCount);

            this.visualize();

            this.mediaRecorder = new MediaRecorder(stream);
            this.mediaRecorder.ondataavailable = (event) => {
                this.audioChunks.push(event.data);
            };

            this.mediaRecorder.start();
        },

        visualize() {
            const canvas = this.$refs.visualizer;
            const canvasCtx = canvas.getContext('2d');
            canvas.width = canvas.parentElement.clientWidth;
            canvas.height = 100;

            const draw = () => {
                this.analyser.getByteFrequencyData(this.dataArray);

                canvasCtx.fillStyle = 'rgb(34, 139, 34)';
                canvasCtx.fillRect(0, 0, canvas.width, canvas.height);

                const barWidth = (canvas.width / this.dataArray.length) * 2.5;
                let x = 0;

                for (let i = 0; i < this.dataArray.length; i++) {
                    const barHeight = this.dataArray[i];

                    canvasCtx.fillStyle = 'rgb(255, 255, 255)';
                    canvasCtx.fillRect(x, canvas.height - barHeight / 2, barWidth, barHeight / 2);

                    x += barWidth + 1;
                }

                this.animationFrameId = requestAnimationFrame(draw);
            };

            draw();
        },
        async uploadAudio(audioFile) {
            const formData = new FormData();
            formData.append('file', audioFile);
            this.loading = true
            try {
                const sttResponse = await axios.post('/user/api/gpt-transcript', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                this.transcript = sttResponse.data.transcript;




            } catch (error) {
                console.error('Error:', error);
            } finally {
                this.loading = false; // Hide loading indicator
            }
        },
        async handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.loading = true;
                await this.uploadAudio(file);
            }
        },
        async sendToCompletion() {
            if (!this.transcript || !this.description) {
                alert('Please ensure both the transcript and description are filled.');
                return;
            }

            this.loading = true; // Show loading indicator

            try {
                const gptResponse = await axios.post('/user/api/gpt-completion', {
                    transcript: this.transcript,
                    description: this.description
                }, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                this.response = gptResponse.data.response;
            } catch (error) {
                console.error('Error:', error);
            } finally {
                this.loading = false; // Hide loading indicator
            }
        },
        async stopRecording() {
            this.mediaRecorder.stop();
            cancelAnimationFrame(this.animationFrameId);
            this.loading = true; // Show loading indicator

            this.mediaRecorder.onstop = async () => {
                const audioBlob = new Blob(this.audioChunks, { type: 'audio/wav' });
                const audioFile = new File([audioBlob], 'recording.wav');
                await this.uploadAudio(audioFile);
                //
                //   const formData = new FormData();
                //   formData.append('file', audioFile);


            };
        },
    }
}
</script>
