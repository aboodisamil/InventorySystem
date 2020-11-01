@if(session()->has('success'))

    <script>
             Swal.fire({
           position: 'center',
           type: 'success',
           title: '{{ session()->get('success') }}',
           showConfirmButton: false,
           timer: 1500
         })
    </script>

@endif


