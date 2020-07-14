<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;300;400;700&display=swap" rel="stylesheet"> 
        <style>
            body {font-family: 'Roboto Mono', monospace;padding-bottom:2rem;}
            .title {font-weight:900;}
            label {font-size:1.3rem;font-weight:900;margin:0;}
            input, select {font-size:1.4rem !important;font-weight:400 !important;margin-bottom:2rem !important;}
            .btn-submit {font-size:1.7rem;}
        </style>
        <title>Provably Fair Verification</title>
    </head>
    <body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><h2 class="title m-2">>_ProvablyFair.co</h2></a>
            <form class="form-inline">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#navbarToggleHow" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">How It Works</button>
                </div>
            </form>
            <form class="form-inline ml-auto">
                <a href="https://github.com/gamebetr" class="btn btn-secondary" role="button"><i class="fab fa-github"></i> Get Source</a>
            </form>
        </nav>

        <div class="collapse" id="navbarToggleHow">
            <div class="bg-dark p-4 pb-0 m-0">
                <div class="container">
                    <div class="col">
                        <h4 class="text-white">What is Provably Fair?</h4>
                        <p class="text-muted">Provably fair is a way to prove that a randomly generated number used in a game is not manipulated.</p>
                    </div>
                    <div class="col">
                        <h4 class="text-white">How It Works</h4>
                        <p class="text-muted">At the start of a game you (the client) are auto-assigned a random seed that you can use or change to whatever you'd like. The game (the server) also generates a random seed which it keeps <em>private</em>. The client seed is then combined with the server seed and cryptographically hashed. This hashed version of the seed is shown to the client <em>before</em> a random part of the game takes place.</p>
                        <p class="text-muted">This hash can only be generated with these 2 pieces of information (client seed + server seed) and this hash will always produce the same outcome when ran through the publicly viewable algorithm.</p>
                        <p class="text-muted">After the game uses the random number the server seed (which was used in conjunction with the client seed to generate the hash) is revealed to the client. Once this is obtained the player can confirm that the server did indeed use this server seed in conjunction with the client seed to generate the hash from the previous round.</p>
                        <p class="text-muted">This same process repeats over and over again before and after each round. Before each round you will be presented with the hash which will be used for the next round. After that round you will be revealed the server seed used to generate that hash. If the hashes match, and the result is the same result you got in the game, then the outcome was provably fair.</p>
                    </div>
                    <div class="col">
                        <h4 class="text-white">How To Verify</h4>
                        <p class="text-muted">Use the form below to verify a dataset of provably fair information. This data will run through the PHP algorithm found in the source code in the <a href="https://github.com/gamebetr/provable/blob/master/src/Provable.php">Github <em>provable</em> repository</a>. This is the exact same source code which is used to run this website. You can install this same website locally by following the instructions on the <a href="https://github.com/gamebetr/provable-laravel">Github <em>provable-laravel</em> repository</a>.</p>
                        <p class="text-center"><a href="https://github.com/gamebetr" class="btn btn-primary"><i class="fab fa-github"></i> Get Source Code</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-dark p-5">
            <div class="container">
                <div class="card">
                    <div class="card-header"><h4 class="my-0">Verify</h4></div>
                    <div class="card-body p-5">
                        <form>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="number"{{ $provable->getType() != 'number' ?: ' selected' }}>Number</option>
                                            <option value="shuffle"{{ $provable->getType() != 'shuffle' ?: ' selected' }}>Shuffle</option>
                                        </select>
                                    </div>
                                </div>

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
                            </div>

                            <div class="form-group">
                                <label for="client_seed">Client Seed</label>
                                <input name="client_seed" id="client_seed" class="form-control" value="{{ $provable->getClientSeed() }}">
                            </div>
                            <div class="form-group">
                                <label for="server_seed">Server Seed</label>
                                <input name="server_seed" id="server_seed" class="form-control" value="{{ $provable->getServerSeed() }}">
                            </div>

                            <div class="form-group">
                                <label for="hashed_server_seed">Hashed Server Seed</label>
                                <input name="hashed_server_seed" id="hashed_server_seed" class="form-control" readonly value="{{ $provable->getHashedServerSeed() }}">
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <button type="submit" class="btn btn-lg btn-primary btn-submit"><i class="fas fa-arrow-down"></i> Get Results</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h2 id="results" class="title pt-5">Results</h2>
            <ul class="list-group">
                @foreach((array) $provable->results() as $result)
                    <li class="list-group-item list-group-item-success">{{ $result }}</li>
                @endforeach
            </ul>
            
            <div class="text-center text-muted mt-5 pt-5">&copy; ProvablyFair.co</div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"></script>
    </body>
</html>