<x-app-layout>

    <style>
        .container {
            width: 100%;
            max-width: 500px;
            margin: 5px;
        }

        .container h1 {
            color: #000000;
        }

        .section {
            background-color: #ffffff;
            padding: 50px 30px;
            border: 1.5px solid #b2b2b2;
            border-radius: 0.25em;
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.25);
        }

        #my-qr-reader {
            padding: 20px !important;
            border: 1.5px solid #b2b2b2 !important;
            border-radius: 8px;
        }

        #my-qr-reader img[alt="Info icon"] {
            display: none;
        }

        #my-qr-reader img[alt="Camera based scan"] {
            width: 100px !important;
            height: 100px !important;
        }

        button {
            padding: 10px 20px;
            border: 1px solid #b2b2b2;
            outline: none;
            border-radius: 0.25em;
            color: white;
            font-size: 15px;
            cursor: pointer;
            margin-top: 15px;
            margin-bottom: 10px;
            background-color: #008000ad;
            transition: 0.3s background-color;
        }

        button:hover {
            background-color: #008000;
        }

        #html5-qrcode-anchor-scan-type-change {
            text-decoration: none !important;
            color: #1d9bf0;
        }

        video {
            width: 100% !important;
            border: 1px solid #b2b2b2 !important;
            border-radius: 0.25em;
        }

        /* Alert Styles */
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px;
            border-radius: 8px;
            z-index: 9999;
            font-size: 16px;
            color: white;
            opacity: 0.9;
            transition: opacity 1s ease-out;
        }

        .custom-alert.success {
            background-color: #4CAF50;
        }

        .custom-alert.error {
            background-color: #f44336;
        }

    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Flexbox container for side-by-side layout -->
            <div class="flex space-x-4">
                <!-- Liste des participants (à gauche) -->
                <div class="flex-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-4">Liste des participants</h3>

                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">État</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $user->student ? $user->student->name : 'Utilisateur inconnu' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->user_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span id="status-{{ $user->user_id }}">
                                            @if ($user->validated)
                                                <span class="text-green-500">✔️</span>
                                            @else
                                                <span class="text-red-500">❌</span>
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Scanner QR Code (à droite) -->
                <div class="container">
                    <h1>Scan QR Codes</h1>
                    <div class="section">
                        <div id="my-qr-reader">
                        </div>
                    </div>
                </div>
                <script src="https://unpkg.com/html5-qrcode"></script>
            </div>
        </div>
    </div>

    <!-- Success and Error Sounds -->
    <audio id="success-sound" src="{{ asset('assets/success.mp3') }}" preload="auto"></audio>
    <audio id="error-sound" src="{{ asset('assets/error.mp3') }}" preload="auto"></audio>

    <script>
        function domReady(fn) {
            if (
                document.readyState === "complete" ||
                document.readyState === "interactive"
            ) {
                setTimeout(fn, 1000);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        function showAlert(type, message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'custom-alert ' + type;
            alertDiv.innerText = message;
            document.body.appendChild(alertDiv);

            // Play the corresponding sound
            const sound = document.getElementById(type + '-sound');
            sound.play();

            setTimeout(() => {
                alertDiv.style.opacity = '0';
                setTimeout(() => {
                    document.body.removeChild(alertDiv);
                }, 1000);
            }, 1000);
        }

        domReady(function () {

            // If found your QR code
            function onScanSuccess(decodeText, decodeResult) {
                // Send the scanned QR code to the backend
                fetch('{{ route('admin.scan') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ qr_code: decodeText })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the validated status in the table
                        const statusSpan = document.getElementById('status-' + data.user_id);
                        if (statusSpan) {
                            statusSpan.innerHTML = '<span class="text-green-500">✔️</span>';
                        }
                        // Show success alert
                        showAlert('success', "Success: " + data.message);
                    } else {
                        // Show error alert
                        showAlert('error', "Error: " + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('error', "An error occurred while processing the QR code.");
                });
            }

            let htmlscanner = new Html5QrcodeScanner(
                "my-qr-reader",
                { fps: 10, qrbos: 250 }
            );
            htmlscanner.render(onScanSuccess);
        });
    </script>

    </x-app-layout>
