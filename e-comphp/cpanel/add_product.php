<?php
    include '../controllerUserData.php';

    if(isset($_SESSION['pri'])){
        if($_SESSION['pri'] != 0){
            header('Location: ../index.php');
            $_SESSION['message_reg'] = "Sorry you dont have permision to get there";
            $_SESSION['icon']        = "error";
        }else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- boostrap cdn -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"/>
    <style>
        .div-container{
            padding: 25px;
            background: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0px 0px 8px black;
        }

        .red{
            color: red;
        }
        .title{
            color:cyan;
        }
        .separator_paragraph_start{
            color:purple;
        }
        .text{
            color:cyan;
        }
        .example-box{
            padding: 10px;
            border:1px solid black;
            border-radius: 8px;
        }
    </style>
    <title>Admin Panel | Add Product</title>
 
</head>
<body>
	<?php include './inc/header.php'; ?>

    <form action="./inc/ajax_add.php" id="new_product" method="POST" enctype="multipart/form-data">
    
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 p-0">
                    <div class="div-container">
                        <h3>Add Product</h3>
                        <div class="form-row">
                          <div class="form-group col-md-8">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title input">
                          </div>

                          <div class="form-group col-md-2">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" name="quantity">
                          </div>
                          <div class="form-group col-md-2">
                            <label for="price">Price(dh)</label>
                            <input type="number" class="form-control" name="price">
                          </div>
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img" name="image">
                                <label class="custom-file-label" for="img">Choose Image for the Product</label>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_1" name="image_1">
                                <label class="custom-file-label" for="img_1">Mini Image 1</label>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_2" name="image_2">
                                <label class="custom-file-label" for="img_2">Mini Image 2</label>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_3" name="image_3">
                                <label class="custom-file-label" for="img_3">Mini Image 3</label>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_4" name="image_4">
                                <label class="custom-file-label" for="img_4">Mini Image 4</label>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_5" name="image_5">
                                <label class="custom-file-label" for="img_5">Mini Image 5</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="brand">Brand</label>
                                <input type="text" class="form-control" name="brand" placeholder="brand input">
                            </div>
                            <div class="form-group col-md-2">
                            <label for="review">Review</label>
                            <input type="number" class="form-control" name="review">
                          </div>

                        </div>
                        <div class="form-group">
                            <label for="mini_description">Mini Description</label>
                            <textarea class="form-control" name="mini_description" rows="2"></textarea>
                        </div>
                        <div class="container alert alert-warrning">
                            -) To make header use -> [HEADER]  <br>
                            -) To make paragraph of the header use -> ( : ) and end with -->( / )<br>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div id="output"></div>
                        <div class="control-form">
                            <button type="submit" class="btn btn-success btn-lg btn-block" name="btn_submit">Submit</button>
                        </div>

                        <h4>Example :</h4>
                        <p>Input</p>
                        <div class="example-box">
                            <span class="red">[</span>
                            <span class="title">Chapter1</span>
                            <span class="red">]</span>
                            <span class="separator_paragraph_start">:</span>
                            <span class="text">hello everyone welcome to this website.</span><span class="red">/</span>
                        </div>
                        <p>Output</p>
                        <div style="border: 1px solid black;border-radius: 8px;padding:10px;">
                            <?php echo ret_val_wh5(" [ Chapter1 ] : hello everyone welcome to this website./ ");?>
                        </div>

                    </div>
                    
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

    </form>


    <?php include './inc/scripts.php';?>
</body>
</html>
<?php
 }
}else{
    header('Location: ../index.php');
            $_SESSION['message_reg'] = "Sorry you dont have permision to get there";
            $_SESSION['icon']        = "error";
}


?>

