<?php


// user searching products funtion attach to search field

function search_product(){
    global $dbcon;
     if(isset($_GET['search_product_btn'])){
        $user_input= $_GET['search_data']; // get input

$search_product = "SELECT * FROM product  WHERE product_keywords LIKE '%$user_input%' LIMIT 0,9";  // LIMIT 0,9"; tp limit number to 9
$search_product_run = mysqli_query($dbcon, $search_product);

$sum_of_rows=mysqli_num_rows($search_product_run);
if($sum_of_rows < 1){// if not availabe
echo "<h4 class='text-center text-danger'>No result match!<br>
Try to using fewer words or first character only</h4>";
}
else{
while($row=mysqli_fetch_assoc($search_product_run)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$product_keywords=$row['product_keywords'];
$product_price=$row['product_price']; 
$product_image_1=$row['product_image_1'];

$brand_id=$row['brand_id'];
$category_id=$row['category_id'];
echo"<section class='col-md-4 mb-2'>
<div class='card' >
<img src='./admin/product-images/$product_image_1' class='card-img-top img-fluid' alt='...'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text text-success'>Price: $product_price/-</p>
<a href='index.php?add_to_card=$product_id' class='btn btn-success'>Add to cart</a>
<a href='product-detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div> 
</section> ";

}
}
}//else{echo "<h2 class='text-center text-danger'> Out of stock, 
  //  nothing available now</h2>";}
}




@session_start();

$page_title = " Upload product";
// Include the function1.php file
require_once '/xampp/htdocs/36market/private/includes/head/header.php';
require_once '/xampp/htdocs/36market/private/includes/functions/functions1.php';

// Start the session
// Check if the form has been submitted
if (isset($_POST['insert-btn'])) {
    // Check if a product title is provided
    if (!empty(trim($_POST['product_name']))) {
        // Check if at least one image is provided
        if (!empty($_FILES['product_image_1']['name']) || !empty($_POST['product_price']) || !empty($_POST['product_categories'])) {


    // Store field values
    $seller_id = $_POST['seller_id'];
    echo  $seller_id;
    $category_id = $_POST['product_categories'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_tags = $_POST['product_tags'];
    $product_short_description = $_POST['product_short_description'];
    $brand_id = $_POST['product_brand'];
    $product_discount_code = $_POST['product_discount_code'];
    $product_keywords = $_POST['product_keywords'];
    $product_unit = $_POST['product_unit'];
    
    // Accessing images/file names
    $product_image_1 = $_FILES['product_image_1']['name'];
    $product_image_2 = $_FILES['product_image_2']['name'];
    $product_image_3 = $_FILES['product_image_3']['name'];

    // Accessing img temp names
    $temp_image_1 = $_FILES['product_image_1']['tmp_name'];
    $temp_image_2 = $_FILES['product_image_2']['tmp_name'];
    $temp_image_3 = $_FILES['product_image_3']['tmp_name'];

   // database object
   $dbcon = new Database();
  //  $dbcon = $db->getConnection();
    
   
    // Check connection
    if (!$dbcon) {
      die("Connection failed: " );
    }
    
    $sql = "INSERT INTO products (seller_id, category_id, product_name, 
                 product_description, product_price, 
                 product_tags, product_short_description, brand_id, 
                 product_discount_code, product_keywords) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    

    // Bind parameters (optional but recommended for security)
    $result = $dbcon->write_db($sql, [$seller_id, $category_id, $product_name, 
                     $product_description, $product_price, 
                     $product_tags, $product_short_description, $brand_id, 
                     $product_discount_code, $product_keywords]);
    
    // Execute the statement
    if ($result) {
       // Get the last inserted order_id
       $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 1";
       $result = $dbcon->read_db($sql);
       $row = $result->fetch_assoc();
       $productId = $row['product_id'];  // Retrieve the last inserted ID using mysqli_insert_id
       $sellerId = $row['seller_id'];

        // Move uploaded images to the product-images folder
        move_uploaded_file($temp_image_1, "product_images/$product_image_1");
        move_uploaded_file($temp_image_2, "product_images/$product_image_2");
        move_uploaded_file($temp_image_3, "product_images/$product_image_3");

    

        $sql = "INSERT INTO product_images (product_id, image_1, image_2, image_3) 
        VALUES (?, ?, ?, ?)";
        $result = $dbcon->write_db($sql,[$productId, $product_image_1, $product_image_2, $product_image_3]);

        

        // *Update stock table*
        $stockUpdateSql = "INSERT INTO stock(quantity,unit,product_id) VALUES(?,?,?)";
        $dbcon->write_db($stockUpdateSql, [$product_quantity, $product_unit, $productId]);

        if ($result) {

      echo "Product inserted successfully! Last inserted ID: " . $productId;
         }
        } else {
            echo "Error: " . $sql . "<br>";
            }
        
    // Close the statement and connection


    
        }
    }
}
///HTML AND FORM BELOW
     ?>

    <section class="container mt-3">
        <h1 class="text-center bg-success">Add products</h1>
        <!--       product title-->
        <section class="text-center mt-3" id='dasboard return '>
        <a href='index.php?view_products'><button class="text-center
   btn btn-success">Return dashboard</button></a>
        </section>
 
                <!-- Body content -->
    <?php if (!empty($success_message)) : ?>
        <div class="success-message">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>




    <?php // fetch seller details
                     $db = new Database();
                     $sql = "SELECT * FROM seller_profiles"; // Prepared statement
                     
                     $result = $db->read_db($sql);
                    
                
                    ?>
 <div class="container addProductBg">
         <!-- Body content -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

           
                  <!--      Brands-->
        
    
            <section class="form-outline mb-4 w-50 m-auto">
                <select for="seller_email" class="form-label" name="seller_id">
                <option value=''>Select Seller Email</option>
               <?php
               // fetch seller details
               $db = new Database();
               $sql = "SELECT * FROM seller_profiles"; // Prepared statement
               
               $result = $db->read_db($sql);
               if ( $result) {
                     foreach($result as $row){
                     $email      =   $row['Email'];
                     $seller_id  =   $row['seller_id'];
                     echo" <option value='$seller_id'>$email . $seller_id</option>";
                    }
                }
                
                ?>

                </select>
            </section>

            <section class="form-outline mb-4 w-50 m-auto">
                <label for="product_name" class="form-label">Product name</label>
                <input type="text" name='product_name' id='product_name'
                 class='form-control' required>
            </section>

            <section class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" name='product_description' id='Product_description'
                 class='form-control'  required>
            </section>

            <section class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name='product_price' id='product_price'
                 class='form-control' required>
            </section>

            <section class="form-outline mb-4 w-50 m-auto">
                <label for="product_quantity" class="form-label">Product quantity</label>
                <input type="text" name='product_quantity' id='product_quantity'
                 class='form-control' required>
            </section>

            <section class="form-outline mb-4 w-50 m-auto">
                <label for="product_tags" class="form-label">Product tags</label>
                <input type="text" name='product_tags' id='product_tags'
                 class='form-control' required>
            </section>

            <section class="form-outline mb-4 w-50 m-auto">
                <label for="product_short_description" class="form-label">Product short description</label>
                <input type="text" name='product_short_description' id='product_short_description'
                 class='form-control' required>
            </section>
            <!--       product description-->
            <section class="form-outline mb-4 w-50 m-auto">
                <label for="product_discount_code" class="form-label">Product discount code</label>
                <input type="text" name='product_discount_code' id='product_discount_code'
                class='form-control' required>
            </section>
             <!--      keywords-->
             <section class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name='product_keywords' id='product_keywords'
                class='form-control'  required>
            </section>
