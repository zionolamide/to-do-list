<?php include ("layout/header.php");?>
<?php include ("process/process.php");?>
<link href="style/index.css" rel="stylesheet" type="text/css">
<div class="row">

    <div class="column">
        <div class="content_one" >
            <h2  style = "font-size: 12px;text-align: center;">Total List</h2>
            <h2 class="number"  style="    font-size: 12px; text-align: center; color: lightslategrey;"><?php echo  $list ;?></h2>
        
        </div>
    </div>
    <div class="column"></div>
    <div class="column"></div>
</div>
<div class="containers">
    <div style="overflow-x:auto;" >
        <table id="MyTable" style="margin-top:10%;">
            <tr>
            <th>To-Do-List</th>
            <th>Date</th>
            <th>Checks</th>
            <th>Remove</th>
           
            </tr>
            <?php  $result = mysqli_query($conn, "SELECT * FROM to_do_list")or die($conn->error());?>
                <?php while($row = $result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['message'];?></td>               
                    <td><?php echo $row['date'];?></td> 
                    <td>
                        <label class="container">
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                        </label>
                    </td>                          
                    <td>
                        <a href="index.php?delete=<?php echo $row['id'];?>"  class="gradient-button gradient-button-delete">Remove</a>
                    </td>	
                    					   
                </tr>
            
                <?php endwhile;?>
                <?php 
                function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
                    }
                
                ?>
            

            
        </table>
    </div>

    <!--success msg-->
    <div class="success_msg">
        <?php  if(isset($_SESSION['success'])) 
        { 
        ?> 
        <span class="success">
            <?php  echo $_SESSION['success'];?>
        </span>
        <?php
        }
        unset($_SESSION['success']);
        ?>
    </div>

    <!--error msg-->
    <div class="error_msg">
        <?php  if(isset($_SESSION['error'])) 
        { 
        ?> 
        <span class="error">
            <?php  echo $_SESSION['error'];?>
        </span>
        <?php
        }
        unset($_SESSION['error']);
        ?>
    </div>
    <!--error msg-->
    <div class="error_msg">
        <?php  if(isset($_SESSION['error'])) 
        { 
        ?> 
        <span class="del_error">
            <?php  echo $_SESSION['del_error'];?>
        </span>
        <?php
        }
        unset($_SESSION['del_error']);
        ?>
    </div>


    <div class="form">
        

        <form action="index.php" method="post">
            <div class="head">
                <h3>Add To List</h3>
                <button type="submit" name="add" id="add" class="gradient-button-add" style="padding: 5px 20px;">Add</button>
            </div>
            <label for="to-do-list">To-Do-List</label> 
             <textarea name="message" id="" cols="30" rows="10" placeholder="enter your to do list here"></textarea> 
            
        </form>
    </div>
</div>
<?php include ("layout/footer.php");?>