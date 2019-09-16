<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Provably Fair</title>
    </head>
    <body>
        <div class="container mt-5 mb-5">
            <h1>Provably Fair</h1>
            <form>
                <div class="form-group">
                    <label for="client_seed">Client Seed</label>
                    <input name="client_seed" id="client_seed" class="form-control" value="{{ $provable->getClientSeed() }}">
                </div>
                <div class="form-group">
                    <label for="server_seed">Server Seed</label>
                    <input name="server_seed" id="server_seed" class="form-control" value="{{ $provable->getServerSeed() }}">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="min">Minimum Value</label>
                            <input type="number" name="min" id="min" class="form-control" value="{{ $provable->getMin() }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="max">Maximum Value</label>
                            <input type="number" name="max" id="max" class="form-control" value="{{ $provable->getMax() }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="number"{{ $provable->getType() != 'number' ?: ' selected' }}>Number</option>
                                <option value="shuffle"{{ $provable->getType() != 'shuffle' ?: ' selected' }}>Shuffle</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="hashed_server_seed">Hashed Server Seed</label>
                    <input name="hashed_server_seed" id="hashed_server_seed" class="form-control" readonly value="{{ $provable->getHashedServerSeed() }}">
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <button type="submit" class="btn btn-lg btn-block btn-primary">Get Results</button>
                    </div>
                    <div class="col">
                        <a href="/" class="btn btn-lg btn-block btn-warning">Reset Form</a>
                    </div>
                </div>
            </form>
            <h2 class="mt-5">Results</h2>
            <ul class="list-group">
                @foreach((array) $provable->results() as $result)
                    <li class="list-group-item list-group-item-success">{{ $result }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>