<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Service Request App</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    </head>
    <body class="antialiased" style="background-color: #EDF0F8;">

        <div class="mt-2">

            <div class="text-end mb-4" style="margin-inline: 0.5rem;">
                <a href="/admin/login" role="button" class="btn btn-outline-primary">Login</a>
            </div>

            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 85vh; padding-inline: 0.5rem;">

                @if ($errors->any())
                    <div class="alert alert-danger col-6 mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                
                @if(session('success'))
                    <div class="alert alert-success col-6 mt-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card col-md-6 col-sm-6">
                    <div class="card-header ">
                        <h1 class="text-center">SERVICE REQUEST FORM</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="ministry" class="form-label">Ministry</label>
                                    <select id="ministry" class="form-control" name="department" required>
                                        <option value="">Choose Ministry...</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
        
                                <div class="col-md-6">
                                    <label for="eqpt" class="form-label">Equipment Name</label>
                                    <input type="text" name="eqptName" class="form-control" aria-label="Equipment Name" required>
                                </div>
        
                                <div class="col-md-6 mt-2">
                                    <label for="serial" class="form-label">Serial No.</label>
                                    <input type="text" name="serial" class="form-control" aria-label="Serial Number" required>
                                </div>
        
                                <div class="col-md-6 mt-2">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" name="model" class="form-control" aria-label="Model" required>
                                </div>
        
                                <div class="col-md-6 mt-2">
                                    <label for="reported" class="form-label">Reported By</label>
                                    <input type="text" name="reportedBy" class="form-control" aria-label="Reported By" required>
                                </div>
        
                                <div class="col-md-6 mt-2">
                                    <label for="mobile" class="form-label">Mobile No.</label>
                                    <input type="text" name="telephone" class="form-control" aria-label="Mobile No" required>
                                </div>
        
                                <div class="col-md-6 mt-2">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control" aria-label="Designation" required>
                                </div>
        
                                <div class="col-md-6 mt-2">
                                    <label for="user" class="form-label">ICT Officer</label>
                                    <select name="user" id="user" class="form-control" required>
                                        <option value="">Choose...</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
        
                                <div class="col-md-12 mt-2">
                                    <label for="category" class="form-label">Nature of Fault</label>
                                    <select name="fault" id="category" class="form-control" required>
                                        <option selected></option>
                                        <option value="Hardware/Software/Technical">Hardware/Software/Technical</option>
                                        <option value="Network/Wireless">Network/Wireless</option>
                                        <option value="Other:Please Specify">Other:Please Specify</option>
                                    </select>
                                </div>
        
                                <div class="col-md-12 mt-2">
                                    <label for="description" class="form-label">Description of Fault</label>
                                    <textarea class="form-control" placeholder="Description..." id="description" name="description" style="height: 100px" required></textarea>
                                </div>
        
                                <div class="d-grid gap-2 col-6 mx-auto mt-4">
                                    <button class="btn btn-primary" type="submit">Request</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
