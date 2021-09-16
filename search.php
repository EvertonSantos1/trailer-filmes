<?php 
    include('banco.php');
    

    $query = filter_input(INPUT_GET , 'query',FILTER_SANITIZE_STRIPPED ) ;

    $banco = new BANCO ; 

    $banco->conecta('localhost','root','','filmes');

   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<title>Trailer | ${query}</title>"; ?>
    <style>

        body {
            display : flex ; 
            flex-direction: column ;
            align-items: center ;
            margin-bottom:20px;
            background-color: gray;
           
            
        }
        img {
            height:600px;
            width:600px;
            margin-bottom: 20px;
        }
        h1 {
            font-family: sans-serif;
            letter-spacing: 5px;
        }
        video {
            border-radius: 20px;
            background-color: blue;
           
        }
        @media only screen and (max-width:360px) {
            img {
                height:200px;
                width:200px;
            }
            body {
                text-align: center ;
                font-size: 17px;
            }
            video {
                height:200px;
            }
        }
        @media (max-width:600px){
            body {
                display: flex;
            }
            img {
                height:200px;
                width:calc(100% / 2);
            }
            video {
                width:calc(100% - 100px);
            }
        }

    </style>
</head>
<body>


<?php  

    $atack = array(
        '-','top','select',',','and','or','--'
    ) ;
    
    $banco->loadPages($query);

?>

    
    
    
</body>
</html>