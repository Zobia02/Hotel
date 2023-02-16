 <!-- Bootstrap 5 JS CDN Links -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        


<script> 
    function alert(type,msg){
        let bs_class = (type == "success") ? "alert-success" : "alert-danger";
        let element = document.createElement(div);
        element.innerHTML = 
            <div class="alert {bs_class} alert-warning alert-dismissible fade show custom-alert" role="alert">
                <strong class="me-3">{msg}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ;

    document.body.append(element);
    }
</script>