document.getElementById('spamForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const username = document.getElementById('username').value.trim();
    const messageText = document.getElementById('messageText').value;
    const messageCount = parseInt(document.getElementById('messageCount').value, 10);
    const startButton = document.getElementById('startButton');
    const statusText = document.getElementById('statusText');
    const loaderBar = document.getElementById('loaderBar');

    if (!username || !messageText || !messageCount || messageCount < 1) {
        statusText.textContent = "Mohon isi semua kolom dengan benar.";
        return;
    }

    startButton.disabled = true;
    statusText.textContent = "Memulai pengiriman super cepat...";
    loaderBar.style.width = '0%';

    let sentCount = 0;
    let failedCount = 0;
    const CONCURRENCY_LIMIT = 5; // Kirim 5 pesan secara bersamaan

    // Pesan-pesan yang bisa diganti-ganti, tapi pakai yang kita input.
    const messages = [messageText];

    // Fungsi untuk mengirim satu pesan
    async function sendMessage(message, index) {
        const deviceId = crypto.randomUUID();
        const url = 'https://ngl.link/api/submit';
        
        const headers = {
            'User-Agent': `Mozilla/5.0 (Linux; Android ${Math.floor(Math.random() * 5) + 8}; itel P661N)`,
            'Content-Type': 'application/x-www-form-urlencoded',
            'Origin': 'https://ngl.link',
            'Referer': `https://ngl.link/${username}`,
        };

        const body = `username=${encodeURIComponent(username)}&question=${encodeURIComponent(message)}&deviceId=${encodeURIComponent(deviceId)}`;

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: headers,
                body: body
            });

            if (response.ok) {
                return { success: true, status: response.status };
            } else {
                return { success: false, status: response.status };
            }
        } catch (error) {
            return { success: false, status: 'Error' };
        }
    }

    // Fungsi utama untuk menjalankan spamming
    async function runSpam() {
        const tasks = [];
        let completed = 0;

        while (completed < messageCount) {
            const currentTasks = [];
            for (let i = 0; i < CONCURRENCY_LIMIT && completed < messageCount; i++) {
                // Gunakan pesan yang diinput user
                const message = messages[0]; 
                currentTasks.push(sendMessage(message, completed));
                completed++;
            }

            const results = await Promise.all(currentTasks);

            results.forEach(result => {
                if (result.success) {
                    sentCount++;
                } else {
                    failedCount++;
                }
            });

            statusText.textContent = `⌛Mengirim.. (${sentCount + failedCount}/${messageCount}) Gagal: ${sentCount}, Berhasil: ${failedCount}`;
            loaderBar.style.width = `${((sentCount + failedCount) / messageCount) * 100}%`;

            // Tunggu sebentar sebelum gelombang berikutnya
            if (completed < messageCount) {
                await new Promise(resolve => setTimeout(resolve, 1000));
            }
        }

        startButton.disabled = false;
        statusText.textContent = `Selesai!
        Gagal🥀: ${sentCount}, Berhasil🔥: ${failedCount}`;
        loaderBar.style.width = '100%';
    }

    runSpam();
});
