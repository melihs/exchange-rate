<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Döviz Kuru Uygulaması</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="container">
        <h1 class="text-center m-2">Döviz Kuru Uygulaması</h1>
        <table class="table table-hover border border-1 mt-2">
            <thead class="bg-success text-light">
            <tr>
                <th scope="col">Para Birimi</th>
                <th scope="col">Servis</th>
                <th scope="col">Döviz Kuru</th>
            </tr>
            </thead>
            <tbody>
            @foreach($minResults as $currency => $minResult)
                <tr>
                    <td>
                        @switch($currency)
                            @case('USDTRY')
                                Dolar
                            @break
                            @case('EURTRY')
                                Avro
                            @break
                            @case('GBPTRY')
                                Sterlin
                            @break
                        @endswitch
                    </td>
                    <td>{{$minResult['name']}}</td>
                    <td>{{ $minResult['amount'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>