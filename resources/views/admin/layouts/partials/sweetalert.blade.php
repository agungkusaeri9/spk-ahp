@if (session('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            text: '{{ session('success') }}',
            showConfirmButton: true,
            timer: 1500
        })
    </script>
@elseif(session('error'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: true,
            timer: 1500
        })
    </script>
@endif
