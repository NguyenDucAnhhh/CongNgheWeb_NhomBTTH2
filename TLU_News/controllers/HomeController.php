<?php
    
    class HomeController{
        function showListNew(){
            // yeu cau data tu db
            // hien thi len cho ng xem
            // yeu cau: hien thi ds tin tuc. tuc la chi can category, title. het

            require 'models/CategoryService.php';
            $newcategoryser = new CategorieService;
            $list_categories = $newcategoryser->getAllCategory();

            require 'models/NewsService.php';
            $newser = new NewsService;
            $list_news = $newser->getAllNews();

            require 'views/home/index.php'; // goi den views
        }
    }

?>
<!--Timkiem-->
<?php
$tukhoa = $_GET['search'];
$tintheoloai = TimKiem($conn,$tukhoa);
while($row_tintheoloai = mysqli_fetch_array($tintheoloai)){
    ?>
<?php } ?>
