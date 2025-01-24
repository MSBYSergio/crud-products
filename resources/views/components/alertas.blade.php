@props(['for'])
@if(session($for))
<script>
    Swal.fire({
        title: "{{session($for)}}",
        icon: "success"
    });
</script>
@endif