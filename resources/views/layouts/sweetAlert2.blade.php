{{-- SweetAlert2s --}}
@if (\Session::has('success'))
  <script type="text/javascript">
    let timerInterval
    Swal.fire({
      icon: 'success',
      title: '¡Todo salió bien',
      text: '{{ \Session::get('success') }}',
      timer: 4000,
      timerProgressBar: true,
    })
  </script>
@endif
@if (\Session::has('error'))
  <script type="text/javascript">
    let timerInterval
    Swal.fire({
      icon: 'error',
      title: 'Tenemos un problema...',
      text: '{{ \Session::get('error') }}',
      timer: 4000,
      timerProgressBar: true,
    })
  </script>
@endif
@if (\Session::has('info'))
  <script type="text/javascript">
    let timerInterval
    Swal.fire({
      icon: 'info',
      title: 'Información...',
      text: '{{ \Session::get('info') }}',
      timer: 4000,
      timerProgressBar: true,
    })
  </script>
@endif
@if (\Session::has('warning'))
  <script type="text/javascript">
    let timerInterval
    Swal.fire({
      icon: 'warning',
      title: 'Advertencia...',
      text: '{{ \Session::get('warning') }}',
      timer: 4000,
      timerProgressBar: true,
    })
  </script>
@endif
@if ($errors->any())
  <script type="text/javascript">
    let timerInterval
    Swal.fire({
      icon: 'error',
      title: 'Tenemos un problema...',
      text: '@foreach ($errors->all() as $error){{ $error }}<br>@endforeach',
      timer: 4000,
      timerProgressBar: true,
    })
  </script>
@endif
@if (\Session::has('api-token'))
  <script type="text/javascript">
    Swal.fire({
      icon: 'success',
      title: '¡Todo salió bien',
      text: '{{ \Session::get('api-token') }}',
    })
  </script>
@endif
