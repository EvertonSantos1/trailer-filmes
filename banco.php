<?php 


     class BANCO {
        private $localhost ; 
        private $username ; 
        private $dbname ; 
        private $password ; 
        private $query ; 
        private $conn ;
        private $sql ;
        private $PDO ; 
        
        public function conecta($localhost , $username , $password , $dbname) {
            
            $this->localhost = $localhost ; 
            $this->username = $username  ; 
            
            $this->dbname = $dbname ; 
            $this->password ; 

            try {
                $this->conn = mysqli_connect($this->localhost , $this->username , $this->password , $this->dbname) ;
            } 
            catch(ErrorException $e){
                echo 'Error no servidor'.$e->getMessage();
            }
            

        }

        public function consulta($name){

            $this->sql = 

            "SELECT * from filmes as F inner join filmes_atributos as FA on FA.id_filme = F.id  where nome_filme like '$name%' 
            ";
            
           try {
            $this->query = mysqli_query($this->conn , $this->sql );

           } catch (ErrorException $e) {
               echo 'Error na Consulta '.$e; 
           }

           while($resultado = mysqli_fetch_array($this->query)){

                echo json_encode($resultado) ;
                

             }
              
        
        }
        public function loadPages($query){


           try {
            $this->sql = "SELECT * FROM filmes_atributos as FA inner join filmes as F on F.id = FA.id_filme where F.nome_filme like '%%%%$query%%%%'" ; 
          

            $this->query = mysqli_query($this->conn , $this->sql) ; 

            if(mysqli_num_rows($this->query) <= 0){
                
                echo "<center><h1>Trailer Não Encontrado</h1></center>";
                echo "<a href='filmes.html'>Voltar ao Inicio da Página";
                
            }
            

           }
           catch(ErrorException $e) {
               echo $e->getMessage();
           }

            while($result = mysqli_fetch_array($this->query)){

                $query = $result['nome_filme']; 
                 echo "
                <div class=\"container-movie\"></div>
                    <h1>${result['nome_filme']}</h1>

                    <img src=${result['src_imagem']} alt=\"${result['nome_filme']}\" title=\"${result['nome_filme']}\">
                     <video  controls src=\"${result['src_video']}\">
                </div>
                ";
                
                
                
                
                

                
            }
           
    
          
        }
    }