<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Replace Api documents</title>
    <style>
        .container {
            max-width: 500px;
        }

        dl,
        ol,
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>


<body>
 
@include('layouts.app')

<div class="container">
  <div class="row">
    <div class="col-sm">
     
    </div>
    <div class="col-sm">
    <div class="container">
        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
            <h3 class="text-center mb-5">Replace Api documents</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <div class='text-md-center'>

                @if(isset($returnToolList))
                @foreach($returnToolList as $returnToolListKey => $returnToolListValue)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="toolsName" id={{$returnToolListKey}} value={{$returnToolListValue}}>
                    <label class="form-check-label" for={{$returnToolListKey}}>{{$returnToolListValue}}</label>
                </div>

                @endforeach
                @endif
            </div>

            <div style='margin-top:30px;' class="custom-file text-md-center">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>

            </div>
            <div class="mb-3">


            </div>
            <button type="submit" name="submit" id='btnUpload' class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>




        </form>
    </div>
    </div>
    <div class="col-sm">
     
    </div>
  </div>
</div>
            
  

    @if(isset($returnArray))
    <div style="margin-top:65px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tool ID</th>
                    <th scope="col">Tool Name</th>

                    <th scope="col">FilePath</th>
                    <th scope="col">Last Uploaded By</th>

                    <th scope="col">Last re-uploded on</th>
                </tr>
            </thead>
            <tbody>
                @foreach($returnArray as $returnKey => $data)

                <tr>
                    <th scope="row">{{$returnKey}}</th>
                    <td>{{$data['tool_name']}}</td>
                    <td>{{$data['file_path']}}</td>
                    <td>{{$data['user_name']}}</td>
                    <td>{{$data['updated_at']}}</td>
                </tr>
                @endforeach
                @endif



            </tbody>
        </table>
    </div>

</body>
 
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
 
</html>