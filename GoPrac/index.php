<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="stylesheet/bootstrap.min.css">
    <title>GOPrac Project</title>
</head>
<body>

    <div class="container">

        <div class="text-center" data-bind="if: selectedFolder()=='index'">

        <form class="form-inline" data-bind="submit: $root.applyFilter">
            <div class="form-group">
                <label for="sort">Sort</label>
                <select name="sort" id="sort" class="form-control" data-bind="value: folderData().sort">
                    <option value="start_date">Start Date</option>
                    <option value="end_date">End Date</option>
                    <option value="code">Code</option>
                </select>
            </div>
            <div class="form-group">
                <label for="order">Order</label>
                <select name="order" id="order" class="form-control" data-bind="value: folderData().order">
                    <option value="desc">Descending</option>
                    <option value="asc">Ascending</option>
                </select>
            </div>
            <button style="text-align: center; background: #FF8322; color: white;" class="btn btn-link">Apply</button>
        </form>

        <form style="padding-top=3px;" class="form-inline" data-bind="submit: $root.applyFilter">
            <h3>Search</h3>
            <div class="form-group">
                <label for="start_date">From</label>
                <input class="form-control" data-bind="value: folderData().filterStartDate" type="date" id="start_date" name="start_date">
            </div>
            <div class="form-group">
                <label for="end_date">To</label>
                <input class="form-control" data-bind="value: folderData().filterEndDate" type="date" id="end_date" name="end_date">
            </div>
            <div class="form-group">
                <label for="code">Code</label>
                <input class="form-control" data-bind="value: folderData().CODE" type="text" id="code" name="code">
            </div>

            <button style="text-align: center; background: #FF8322; color: white;" class="btn btn-link">Search</button>
        </form>

        
            <br>
            <div data-bind="foreach: folderData().codes">
                <div class="card mt-3">
                    <h2 class="jumbotron-heading" data-bind="text: code"></h2>
                    <hr>
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button style="text-align: center;border:1px solid white; background: #FF8322; color: white;" class="btn btn-link" data-bind="click: $root.redirectFolder.bind($data,'view')">View</button>
                        </div>
                        <div class="btn-group">
                            <button style="text-align: center;border:1px solid white; background: #FF8322; color: white;" class="btn btn-link" data-bind="click: $root.redirectFolder.bind($data,'edit')">Edit</button>
                        </div>
                        <div class="btn-group">
                            <button style="text-align: center;border:1px solid white; background: #FF8322; color: white;" class="btn btn-link" data-bind="click: $root.delete.bind($data, $index)">Delete</button>
                        </div>
                    </div>
                    
                </div>
            </div>
            <form  class="form-inline text-center">
             <ul class="pagination pagination-lg" data-bind="foreach: folderData().pageNumberArray">
             <li>
                <a data-bind="click: $root.changePage.bind($data), text: $data"></a>
             </li>
            </ul>
        </form>

        </div>

        

        <div class="text-center" data-bind="if: selectedFolder()=='view'">
            <h1 class="text-center" data-bind="text:folderData().code"></h1>    
            <h3>Start Date:<span data-bind="text:folderData().startDate"></span></h3>
            <h3>End Date:<span data-bind="text:folderData().endDate"></span></h3>
                <div class="btn-group">
                    <button style="text-align: center; background: #FF8322; color: white;" class="btn btn-link" data-bind="click: $root.redirectFolder.bind($data,'index')">Back</button>
                </div>
        </div>

        <div class="text-center" data-bind="if: selectedFolder()=='edit'">
            <form data-bind="submit: $root.update">
                <div class="form-group text-center">
                    <label for="code">Code</label>
                    <input id="code" class="form-control" name="code" type="text" data-bind="value: folderData().code">
                </div>
                <div class="btn-group">
                    <button style="text-align: center; background: #FF8322; color: white;" type="submit" class="btn btn-link">Update</button>
                </div>
            </form>
            <button style="margin-top:5px;background: #FF8322; text-align: center;color: white;" class="btn btn-link" data-bind="click:$root.redirectFolder.bind($data,'index')">Back</button>
        </div>

        <div class="text-center" data-bind="if: selectedFolder()=='delete'">
            Data Deleted
        </div>

    </div>


    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>

    <script type="text/javascript" 
    src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.1.0/knockout-min.js"></script>

    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="javascript/main.js"></script>
    
</body>
</html>