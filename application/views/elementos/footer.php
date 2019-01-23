    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white ">Última conexión: <?php
            if (isset($this->session->id)){
            echo $this->input->cookie('login');
            }else{
                echo "E-TICKETS";
            }

            ?></p>
          
        </div>
    </footer>