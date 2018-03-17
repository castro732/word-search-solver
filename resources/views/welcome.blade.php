<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Word Search</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/css/bootstrap-select.min.css">


        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 300;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Word Search Solver
                </div>
            
                <div class="row">
                    <div class="col">
                        <h5>Select the soup you want to search</h5>
                        <select id="soup" class="selectpicker" title="Choose a soup">
                          <option value="1">#1 - 3x3</option>
                          <option value="2">#2 - 1x10</option>
                          <option value="3">#3 - 5x5</option>
                          <option value="4">#4 - 2x7</option>
                        </select>
                    </div>
                    <div class="col">
                        <h5>Select the word to search for</h5>
                        <select id="word" class="selectpicker">
                          <option value="OIE">OIE</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col-1"></div>

                    <div class="col-5 text-center">
                        {{-- Soup 1 --}}
                        <table data-soup="1" border="0" cellpadding="0" cellspacing="18" width="200" style="display: none;">
                            <tbody>
                                @foreach ($soup_1 as $element)
                                    <tr>
                                    @foreach ($element as $letter)
                                        <td>{{$letter}}</td>
                                    @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                        {{-- Soup 2 --}}
                        <table data-soup="2" border="0" cellpadding="0" cellspacing="18" width="200" style="display: none;">
                            <tbody>
                                @foreach ($soup_2 as $element)
                                    <tr>
                                    @foreach ($element as $letter)
                                        <td>{{$letter}}</td>
                                    @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Soup 3 --}}
                        <table data-soup="3" border="0" cellpadding="0" cellspacing="18" width="200" style="display: none;">
                            <tbody>
                                @foreach ($soup_3 as $element)
                                    <tr>
                                    @foreach ($element as $letter)
                                        <td>{{$letter}}</td>
                                    @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Soup 4 --}}
                        <table data-soup="4" border="0" cellpadding="0" cellspacing="18" width="200" style="display: none;">
                            <tbody>
                                @foreach ($soup_4 as $element)
                                    <tr>
                                    @foreach ($element as $letter)
                                        <td>{{$letter}}</td>
                                    @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-6">
                        <a id="submit" href="#" class="btn btn-primary btn-round">Search!</a>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h5 id="found" style="display: none;"><span id="times_found">N</span> times found!</h5>

                                <h5 id="not_found" style="display: none;">Word not found!</h5>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/js/bootstrap-select.min.js"></script>

</html>
