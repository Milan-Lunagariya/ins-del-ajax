<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
<title>Try ajax</title>
    <style>
 
    </style>
</head>

<body>
    <h1 align="center">Try Ajax</h1>

    <div class="flexend" style="justify-content: center;">
        <button onclick="openform()" id="bgcol"  style="background:blue;color:white;">Open/Close form</button>

    </div>

    <div class="formcontainer" id="onoff" >
            <div class="form-field">Name <input type="text" id="name" placeholder="Enter Name"></div>
            <div class="form-field">Password <input type="password" id="psd" placeholder="Enter Password"></div>
            <hr>
            <div class="savebtn flexend">
                <button onclick="insertdata()" id="save">Save</button>
            </div>
    </div>
    <h1 align="center">Read Reacords</h1>

    <div id="record_content"></div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"> </script>
    <script>

    $(document).ready(function(){
        readRecords();
    })

        // View Records
        function readRecords(){
            var readRecords = "readRecords";
            $.ajax({
                url : "insert.php",
                type : 'POST',
                data: { readRecords:readRecords },
                success : function(data,status){
                    $('#record_content').html(data);
                }
            });
        }

        //Insert Data
        function insertdata() {
            $(document).ready(function () {
                var name = $('#name').val(); // Note : Please can after val parentheses because it's function. for Example Write val(); not val;
                var psd = $('#psd').val();
                var save = document.getElementById('save');
                save.style.background = 'blue';
                
                $.ajax({
                    url: 'insert.php',
                    type: 'POST',
                    data: { name: name, psd: psd },
                    success: function (data, status) {
                        readRecords();
                    }
                })

            })
        }

        //Form open and Close
        function openform(){
            // alert("open form");
            var onform = document.getElementById('onoff');
            var bgcol = document.getElementById('bgcol');

            
            if(onform.style.display == 'block'){
                bgcol.style.background = 'blue';
                onform.style.display = 'none';
            }
            else{
                bgcol.style.background = 'red';
                onform.style.display = 'block';
            }
        }

        //Delete Record
        function DeleteUser(deleteid)
        {
            var confirmdelete = confirm("Are You sure Delete Records");
            if(confirmdelete == true){

                $.ajax({
                    url : "insert.php",
                    type : 'post',
                    data : { deleteid : deleteid },
                    success:function(data,status) {
                            readRecords();
                        }
                })
            }
        }

        </script>
</body>
</html>