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
            .title {font-weight:bold;}
            #navbarToggleHow strong {color:rgba(255,255,255,0.7);}
            label {font-weight:bold;margin:0;}
            #results {margin-top:-3rem;border:none;}
            #results a {font-weight:bold;color:#000;}
        </style>
        <title>Provably Fair Verification</title>
    </head>
    <body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/"><h2 class="title m-2">>_ProvablyFair.co</h2></a>
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
            <div class="bg-dark py-4 px-2">
                <div class="container">
                    <div class="col">
                        <h4 class="text-white">What is Provably Fair?</h4>
                        <p class="text-muted">Provably fair is a way to prove that a randomly generated number (or group of numbers) used in a game is not manipulated.</p>
                    </div>
                    <div class="col">
                        <h4 class="text-white">How It Works</h4>
                        <p class="text-muted">At the start of a game you (<code>the client</code>) are auto-assigned a random seed that you can use or change to whatever you'd like. The game (<code>the server</code>) also generates a random seed which it keeps <em><strong>private</strong></em>. The server seed is then cryptographically hashed and shown to the client <em><strong>before</strong></em> a game round takes place.</p>
                        <p class="text-muted">After the game round takes place the server seed (which was used to generate the hash) is revealed to the client. Once this is obtained the player can confirm that the server did indeed use this server seed to generate the hash from the previous round. Additionally, the client seed was used in conjunction with the server seed to generate the results that were used for that round, as evidenced by both the client seed and server seed producing the exact same result that was used in the game.</p>
                        <p class="text-muted">This same process repeats over and over again before and after each round. Before each round you will be presented with the hashed server seed which will be used for the next round. After that round you will be revealed the server seed used to generate that hash. If the hashes match, and the result is the same result you got in the game, then the outcome was provably fair.</p>
                        <h6 class="text-white">Types and Min/Max</h6>
                        <p class="text-muted">Different games require a different random number <code>type</code>. For example, a dice game may require a single <code>number</code> between <em><strong>0</strong></em> and <em><strong>10,000</strong></em> where a card game like Blackjack may require a <code>shuffle</code> which returns <em><strong>52</strong></em> random values which are then assigned to each unique card. For this reason there are different types of provably fair numbers which can be generated. Each type has a <code>minimum value</code> and a <code>maximum value</code> to be set depending on the range of values desired.</p>
                    </div>
                    <div class="col">
                        <h4 class="text-white">How To Verify</h4>
                        <p class="text-muted">Use the form below to verify a dataset of provably fair information. This data will run through the <code>PHP</code> algorithm found in the source code in the <a href="https://github.com/gamebetr/provable/blob/master/src/Provable.php">Github <em>provable</em> repository</a>. This is the exact same source code which is used to run this website. You can install this same website locally by following the instructions on the <a href="https://github.com/gamebetr/provable-laravel">Github <em>provable-laravel</em> repository</a>.</p>
                        <p class="text-center"><a href="https://github.com/gamebetr" class="btn btn-primary"><i class="fab fa-github"></i> Get Source Code</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-dark py-5 px-2">
            <div class="container pb-4">
                <div class="card mb-5">
                    <div class="card-header"><h4 class="my-0">Verify</h4></div>
                    <div class="card-body p-5">
                        <form>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="number"{{ $provable->getType() != 'number' ?: ' selected' }}>Number</option>
                                            <option value="shuffle"{{ $provable->getType() != 'shuffle' ?: ' selected' }}>Shuffle</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="min">Minimum Value</label>
                                        <input type="number" name="min" id="min" class="form-control" value="{{ $provable->getMin() }}">
                                    </div>
                                </div>
                                <div class="col-md">
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
                                    <button type="submit" class="btn btn-lg btn-primary btn-submit">Get Results <i class="fas fa-arrow-down"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <ul id="results" class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#results"><h4>Results</h4></a>
                </li>
            </ul>
            <ul class="list-group mt-5">
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