<html>
<head>

    <script
            src="http://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Veteran Services</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">

        body {
            background-color: #eceff1

        }
    </style>
    <script>
        function showToday() {
            var today = new Date();

            var date = today.getDate();
            var month = today.getMonth();
            var hours = today.getHours();
            var minutes = today.getMinutes();
            if (date < 10) date = "0" + date;
            if (month + 1 < 10) month = "0" + (month + 1);
            if (hours > 12) hours = today.getHours() - 12;
            if (minutes < 10) minutes = "0" + today.getMinutes();


            if (today.getHours() >= 12)
                $('#PM').attr("selected", "selected");
            else
                $('#AM').attr("selected", "selected");

            var dateText = today.getFullYear() + "-" + month + "-" + date;
            $('#date').val(dateText);

            var timeText = hours + ":" + minutes;
            $('#time').val(timeText)

        }

    </script>
</head>

<body>
<div class="navbar-fixed">
    <nav>
        <div class="black nav-wrapper">
            <a href="home" class="brand-logo center blue-grey-text text-lighten-5">Veteran Services</a>
            <ul class="right">
                <li><a href="addclient" class="waves-effect waves-light btn grey"><i class="material-icons left">add</i>Add Client</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="header">
    <button class="back-button btn-lg btn-danger" onclick="location.href='/home'" type="button">Back</button>
    <h1 class="client-header" style="margin-bottom: 40px">Log Visit</h1>
</div>
<div class="container">
    <div class="row">
        <br>
        <div class="col s12">
            <div class="card white">
                <form method="post">
                    <div class="card-content">
                        <span class="card-title">Log a Visit</span>
                        <br>
                        <div class="row">
                            <div class="input-field col s6">
                                <select name="client" required>
                                    <option value="">-- Select --</option>
                                    @foreach (\App\Client::clientList() as $client)
                                        <option value={{ $client->id  }}>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                <label for="client">Select Client</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="date" type="text" name="date" class="datepicker" required>
                                <label for="date">Date</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="time" type="text" name="time" class="timepicker" required>
                                <label for="time">Time</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="form_message" name="comments" class="materialize-textarea"></textarea>
                                <label for="form_message">Notes</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-action">
                        <input type="submit" class="btn btn-success btn-send">Save</input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

