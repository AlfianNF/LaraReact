<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @viteReactRefresh
    @vite('resources/js/app.js')
</head>
<body>
    <h2>Selamat datang di Form Pendaftaran Istri</h2>
<p>Hey Bung!!! Bukankah ini istriku???</p>

<div class="container">
    <div class="root"></div>
    
    <form action="/" id="myForm" method="POST">
        @csrf
        <center>
            <img src="img/megumi.jpg" alt="Megumi" class="m-2 p-2 w-50 h-50">
        </center>
        
        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="waifu" class="form-label">Nama Istri:</label>
            <input type="text" name="waifu" id="waifu" class="form-control">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat:</label>
            <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

{{-- @push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting right away
        
        swal({
            title: "Are you sure?",
            text: "Do you want to submit the form?",
            icon: "warning",
            buttons: true,
            successMode: true,
        })
        .then((willSubmit) => {
            if (willSubmit) {
                swal("Form submitted!", {
                    icon: "success",
                }).then(() => {
                    document.getElementById('myForm').submit(); // Submit the form if confirmed
                });
            } else {
                swal("Form submission canceled!", {
                    icon: "error",
                });
            }
        });
    });
</script>
@endpush --}}

</body>
</html>

