<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Himpunan Mahasiswa</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        'primary-light': '#a5b4fc',
                        'primary-dark': '#4f46e5',
                        secondary: '#06b6d4',
                        accent: '#8b5cf6'
                    }
                }
            }
        }
    </script>
    <style>
        .modal {
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        .modal-content {
            transition: transform 0.3s ease-in-out;
        }

        .modal.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .modal.hidden .modal-content {
            transform: scale(0.9) translateY(-20px);
        }
    </style>
</head>

<body class="bg-gray-50">
    @include('layouts.guest-navigation')
    <main>{{ $slot }}</main>
    
@php
    $excludedRoutes = ['daftar.create', 'login'];
@endphp

@if (!in_array(Route::currentRouteName(), $excludedRoutes))
    @include('layouts.guest-footer')
@endif


   
    <script>
        // Get modal elements
        const modal = document.getElementById('activityModal');
        const closeModal = document.getElementById('closeModal');
        const closeModalFooter = document.getElementById('closeModalFooter');
        const detailButtons = document.querySelectorAll('.detail-btn');

        // Modal content elements
        const modalTitle = document.getElementById('modalTitle');
        const modalImage = document.getElementById('modalImage');
        const modalDate = document.getElementById('modalDate');
        const modalDescription = document.getElementById('modalDescription');

        // Open modal function
        function openModal(data) {
            modalTitle.textContent = data.name;
            modalImage.src = data.image;
            modalImage.alt = data.name;
            modalDate.textContent = data.date;
            modalDescription.textContent = data.description;

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        // Close modal function
        function closeModalFunction() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Restore scrolling
        }

        // Add event listeners to detail buttons
        detailButtons.forEach(button => {
            button.addEventListener('click', function() {
                const data = {
                    id: this.dataset.activityId,
                    name: this.dataset.activityName,
                    date: this.dataset.activityDate,
                    description: this.dataset.activityDescription,
                    image: this.dataset.activityImage
                };
                openModal(data);
            });
        });

        // Close modal event listeners
        closeModal.addEventListener('click', closeModalFunction);
        closeModalFooter.addEventListener('click', closeModalFunction);

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModalFunction();
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModalFunction();
            }
        });
    </script>
</body>

</html>
