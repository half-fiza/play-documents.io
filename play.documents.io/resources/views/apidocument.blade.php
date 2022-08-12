<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
    <div class="container mt-5">
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
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="toolsName" id="1" value="hubble" selected>
                <label class="form-check-label" for="1">Hubble</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="toolsName" id="2" value="lumeire">
                <label class="form-check-label" for="2">Lumeire</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="toolsName" id="3" value="clg" >
                <label class="form-check-label" for="3">CLG</label>
            </div>
            </div>
            <div style='margin-top:30px;' class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
    </div>

    @if(isset($returnArray))
    <div style="margin-top:65px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tool ID</th>
                    <th scope="col">Tool Name</th>

                    <th scope="col">FilePath</th>
                    <th scope="col">Last re-uploded on</th>
                </tr>
            </thead>
            <tbody>
                @foreach($returnArray as $returnKey => $data)

                <tr>
                    <th scope="row">{{$returnKey}}</th>
                    <td>{{$data['tool_name']}}</td>
                    <td>{{$data['file_path']}}</td>
                    <td>{{$data['updated_at']}}</td>
                </tr>
                @endforeach
                @endif



            </tbody>
        </table>
    </div>
</body>

</html>