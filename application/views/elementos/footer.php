    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white "> <?php
            if (isset($this->session->id)){
                echo "Última conexión: ";
            echo $this->input->cookie('login');
            }else{
                echo "E-TICKETS";
            }

            ?></p>
          
        </div>
    </footer>