<!--      unit-->
            <section class="form-outline mb-4 w-50 m-auto">
                <label for="product_unit" class="form-label">Product Unit (KG,Grams,Ton)</label>
                <input type="text" name='product_unit' id='product_unit'
                class='form-control'  required>
            </section>
           <!--      categories-->
             <section class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="product-categories" class='form-select'>
                    <option value="" class=''>Select category</option>
                   
                   <?php // fetch category
                        $db = new Database();
                        $sql = "SELECT * FROM product_categories"; // Prepared statement
                        
                        $result = $db->read_db($sql);
                        
                        // Use prepared statement with parameter binding for security
                        // Check if category already exists
                        if ( $result) {
                        foreach($result as $row){
                        $category_name=$row['category_name'];
                        $category_id=$row['category_id'];
                        $category_description=$row['category_description'];
                       echo" <option value='$category_id'>$category_name</option>";
                       }
                    }
                    ?>
                </select>
                
            </section>

                        <!--      Brands-->
             <section class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="product-brand" class='form-select'>
                <option value="" class=''>Select brands</option>
                <?php // fetch brands
                     $db = new Database();
                     $sql = "SELECT * FROM brands"; // Prepared statement
                     
                     $result = $db->read_db($sql);
                     
                     // Use prepared statement with parameter binding for security
                     // Check if category already exists
                     if ( $result) {
                     foreach($result as $row){
                     $Brand_name = $row['Brand_name'];
                     $brand_id=$row['brand_id'];
                     $brand_description=$row['Brand_description'];
                    echo" <option value='$brand_id'>$Brand_name</option>";
                    }
                 }
                    ?>
            </select>
              
                </section>

                <!--      Image 1-->
           <section class="form-outline mb-4 w-50 m-auto">
                <label for="product-image-1" class="form-label">Product image 1</label>
                <input type="file" name='product_image_1' id='product-image-1'
                 class='form-control'  required >
            </section>
                           <!--      Image 2-->
            <section class="form-outline mb-4 w-50 m-auto">
                <label for="product-image-2" class="form-label">Product image 2</label>
                <input type="file" name='product_image_2' id='product-image-2'
                 class='form-control'  required >
            </section>

                            <!--      Image 3-->
            <section class="form-outline mb-4 w-50 m-auto">
                <label for="product-image-3" class="form-label">Product image 3</label>
                <input type="file" name='product_image_3' id='product-image-3'
                 class='form-control' required >
            </section>
            <!--      Price-->
            
             <!--      Price-->
             <section class="form-outline mb-4 w-50 m-auto">
                
                <input type="submit" name='insert-btn' id='price'
               class='btn btn-success mb-3 px-3' value='Insert product'>
            </section>
                  
          
                
            </section>
            
        </form>
    </section>