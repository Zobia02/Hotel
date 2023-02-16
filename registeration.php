

<script>
    let reg_form = document.getElementById('reg_form');
    reg_form.addEventListener('submit',(e)=>{
        e.preventDefault();
        

        let data = new FormData();

        data.append('name',reg_form.elements['username'].value);
        data.append('email',reg_form.elements['email'].value);
        data.append('password',reg_form.elements['password_1'].value);
        data.append('c_password',reg_form.elements['password_2'].value);
        data.append('register','');
        console.log(data);

        var myModal = document.getElementById('signupmodal')
        var modal = bootstrap.Modal.getInstance(myModal) // Returns a Bootstrap modal instance
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST","login_register.php",true);
        
          
        xhr.onload = function(){

        }
          
        xhr.send(data);
        }


    )
</script>
