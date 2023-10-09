<link rel="stylesheet" type="text/css" href="../resource/css/slider.css">
<link rel="stylesheet" type="text/css" href="../resource/css/style.css">

<style>
    .controls ion-icon {
        color: #fff !important;
        box-shadow: 1px 1px #000;
    }

</style>

<section style="background-color:#222 !important;">


    <div class="slider-container">
        <div class="carousel">
            <div class="slider">
                <!-- =================================  SLIDING SEC 1 ========= -->

                <div class="rowss">
                    <?php
                    $result = mysqli_query($db,"SELECT * FROM `products` LIMIT 0,20");
                    while($row = mysqli_fetch_assoc($result)){ 
                        
                    echo "<div class='clou col-width-5'>
                    <form method='post' action=''>
                        <div class='card'>
                            <input type='hidden' name='code' value=".$row['code']." />
                            <div class='imgFrame'><img src='../DB/games/".$row['image']."'></div>
                            <div class='card-details'>
                                <h4>".$row['name']."</h4>
                                <div class='price'>Rs.".$row['price']."</div>
                                 <button type='submit' class='btn btn_HIGH' name='add'>ADD TO CART</button>
                                 </form>
                            </div>

                        </div>
                      </div> ";
                    }
                    
                    if(isset($_POST['add']))
                    {
                        if (!isLoggedIn()) {
                            $_SESSION['msg'] = "You must log in first";
                            header('location: ../pages/login.php');
                            exit();
                        }
                    }
                    ?>
                </div>
                <!--rowss-->
            </div>
            <!--slider-->
            <!-- =================================  CONTROLS ========= -->
            <div class="controls">
                <span class="arrow left">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </span>
                <span class="arrow right">
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                </span>
            </div>
        </div>
        <!--carasoule-->
    </div>
</section>


<script>
    < script src = "https://unpkg.com/ionicons@5.4.0/dist/ionicons.js" >

</script>
<script>
    const slider = document.querySelector('.slider');
    const leftarrow = document.querySelector('.left');
    const rightarrow = document.querySelector('.right');


    var sectionIndex = 0;

    leftarrow.addEventListener('click', function() {
        sectionIndex = (sectionIndex > 0) ? sectionIndex - 1 : 0
        slider.style.transform = 'translate(' + (sectionIndex) * -25 + '%)';
    });

    rightarrow.addEventListener('click', function() {
        sectionIndex = (sectionIndex < 3) ? sectionIndex + 1 : 3
        slider.style.transform = 'translate(' + (sectionIndex) * -25 + '%)';
    });

</script>
