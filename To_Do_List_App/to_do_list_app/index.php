<html>
    <title>Home</title>
    <link rel="stylesheet" href="css/index.css">
    <body>
        <?php include 'indexpro.php'; ?>
        <div class="sidenav">
            <img src="image/<?php echo $fetch_user['picture']; ?>" alt="" class="profile-picture"> 
            <h3 class="profile-name"><?php echo $fetch_user['username']; ?></h3>
            <a href="editprofile.php">Edit Profile</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="main">
            <h2>To Do List</h2>
            <form class="addtask" action="addtask.php" method="post">
                <div class="addbox"> 
                    <input type="text" name="task" placeholder="Task" required>
                    <input type="text" name="category" placeholder="Category" required>
                    <input class="addbtn" type="submit" value="Add">
                </div>
            </form>
            <table class="tasklist">
                <tr>
                    <th class="task">Task</th>
                    <th class="category">Category</th>
                    <th class="status">Status</th>
                    <th class="action">Actions</th>
                </tr>
                <?php
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM todo WHERE username = '$username'";
                $result = mysqli_query($dbc, $sql);
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    ?>
                    <tr>
                        <td class="taskdata"><?php echo $row['task']; ?></td>
                        <td class="categorydata"><?php echo $row['category']; ?></td>
                        <td class="statusdata"><?php echo $row['status']; ?></td>
                        <td class="actiondata">
                        <a href="donetask.php?taskid=<?php echo $row['taskid']; ?>" ><button class="donebtn">DONE</button></a>
                        <a href="todotask.php?taskid=<?php echo $row['taskid']; ?>" ><button class="todobtn">TO DO</button></a>
                        <a href="urgenttask.php?taskid=<?php echo $row['taskid']; ?>" ><button class="urgentbtn">URGENT</button></a>
                        <a href="deletetask.php?taskid=<?php echo $row['taskid']; ?>" ><button class="deletebtn">DELETE</button></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </body>
</html>
