<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid w-100 p-5" style="height:100vh;">
        <div class="d-flex  mx-auto flex-column align-items-centre shadow p-4 rounded" style="max-width:850px;">
        <!--form start-->
            <form action="" method="get" class="w-100">
                <div class="row">
                    <div class="col">
                        <input type="search" class="form-control" name="search" placeholder="Search..." value="<?php if(isset($_GET['search'])) : echo $_GET['search']; endif;?>" >

                    </div> 
    
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Replace..."  name="replace" value="<?php if(isset($_GET['replace'])) : echo $_GET['replace']; endif;?>" >
                    </div>  
    
                </div>
                <div class="row">
                    <div class="col">
                        <textarea class="form-control mt-3" rows="5" name="article"><?php if(isset($_GET['article'])) {echo $_GET['article'];}?></textarea>
                    </div>
                </div>
                <input class="btn btn-dark form-control mt-3"name="submit" type="submit" value="Search">  
                <button class="btn btn-success form-control mt-3 bg-danger border-0" name="reset" type="reset">Reset</button> 
            </form>
            <!-- form end-->

            <!-- search -->
            <div class="text-center mt-4 fw-bold">
                <?php 
                    if(isset($_GET['submit'])){
                        include('function_art.php');
                        if($_GET['article'] != '' and $_GET['search'] != '' && $_GET['replace'] == ''){
                            echo "Number of wordes in article : <span class='text-danger' fs-1>" . count_article($_GET['article']) . "</span><br>";
                            echo "Number of search : <span class='text-danger' fs-1>" . article_anl($_GET['article'],$_GET['search']) . "</span><br>";
                        
                ?>
            </div>
            
            <div class="w-100 mt-4">
                <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger" style="width: <?php echo percentage($_GET['article'] , $_GET['search']) * count_article($_GET['search']);?>%"><?php echo percentage($_GET['article'] , $_GET['search']) * count_article($_GET['search']);?>%</div>
                </div>
                <div class="bg-light mt-3 p-2">
                    <?php echo mark($_GET['article'],$_GET['search'],"<mark>$_GET[search]</mark>");?>
                </div>
                
                <?php
                    }elseif($_GET['article'] != '' and $_GET['search'] != '' && $_GET['replace'] != ''){
                        echo "Number of wordes in article : <span class='text-danger' fs-1>" . str_word_count(mark($_GET['article'],$_GET['search'],$_GET['replace'])). "</span><br>";
                        echo "Number of search  : <span class='text-danger' fs-1>" . article_anl($_GET['article'],$_GET['search']) . "</span><br>";
                ?>

                <!--progress bar replace-->
                <div class="progress mt-3" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger " style="width: <?php echo percentage(mark($_GET['article'],$_GET['search'],$_GET['replace']) , $_GET['search']) * count_article($_GET['replace']);?>%"><?php echo percentage(mark($_GET['article'],$_GET['search'],$_GET['replace']) , $_GET['search']) * count_article($_GET['replace']);?>%</div>
                </div>
                <div class="bg-light mt-3 p-2 text-start fw-normal">
                    <?php echo mark($_GET['article'],$_GET['search'],"<mark>$_GET[replace]</mark>");?>
                </div>
                <?php
                    }else{
                        echo '<p class="text-danger fs-5 fw-bold mt-3">Entre the Required</p>';
                    }
                }
                ?>
                <!--progress bar replace-->
                <div class="mt-4 w-100 row">
                    <div class="col" style="max-height:300px; overflow:auto;"></div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>