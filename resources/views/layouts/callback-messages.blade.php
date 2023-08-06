@if(session('success'))
    <script type="text/javascript">
        Swal.fire({
            icon:'success',
            title:"Operación exitosa",
            text:"{{session('success')}}"
        });
    </script>
    @endif
        
    @if(session('error'))
        <script type="text/javascript">
            Swal.fire({
                icon:'error',
                title:"Ha ocurrido un problema",
                text:"{{session('error')}}"
            });
        </script>
    @endif