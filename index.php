<?php
include('connect_database.php');

$pageno = 0;
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 6;
$offset = ($pageno - 1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM post";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM post  order by created_at DESC LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($conn,$sql);

?>

    <html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <style>
            body {
                padding: 50px;
                height: 900px;
            }

            .center {
                text-align: center;
                position: relative;
            }

            .black {
                background-color: black;
                color: white;
            }

            .footer {
                position: relative;
                top: 610px;
                left: 0;;
            }

            .body-row {
                height: 850px;
            }

            .padding {
                padding: 10px;
            }

            /*.red {*/
                /*color: red;*/
            /*}*/
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).on('click', '.post-message', function () {
                var user_name = $('#user_name').val();
                var content = $('#content').val();
                var data = {
                    user_name: user_name,
                    content: content
                };
                $.post("post_message.php", data)
                    .done(function (data) {
                        alert("Data Loaded: " + data);
                        window.location.reload()
                    });


            });

            $(document).on('click', '.edit-message', function () {
                var post_id = $(this).attr('data-id');
                var data = {
                    post_id: post_id
                };
                $.post("edit_message.php", data)
                    .done(function (data) {
                        alert("Data Loaded: " + data);
                        window.location.reload()
                    });


            });

            $(document).on('click', '.delete-message', function () {
                var post_id = $(this).attr('data-id');
                var data = {
                    post_id: post_id
                };
                $.post("delete_message.php", data)
                    .done(function (data) {
                        alert("Data Loaded: " + data);
                        window.location.reload()
                    });


            });

            $(document).on('click', '.login', function () {
                var user_name = $('#user_name_login').val();
                var password = $('#password').val();
                var data = {
                    user_name: user_name,
                    password: password
                };
                $.post("login_admin.php", data)
                    .done(function (data) {
                        alert("Data Loaded: " + data);
                        window.location.reload()
                    });
            });

            $(document).on('click', '.logout', function () {
                var data = {};
                $.post("logout.php", data)
                    .done(function (data) {
                        alert("Data Loaded: " + data);
                        window.location.reload()
                    });
            });

        </script>
    </head>

    <body class="body">
    <div class="row">
        <div class="col-sm-3 center">
            <h3>HAE</h3>
            <hr>
            <h4>Guestbook</h4>
            <p>Feel free to leave us a short message to tell us what you think to our services</p>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#postMessage"> Post a Message
            </button>
            <div class="footer">
                <?php
                    if (isset($_SESSION['admin'])){
                        echo '<a class="logout"><h5>Logout</h5></a>';
                    } else {
                        echo '<a data-toggle="modal" data-target="#login"><h5>Admin Login</h5></a>';
                    }

                ?>

            </div>
        </div>
        <div class="col-sm-9 black">
            <div class="row body-row">
                <?php
                if ($res_data->num_rows > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_array($res_data)) {
                        $html = " <button data-id='".$row["id"]."' class='btn btn-danger edit-message'><i class='fas fa-pencil-alt'></i></button> <button data-id='".$row["id"]."' class='btn btn-danger delete-message'><i class='fas fa-trash-alt'></i></button>";
                        echo "<div class='col-sm-6 padding'>";
                        echo "<p>" . $row["content"] . "</p>";
                        echo "<p>" . $row["user_name"] . "</p>";
                        echo "<p>" . $row["created_at"] . (isset($_SESSION['admin']) ? $html : '') ."</p>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
            <ul class="pagination">
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><</a>
                </li>
                <?php
                for($i = 1 ; $i <= $total_pages ; $i++)
                {
                    echo "<a href = ?pageno=$i" .' >'. $i .'</a>';
                }
                ?>
                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- The Modal Post Message -->
    <div class="modal fade" id="postMessage">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Post Message</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" rows="5" cols="62" class="content form-control" name="content"
                                  required></textarea>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger post-message" data-dismiss="modal"> Post a Message
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal Login -->
    <div class="modal fade" id="login">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input type="text" class="form-control" name="user_name" id="user_name_login" required>
                        name:admin
                    </div>
                    <div class="form-group">
                        <label for="content">Password</label>
                        <input type="password" class="form-control" name="password" id="password"  required>
                        password:123123
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger login" data-dismiss="modal"> Login
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    </body>
    </html>
<?php
$conn->close();
?>